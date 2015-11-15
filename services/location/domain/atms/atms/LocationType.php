<?php

namespace Mastercard\services\location\domain\atms\atms;

class LocationType
{
	private $Type;

	function getType(){
		return $this->Type;
	}

	function setType($value){
		return $this->Type = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>