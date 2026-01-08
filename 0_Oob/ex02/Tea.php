<?php

class Tea extends HotBeverage {

    private $description;
    private $comment;

    function __construct()
    {
        $this->name = "Tea";
        $this->_price = "";
        $this->_resistence = "";
        $this->description = "";
        $this->comment = "";
    }

    function get_description()
    {
        return $this->description;
    }

    function get_comment()
    {
        return $this->comment;
    }
}

?>