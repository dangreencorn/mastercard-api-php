<?php

namespace Mastercard\services\Repower\Repower\domain;

class AccountBalance
{
	private $value;
	private $currency;
	
	function getValue(){
		return $this->value;
	}
	
	function getCurrency(){
		return $this->currency;
	}
	
	function setValue($value){
		$this->value = $value;
	}
	
	function setCurrency($value){
		$this->currency = $value;
	}
	
	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>