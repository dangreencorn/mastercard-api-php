<?php

namespace Mastercard\services\Restaurants\domain\restaurant;

class Restaurants {
    private $PageOffset;
    private $TotalCount;
    private $Restaurant;

    public function __construct($PageOffset, $TotalCount, $Restaurant)
    {
        $this->PageOffset = $PageOffset;
        $this->TotalCount = $TotalCount;
        $this->Restaurant = $Restaurant;
    }

    function getPageOffset(){
        return $this->PageOffset;
    }
    function getTotalCount(){
        return $this->TotalCount;
    }
    function getRestaurant(){
        return $this->Restaurant;
    }

    function setPageOffset($value){
        return $this->PageOffset = $value;
    }
    function setTotalCount($value){
        return $this->TotalCount = $value;
    }
    function setRestaurant($value){
        return $this->Restaurant = $value;
    }

    function hasAttribute($attributeName){
        return property_exists($this, "_$attributeName");
    }
}

?>