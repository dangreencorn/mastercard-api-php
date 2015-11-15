<?php

namespace Mastercard\services\Repower\RepowerReversal\domain;

class RepowerReversalRequest
{
	private $ICA;
	private $TransactionReference;
	private $ReversalReason;

	function getICA(){
		return $this->ICA;
	}
	function getTransactionReference(){
		return $this->TransactionReference;
	}
	function getReversalReason(){
		return $this->ReversalReason;
	}

	function setICA($value){
		return $this->ICA = $value;
	}
	function setTransactionReference($value){
		return $this->TransactionReference = $value;
	}
	function setReversalReason($value){
		return $this->ReversalReason = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>