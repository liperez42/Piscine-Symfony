<?php

class Tea extends HotBeverage {

    private $description;
    private $comment;

    function __construct()
    {
        parent::__construct("Tea", 2.5, 2);
        $this->description = "Tea scented with the aroma of jasmine blossoms.";
        $this->comment = "Excellent tea for a nice break !";
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