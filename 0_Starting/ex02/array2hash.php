<?php

function array2hash($array)
{
    $result = array();

    foreach ($array as $person) 
    {
        $name = $person[0];
        $age  = $person[1];

        $result[$age] = $name;
    }

    return $result;
    print_r(array2hash($array));
}

?>