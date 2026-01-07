<?php

$file = fopen("ex06.txt");



$elements;

$grid = [];

foreach($elements as $el)
{
    $grid[$el['period']][$el['group']] = $el;
}


$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Mendeleiev </title>
    <style>

    </style>
</head>

<body>
    <table>';
    for ($period = 1; $period != 7; $period++)
    {
        $html .= '<tr>';
        for ($group = 1; $group != 18; $group++)
        {
            $html .= "<td>";



            
            $html .= '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>;
</body>;

</html>';

file_put_contents("mendeleiev.html", $html);
?>