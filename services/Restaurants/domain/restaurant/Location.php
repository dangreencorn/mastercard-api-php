<?php

namespace Mastercard\services\Restaurants\domain\restaurant;

class Location
{
	private $Name;
	private $Distance;
	private $DistanceUnit;
	private $Address;
	private $Point;

	function getName(){
		return $this->Name;
	}
	function getDistance(){
		return $this->Distance;
	}
	function getDistanceUnit(){
		return $this->DistanceUnit;
	}
	function getAddress(){
		return $this->Address;
	}
	function getPoint(){
		return $this->Point;
	}

	function setName($value){
		return $this->Name = $value;
	}
	function setDistance($value){
		return $this->Distance = $value;
	}
	function setDistanceUnit($value){
		return $this->DistanceUnit = $value;
	}
	function setAddress($value){
		return $this->Address = $value;
	}
	function setPoint($value){
		return $this->Point = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>