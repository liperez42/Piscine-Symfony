<?php

class HotBeverage {

    public function __construct(protected $name, protected $price, protected $resistance) {}

    function getName()
    {
        return $this->name;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getResistance()
    {
        return $this->resistance;
    }
}

?>
