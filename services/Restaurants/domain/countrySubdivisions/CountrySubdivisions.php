<?php

namespace Mastercard\services\Restaurants\domain\countrySubdivisions;

class CountrySubdivisions
{
	private $CountrySubdivision;

	function getCountrySubdivision(){
		return $this->CountrySubdivision;
	}

	function setCountrySubdivision($value){
		return $this->CountrySubdivision = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>