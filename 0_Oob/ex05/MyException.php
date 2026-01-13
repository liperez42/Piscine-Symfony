<?php

class MyException extends Exception 
{
    function __construct($element)
    {
        parent::__construct("Error: the tag <$element> is invalid.");
    }
}

?>