<?php

namespace Mastercard\services\Fraud-Scoring\domain;

class ScoreResponse
{
	private $MatchIndicator;
	private $FraudScore;
	private $ReasonCode;
	private $RulesAdjustedScore;
	private $RulesAdjustedReasonCode;
	private $RulesAdjustedReasonCodeSecondary;

	function getMatchIndicator(){
		return $this->MatchIndicator;
	}
	function getFraudScore(){
		return $this->FraudScore;
	}
	function getReasonCode(){
		return $this->ReasonCode;
	}
	function getRulesAdjustedScore(){
		return $this->RulesAdjustedScore;
	}
	function getRulesAdjustedReasonCode(){
		return $this->RulesAdjustedReasonCode;
	}
	function getRulesAdjustedReasonCodeSecondary(){
		return $this->RulesAdjustedReasonCodeSecondary;
	}

	function setMatchIndicator($value){
		return $this->MatchIndicator = $value;
	}
	function setFraudScore($value){
		return $this->FraudScore = $value;
	}
	function setReasonCode($value){
		return $this->ReasonCode = $value;
	}
	function setRulesAdjustedScore($value){
		return $this->RulesAdjustedScore = $value;
	}
	function setRulesAdjustedReasonCode($value){
		return $this->RulesAdjustedReasonCode = $value;
	}
	function setRulesAdjustedReasonCodeSecondary($value){
		return $this->RulesAdjustedReasonCodeSecondary = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>