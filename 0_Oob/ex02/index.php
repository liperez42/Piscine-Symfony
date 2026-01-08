<?php

require 'TemplateEngine.php';
require 'HotBeverage.php';
require 'Coffee.php';
require 'Tea.php';

$templateEngine = new TemplateEngine();

$templateEngine->createFile(new Coffee());
$templateEngine->createFile(new Tea());

?>