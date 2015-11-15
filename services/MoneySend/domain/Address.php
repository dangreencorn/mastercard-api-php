<?php

namespace Mastercard\services\MoneySend\domain;

class Address
{
	private $Line1;
	private $Line2;
	private $City;
	private $PostalCode;
	private $CountrySubdivision;
	private $Country;

	function getLine1(){
		return $this->Line1;
	}
	function getLine2(){
		return $this->Line2;
	}
	function getCity(){
		return $this->City;
	}
	function getPostalCode(){
		return $this->PostalCode;
	}
	function getCountrySubdivision(){
		return $this->CountrySubdivision;
	}
	function getCountry(){
		return $this->Country;
	}

	function setLine1($value){
		return $this->Line1 = $value;
	}
	function setLine2($value){
		return $this->Line2 = $value;
	}
	function setCity($value){
		return $this->City = $value;
	}
	function setPostalCode($value){
		return $this->PostalCode = $value;
	}
	function setCountrySubdivision($value){
		return $this->CountrySubdivision = $value;
	}
	function setCountry($value){
		return $this->Country = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>