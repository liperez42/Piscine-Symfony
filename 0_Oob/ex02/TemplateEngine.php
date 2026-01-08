<?php

class TemplateEngine { 

    function createFile(HotBeverage $text)
    {
        $content = "<!DOCTYPE html>
<html>

<head>
    <title> Animal Crossing </title>
    <style> 
        body {
            background-color: #7db592;
        }
    </style>
</head>

<body>
    " . $text->readData() . "
</body>

</html>";
        
        file_put_contents($fileName, $content);
    }
}
?>