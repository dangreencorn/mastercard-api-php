<?php

namespace Mastercard\services\Repower\Repower\domain;

class Response
{
	private $Code;
	private $Description;

	function getCode(){
		return $this->Code;
	}
	function getDescription(){
		return $this->Description;
	}

	function setCode($value){
		return $this->Code = $value;
	}
	function setDescription($value){
		return $this->Description = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>