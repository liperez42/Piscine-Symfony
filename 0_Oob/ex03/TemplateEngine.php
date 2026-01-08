<?php

class TemplateEngine {

    function __construct(Elem $elem)
    {
        $this->elem = $elem;
    }

    public function createFile($fileName)
    {
        $content = "<!DOCTYPE html>" . "<$elem>" . "</$elem>";

        file_put_contents($reflection->getShortName() . ".html", $content);
    }
}

?>