<?php

namespace Mastercard\services\location\domain\merchants\merchants;

class CashBack
{
	private $MaximumAmount;

	function getMaximumAmount(){
		return $this->MaximumAmount;
	}

	function setMaximumAmount($value){
		return $this->MaximumAmount = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>