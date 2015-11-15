<?php

namespace Mastercard\services\Repower\Repower\domain;

class RepowerRequest
{
	private $TransactionReference;
	private $CardNumber;
	private $TransactionAmount;
	private $LocalDate;
	private $LocalTime;
	private $Channel;
	private $ICA;
	private $ProcessorId;
	private $RoutingAndTransitNumber;
	private $MerchantType;
	private $CardAcceptor;


	function getTransactionReference(){
		return $this->TransactionReference;
	}
	function getCardNumber(){
		return $this->CardNumber;
	}
	function getTransactionAmount(){
		return $this->TransactionAmount;
	}
	function getLocalDate(){
		return $this->LocalDate;
	}
	function getLocalTime(){
		return $this->LocalTime;
	}
	function getChannel(){
		return $this->Channel;
	}
	function getICA(){
		return $this->ICA;
	}
	function getProcessorId(){
		return $this->ProcessorId;
	}
	function getRoutingAndTransitNumber(){
		return $this->RoutingAndTransitNumber;
	}
	function getMerchantType(){
		return $this->MerchantType;
	}
	function getCardAcceptor(){
		return $this->CardAcceptor;
	}

	function setTransactionReference($value){
		return $this->TransactionReference = $value;
	}
	function setCardNumber($value){
		return $this->CardNumber = $value;
	}

	function setTransactionAmount($value){
		return $this->TransactionAmount = $value;
	}
	function setLocalDate($value){
		return $this->LocalDate = $value;
	}
	function setLocalTime($value){
		return $this->LocalTime = $value;
	}
	function setChannel($value){
		return $this->Channel = $value;
	}
	function setICA($value){
		return $this->ICA = $value;
	}
	function setProcessorId($value){
		return $this->ProcessorId = $value;
	}
	function setRoutingAndTransitNumber($value){
		return $this->RoutingAndTransitNumber = $value;
	}
	function setMerchantType($value){
		return $this->MerchantType = $value;
	}
	function setCardAcceptor($value){
		return $this->CardAcceptor = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>