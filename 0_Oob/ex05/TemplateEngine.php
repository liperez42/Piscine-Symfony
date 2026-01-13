<?php

class TemplateEngine {

    private Elem $elem;

    function __construct(Elem $elem)
    {
        $this->elem = $elem;
    }

    public function createFile($fileName)
    {
        $content = "<!DOCTYPE html>\n" . $this->elem->getHTML();

        file_put_contents($fileName, $content);
    }
}

?>