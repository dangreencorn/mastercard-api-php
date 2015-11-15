<?php

namespace Mastercard\services\Repower\Repower\domain;

class TransactionAmount
{
	private $Value;
	private $Currency;

	function getValue(){
		return $this->Value;
	}
	function getCurrency(){
		return $this->Currency;
	}

	public function setValue($value){
		return $this->Value = $value;
	}
	function setCurrency($value){
		return $this->Currency = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>