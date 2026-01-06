<?php

function array2hash_sorted($array)
{
    $result = array();

    rsort($array);
    foreach ($array as $person) 
    {
        $name = $person[0];
        $age  = $person[1];

        $result[$name] = $age;
    }
    return $result;


    print_r(array2hash_sorted($array));
}

?>