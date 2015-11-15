<?php

namespace Mastercard\services\location\domain\atms\atms;

class Atm
{
	private $Location;
	private $HandicapAccessible;
	private $Camera;
	private $Availability;
	private $AccessFees;
	private $Owner;
	private $SharedDeposit;
	private $SurchargeFreeAlliance;
	private $SurchargeFreeAllianceNetwork;
	private $Sponsor;
	private $SupportEMV;

	function getLocation(){
		return $this->Location;
	}
	function getHandicapAccessible(){
		return $this->HandicapAccessible;
	}
	function getCamera(){
		return $this->Camera;
	}
	function getAvailability(){
		return $this->Availability;
	}
	function getAccessFees(){
		return $this->AccessFees;
	}
	function getOwner(){
		return $this->Owner;
	}
	function getSharedDeposit(){
		return $this->SharedDeposit;
	}
	function getSurchargeFreeAlliance(){
		return $this->SurchargeFreeAlliance;
	}
	function getSurchargeFreeAllianceNetwork(){
		return $this->SurchargeFreeAllianceNetwork;
	}
	function getSponsor(){
		return $this->Sponsor;
	}
	function getSupportEMV(){
		return $this->SupportEMV;
	}

	function setLocation($value){
		return $this->Location = $value;
	}
	function setHandicapAccessible($value){
		return $this->HandicapAccessible = $value;
	}
	function setCamera($value){
		return $this->Camera = $value;
	}
	function setAvailability($value){
		return $this->Availability = $value;
	}
	function setAccessFees($value){
		return $this->AccessFees = $value;
	}
	function setOwner($value){
		return $this->Owner = $value;
	}
	function setSharedDeposit($value){
		return $this->SharedDeposit = $value;
	}
	function setSurchargeFreeAlliance($value){
		return $this->SurchargeFreeAlliance = $value;
	}
	function setSurchargeFreeAllianceNetwork($value){
		return $this->SurchargeFreeAllianceNetwork = $value;
	}
	function setSponsor($value){
		return $this->Sponsor = $value;
	}
	function setSupportEMV($value){
		return $this->SupportEMV = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>