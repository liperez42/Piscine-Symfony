<?php

class Text {

    private $content;

    function __construct($text)
    {
        $this->content = $text;
    }

    function    append($str)
    {
        $this->content .= $str;
    }

    function    readData($str)
    {
        
    }
}

?>