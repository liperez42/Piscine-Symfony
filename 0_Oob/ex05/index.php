<?php

require 'TemplateEngine.php';
require 'MyException.php';
require 'Elem.php';

$html = new Elem('html');

$head = new Elem('head');
$head->pushElement(new Elem('meta', null, ['charset' => 'UTF-8']));
$head->pushElement(new Elem('title', 'My page'));

$body = new Elem('body');

$para = new Elem('p', 'Lorem ipsum', ['class' => 'text-muted']);
$body->pushElement($para);

$table = new Elem('table');
$tr = new Elem('tr');
$tr->pushElement(new Elem('td', 'Cell'));
$table->pushElement($tr);
$body->pushElement($table);

$ul = new Elem('ul');
$ul->pushElement(new Elem('li', 'Item'));

$body->pushElement($ul);

$html->pushElement($head);
$html->pushElement($body);


$file = new TemplateEngine($html);
$file->createFile('index.html');

if ($html->validPage() === true)
    print "HTML valid !";
else
    print "Error: HTML invalid.";
?>