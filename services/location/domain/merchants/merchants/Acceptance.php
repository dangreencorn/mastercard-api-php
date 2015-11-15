<?php

namespace Mastercard\services\location\domain\merchants\merchants;

class Acceptance
{
	private $PayPass;

	function getPayPass(){
		return $this->PayPass;
	}

	function setPayPass($value){
		return $this->PayPass = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>