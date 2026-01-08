<?php

class Coffee extends HotBeverage {

    private $description;
    private $comment;

    function __construct()
    {
        parent::__construct("Coffee", 6.5, 5);
        $this->description = "Black coffee, latte, cappuccino, anything you want for you daily dose of caffeine !";
        $this->comment = "Exactly what we need to stay up for the day !";
    }

    function getDescription()
    {
        return $this->description;
    }

    function getComment()
    {
        return $this->comment;
    }
}

?>