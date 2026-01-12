<?php

class Elem {

    private $element;
    private array $content = [];

    private const TAG_VALID = [
        "meta", "img", "hr", "br",
        "html", "head", "body", "title",
        "h1", "h2", "h3", "h4", "h5", "h6",
        "p", "span", "div" 
    ];

    private const TAG_SELF_CLOSING = ["meta", "img", "hr", "br"];

    function __construct($element, $content = null)
    {
        if (!in_array($element, self::TAG_VALID))
            throw new InvalidArgumentException("Balise invalid.");

        $this->element = $element;

        if ($content !== null) 
        {
            $this->content[] = $content;
        }
    }
    
    function pushElement($str) 
    {
        $this->content[] = $str;
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
            return $indent . "<{$this->element}>{$content}</{$this->element}>\n";
        }

        $html = $indent . "<{$this->element}>\n";

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