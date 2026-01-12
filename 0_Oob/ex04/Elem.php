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
}

?>