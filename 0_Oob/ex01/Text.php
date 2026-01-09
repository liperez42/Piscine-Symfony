<?php

class Text {

    private array $content;

    function __construct(array $text)
    {
        $this->content = $text;
    }

    function    append($str)
    {
        $this->content[] = $str;
    }

    function    readData()
    {
        $text = "";

        foreach ($this->content as $paragraph)
        {
            $text .= "<p>" . htmlspecialchars($paragraph) . "</p>\n\t";
        }
        return $text;
    }
}

?>