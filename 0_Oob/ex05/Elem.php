<?php

require_once 'MyException.php';

class Elem {

    private $element;
    private array $content = [];
    private array $attributes = [];

    private const TAG_VALID = [
        "meta", "img", "hr", "br",
        "html", "head", "body", "title",
        "h1", "h2", "h3", "h4", "h5", "h6",
        "p", "span", "div", "table", 
        "tr", "th", "td", "ul", "ol", "li"
    ];

    private const TAG_SELF_CLOSING = ["meta", "img", "hr", "br"];

    function __construct($element, $content = null, $attributes = null)
    {
        if (!in_array($element, self::TAG_VALID))
            throw new MyException($element);

        $this->element = $element;

        if ($content !== null) 
        {
            $this->content[] = $content;
        }
        if ($attributes !== null)
        {
            $this->attributes = $attributes;
        }
    }
    
    function pushElement($str) 
    {
        $this->content[] = $str;
    }

    function renderAttributes()
    {
        $html = '';
        foreach ($this->attributes as $key => $value)
        {
            $html .= ' ' . htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
        }
        return $html;
    }

    private function isTextOnly(): bool
    {
        foreach ($this->content as $item) {
            if ($item instanceof Elem) {
                return false;
            }
        }
        return true;
    }


    function getHTML(int $level = 0)
    {
        $indent = str_repeat("  ", $level);

        if (in_array($this->element, self::TAG_SELF_CLOSING))
            return $indent . "<{$this->element}>\n";

        if ($this->isTextOnly()) 
        {
            $content = implode('', $this->content);
            return $indent . "<{$this->element}{$this->renderAttributes()}>{$content}</{$this->element}>\n";
        }

        $html = $indent . "<{$this->element}" . $this->renderAttributes() . ">\n";

        foreach ($this->content as $item)
        {
            if ($item instanceof Elem)
                $html .= $item->getHTML($level + 1);
        }

        $html .= $indent . "</{$this->element}>\n";

        return $html;
    }

    function validateNode(Elem $node): bool
    {
        switch ($node->element) {

            case 'head':
                return $this->validateHead($node);

            case 'p':
                return $node->isTextOnly();

            case 'table':
                return $this->childrenOnly($node, ['tr']);

            case 'tr':
                return $this->childrenOnly($node, ['th', 'td']);

            case 'ul':
            case 'ol':
                return $this->childrenOnly($node, ['li']);
        }

        foreach ($node->content as $child) {
            if ($child instanceof Elem) {
                if (!$this->validateNode($child)) {
                    return false;
                }
            }
        }

        return true;
    }

    function validateHead(Elem $head): bool
    {
        $titles = 0;
        $metas = 0;

        foreach ($head->content as $child) {
            if (!$child instanceof Elem) continue;

            if ($child->element === 'title') {
                $titles++;
            }

            if ($child->element === 'meta'
                && isset($child->attributes['charset'])) {
                $metas++;
            }
        }

        return $titles === 1 && $metas === 1;
    }


    function validPage()
    {

        if ($this->element !== 'html')
            return false;

        $children = array_filter($this->content, fn($c) => $c instanceof Elem);

        if (count($children) !== 2)
            return false;

        if ($children[0]->element !== 'head' || $children[1]->element !== 'body')
            return false;

        return $this->validateNode($this);
    }
}

?>