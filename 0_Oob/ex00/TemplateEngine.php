<?php

class TemplateEngine {

    function createFile($fileName, $templateName, $parameters)
    {
        $content = file_get_contents($templateName);

        foreach ($parameters as $key => $value)
        {
            $tmp = "{" . $key . "}";

            while (($pos = strpos($content, $tmp) )!== false)
            {
                $content = substr_replace($content, $value, $pos, strlen($tmp));
            }
        }
        file_put_contents($fileName, $content);
    }
}

?>
