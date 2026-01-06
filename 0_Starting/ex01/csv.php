<?php

$text = file_get_contents('ex01.txt');
$words = explode(",", trim($text));

foreach ($words as $word)
    echo $word . PHP_EOL;
?>