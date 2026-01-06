<?php

function search_by_states($name)
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

    $words = explode(", ", $name);

    foreach ($words as $word)
    {
        if (array_key_exists($word, $states)) {
            $code = $states[$word];

            if (isset($capitals[$code])) 
            {
                echo $capitals[$code] . " is the capital of $word.\n";
            } 
            else {
                echo "$word is neither a capital nor a state.\n";
            }
        }
        else if (in_array($word, $capitals))
        {
            $code = array_search($word, $capitals);
            $state = array_search($code, $states);
            if ($state !== false)
                echo "$word is the capital of $state\n";
            else
                echo "$word is neither a capital nor a state.\n";
        }
        else
            echo "$word is neither a capital nor a state.\n";
    }
}
?>