<?php

namespace Mastercard\services\Restaurants\domain\countries;

class Countries
{
	private $Country;

	function getCountry(){
		return $this->Country;
	}

	function setCountry($value){
		return $this->Country = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>