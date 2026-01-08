<?php

require 'TemplateEngine.php';
require 'HotBeverage.php';
require 'Coffee.php';
require 'Tea.php';

$coffee = new Coffee();

$tea = new Tea();


$templateEngine = new TemplateEngine();
$templateEngine->createFile("acnh.html", $text);

?>