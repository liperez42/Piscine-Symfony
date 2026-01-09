<?php

require 'TemplateEngine.php';
require 'Text.php';

$text = new Text(["ACNH par Tom Nook, 24,99€. "]);
$text->append("Come discover the new Animal Crossing game where you will be able to terraform on an island and have a peaceful life with the villagers around you");

$templateEngine = new TemplateEngine();
$templateEngine->createFile("acnh.html", $text);

?>