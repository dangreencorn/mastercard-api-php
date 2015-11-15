<?php

namespace Mastercard\services\location\domain\common\countries;

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