<?php

require 'TemplateEngine.php';
require 'MyException.php';
require 'Elem.php';

$html = new Elem('html');
$body = new Elem('body');
$body->pushElement(new Elem('p', 'Lorem ipsum'));
$body->pushElement(new Elem('h2', 'Lorem ipsum'));
$body->pushElement(new Elem('ty', 'Lorem ipsum'));
$body->pushElement(new Elem('br', 'Lorem ipsum'));
$body->pushElement(new Elem('h1', 'End of line'));

$html->pushElement($body);

$engine = new TemplateEngine($html);
$engine->createFile('index.html');

?>