<?php

namespace Mastercard\services\Fraud-Scoring\domain;

class TransactionDetail
{
	private $CustomerIdentifier;
	private $MerchantIdentifier;
	private $AccountNumber;
	private $AccountPrefix;
	private $AccountSuffix;
	private $TransactionAmount;
	private $TransactionDate;
	private $TransactionTime;
	private $BankNetReferenceNumber;
	private $Stan;

	function getCustomerIdentifier(){
		return $this->CustomerIdentifier;
	}
	function getMerchantIdentifier(){
		return $this->MerchantIdentifier;
	}
	function getAccountNumber(){
		return $this->AccountNumber;
	}
	function getAccountPrefix(){
		return $this->AccountPrefix;
	}
	function getAccountSuffix(){
		return $this->AccountSuffix;
	}
	function getTransactionAmount(){
		return $this->TransactionAmount;
	}
	function getTransactionDate(){
		return $this->TransactionDate;
	}
	function getTransactionTime(){
		return $this->TransactionTime;
	}
	function getBankNetReferenceNumber(){
		return $this->BankNetReferenceNumber;
	}
	function getStan(){
		return $this->Stan;
	}

	function setCustomerIdentifier($value){
		return $this->CustomerIdentifier = $value;
	}
	function setMerchantIdentifier($value){
		return $this->MerchantIdentifier = $value;
	}
	function setAccountNumber($value){
		return $this->AccountNumber = $value;
	}
	function setAccountPrefix($value){
		return $this->AccountPrefix = $value;
	}
	function setAccountSuffix($value){
		return $this->AccountSuffix = $value;
	}
	function setTransactionAmount($value){
		return $this->TransactionAmount = $value;
	}
	function setTransactionDate($value){
		return $this->TransactionDate = $value;
	}
	function setTransactionTime($value){
		return $this->TransactionTime = $value;
	}
	function setBankNetReferenceNumber($value){
		return $this->BankNetReferenceNumber = $value;
	}
	function setStan($value){
		return $this->Stan = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>