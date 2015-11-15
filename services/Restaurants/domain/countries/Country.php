<?php

namespace Mastercard\services\Restaurants\domain\countries;

class Country
{
	private $Name;
	private $Code;
	private $GeoCoding;

	function getName(){
		return $this->Name;
	}
	function getCode(){
		return $this->Code;
	}
	function getGeoCoding(){
		return $this->GeoCoding;
	}

	function setName($value){
		return $this->Name = $value;
	}
	function setCode($value){
		return $this->Code = $value;
	}
	function setGeoCoding($value){
		return $this->GeoCoding = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>