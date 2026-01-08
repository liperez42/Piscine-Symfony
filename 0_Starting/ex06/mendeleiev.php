<?php

$lines = file("ex06.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$elements = [];
$col = 0;

function getPeriod($number)
{
    if ($number <= 2) return 1;
    if ($number <= 10) return 2;
    if ($number <= 18) return 3;
    if ($number <= 36) return 4;
    if ($number <= 54) return 5;
    if ($number <= 86) return 6;
    return 7;
}


foreach ($lines as $line) {
    list($name, $data) = explode(" = ", $line);

    $infos = [];
    foreach (explode(", ", $data) as $item) {
        list($key, $value) = explode(":", $item, 2);
        $infos[trim($key)] = trim($value);
    }

    $period = getPeriod((int)$infos['number']);
    $elements[$period][(int)$infos['position']] = [
        'name' => $name,
        'number' => $infos['number'],
        'symbol' => $infos['small'],
        'molar' => $infos['molar'],
        'electron' => $infos['electron']
    ];

    $col++;
    if ($col == 18) {
        $period++;
        $col = 0;
    }
}

$html = '<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mendeleiev</title>
    <style>
        table { border-collapse: collapse; }
        td { border: 1px solid black; width:100%; height:100%; vertical-align:center; text-align:center ;}
        h4 { margin: 8px; font-size: 14px; }
        ul { padding-left: 0px; font-size: 14px; list-style-type: none;}
    </style>
</head>
<body>
<table>';

    for ($p = 1; $p <= 7; $p++) {
        $html .= "<tr>";
        for ($g = 0; $g < 18; $g++) {
            if (isset($elements[$p][$g])) {
                $el = $elements[$p][$g];
                $html .= "<td>
                    <h4>{$el['name']}</h4>
                    <ul>
                        <li>{$el['number']}</li>
                        <li>{$el['symbol']}</li>
                        <li>{$el['molar']}</li>
                        <li>{$el['electron']}</li>
                    </ul>
                </td>";
            } else {
                $html .= "<td></td>";
            }
        }
        $html .= "</tr>";
    }

$html .= '</table>
</body>
</html>';

file_put_contents("mendeleiev.html", $html);
?>