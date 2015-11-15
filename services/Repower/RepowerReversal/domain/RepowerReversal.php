<?php

namespace Mastercard\services\Repower\RepowerReversal\domain;

class RepowerReversal
{
	private $RequestId;
	private $OriginalRequestId;
	private $TransactionReference;
	private $TransactionHistory;

	function getRequestId(){
		return $this->RequestId;
	}
	function getOriginalRequestId(){
		return $this->OriginalRequestId;
	}
	function getTransactionReference(){
		return $this->TransactionReference;
	}
	function getTransactionHistory(){
		return $this->TransactionHistory;
	}

	function setRequestId($value){
		return $this->RequestId = $value;
	}
	function setOriginalRequestId($value){
		return $this->OriginalRequestId = $value;
	}
	function setTransactionReference($value){
		return $this->TransactionReference = $value;
	}
	function setTransactionHistory($value){
		return $this->TransactionHistory = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>