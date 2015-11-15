<?php

namespace Mastercard\services\Repower\Repower\domain;

class Transaction
{
	private $Type;
	private $SystemTraceAuditNumber;
	private $NetworkReferenceNumber;
	private $SettlementDate;
	private $Response;
	private $SubmitDateTime;

	function getType(){
		return $this->Type;
	}
	function getSystemTraceAuditNumber(){
		return $this->SystemTraceAuditNumber;
	}
	function getNetworkReferenceNumber(){
		return $this->NetworkReferenceNumber;
	}
	function getSettlementDate(){
		return $this->SettlementDate;
	}
	function getResponse(){
		return $this->Response;
	}
	function getSubmitDateTime(){
		return $this->SubmitDateTime;
	}

	function setType($value){
		return $this->Type = $value;
	}
	function setSystemTraceAuditNumber($value){
		return $this->SystemTraceAuditNumber = $value;
	}
	function setNetworkReferenceNumber($value){
		return $this->NetworkReferenceNumber = $value;
	}
	function setSettlementDate($value){
		return $this->SettlementDate = $value;
	}
	function setResponse($value){
		return $this->Response = $value;
	}
	function setSubmitDateTime($value){
		return $this->SubmitDateTime = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>