<?php

namespace Mastercard\services\FraudScoring\domain;

class ScoreLookupRequest
{
	private $TransactionDetail;

	function getTransactionDetail(){
		return $this->TransactionDetail;
	}

	function setTransactionDetail($value){
		return $this->TransactionDetail = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>