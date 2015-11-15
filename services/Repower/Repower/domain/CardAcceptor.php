<?php

namespace Mastercard\services\Repower\Repower\domain;

class CardAcceptor
{
	private $Name;
	private $City;
	private $State;
	private $PostalCode;
	private $Country;

	function getName(){
		return $this->Name;
	}
	function getCity(){
		return $this->City;
	}
	function getState(){
		return $this->State;
	}
	function getPostalCode(){
		return $this->PostalCode;
	}
	function getCountry(){
		return $this->Country;
	}

	function setName($value){
		return $this->Name = $value;
	}
	function setCity($value){
		return $this->City = $value;
	}
	function setState($value){
		return $this->State = $value;
	}
	function setPostalCode($value){
		return $this->PostalCode = $value;
	}
	function setCountry($value){
		return $this->Country = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>