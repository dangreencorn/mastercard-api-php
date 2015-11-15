<?php

namespace Mastercard\services\location\domain\merchants\merchants;

class Country
{
	private $Name;
	private $Code;

	function getName(){
		return $this->Name;
	}
	function getCode(){
		return $this->Code;
	}

	function setName($value){
		return $this->Name = $value;
	}
	function setCode($value){
		return $this->Code = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>