<?php

namespace Mastercard\services\Restaurants\domain\restaurant;

class Point
{
	private $Latitude;
	private $Longitude;

	function getLatitude(){
		return $this->Latitude;
	}
	function getLongitude(){
		return $this->Longitude;
	}

	function setLatitude($value){
		return $this->Latitude = $value;
	}
	function setLongitude($value){
		return $this->Longitude = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>