<?php

namespace Mastercard\services\Repower\Repower\domain;

class Repower
{
	private $RequestId;
	private $TransactionReference;
	private $TransactionHistory;
	private $AccountBalance;

	function getRequestId(){
		return $this->RequestId;
	}
	function getTransactionReference(){
		return $this->TransactionReference;
	}
	function getTransactionHistory(){
		return $this->TransactionHistory;
	}
	function getAccountBalance(){
		return $this->AccountBalance;
	}

	function setRequestId($value){
		return $this->RequestId = $value;
	}
	function setTransactionReference($value){
		return $this->TransactionReference = $value;
	}
	function setTransactionHistory($value){
		return $this->TransactionHistory = $value;
	}
	function setAccountBalance($value){
		return $this->AccountBalance = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>