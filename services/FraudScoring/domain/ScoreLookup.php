<?php

namespace Mastercard\services\FraudScoring\domain;

class ScoreLookup
{
	private $CustomerIdentifier;
	private $RequestTimestamp;
	private $TransactionDetail;
	private $ScoreResponse;

	function getCustomerIdentifier(){
		return $this->CustomerIdentifier;
	}
	function getRequestTimestamp(){
		return $this->RequestTimestamp;
	}
	function getTransactionDetail(){
		return $this->TransactionDetail;
	}
	function getScoreResponse(){
		return $this->ScoreResponse;
	}

	function setCustomerIdentifier($value){
		return $this->CustomerIdentifier = $value;
	}
	function setRequestTimestamp($value){
		return $this->RequestTimestamp = $value;
	}
	function setTransactionDetail($value){
		return $this->TransactionDetail = $value;
	}
	function setScoreResponse($value){
		return $this->ScoreResponse = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>