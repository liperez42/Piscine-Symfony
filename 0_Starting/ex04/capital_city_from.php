<?php

function    capital_city_from($name)
{
    $states = [
        'Oregon' => 'OR',
        'Alabama' => 'AL',
        'New Jersey' => 'NJ',
        'Colorado' => 'CO',
    ];
    $capitals = [
        'OR' => 'Salem',
        'AL' => 'Montgomery',
        'NJ' => 'trenton',
        'KS' => 'Topeka',
    ];

    if (!isset($states[$name]))
        return "Unknown\n";

    $code = $states[$name];

    if (isset($capitals[$code]))
        return $capitals[$code] . "\n";
    else
        return "Unknown\n";

}
?>