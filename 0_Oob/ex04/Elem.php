<?php

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
    }
    
    function pushElement($str) 
    {
        $this->content[] = $str;
    }

    function getHTML()
    {

        if (in_array($this->element, self::TAG_SELF_CLOSING))
            return "<{$this->element}>\n";

        $html = "\n<{$this->element}>";

        foreach ($this->content as $item)
        {
            if ($item instanceof Elem)
                $html .= $item->getHTML();
            else
                $html .= $item;
        }

        $html .= "</{$this->element}>\n";

        return $html;
    }
}

?>