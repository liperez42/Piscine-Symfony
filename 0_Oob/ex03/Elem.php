<?php

class Elem {

    private array $balise = [
        "meta", "img", "hr", "br",
        "html", "head", "body", "title",
        "h1", "h2", "h3", "h4", "h5", "h6",
        "p", "span", "div" 
    ];

    function __construct($element, $content)
    {
        $this->element = $element;

        if ($content !== null) 
        {
            $this->content[] = $content;
        }
    }
    
    function pushElement($str) 
    {
        $this->element .= $str;
    }

    function getHTML()
    {


        // foreach ()
        // {

        // }
        $html = "<{$this->element}>";





        $html = "</{$this->element}>";

        return $html;
    }


}

?>