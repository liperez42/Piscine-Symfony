<?php

require 'TemplateEngine.php';

$templateEngine = new TemplateEngine();

$templateEngine->createFile("blabla.html", "book_description.html", 
[
    'nom' => 'Animal Crossing',
    'auteur' => 'Tom Nook',
    'description' => 'Come discover the new Animal Crossing game where you will be able to terraform on an island and have a peaceful life with the villagers around you',
    'prix' => '24,99'
]);
?>