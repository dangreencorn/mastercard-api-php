<?php

namespace Mastercard\services\Repower\Repower\domain;

class TransactionHistory
{
	private $Transaction;

	function getTransaction(){
		return $this->Transaction;
	}

	function setTransaction($value){
		return $this->Transaction = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>