<?php

namespace Mastercard\services\location\domain\merchants\merchants;

class PayPass
{
	private $Concession;
	private $Pharmacy;
	private $FuelPump;
	private $TollBooth;
	private $DriveThru;
	private $Register;
	private $Ticketing;
	private $VendingMachine;

	function getConcession(){
		return $this->Concession;
	}
	function getPharmacy(){
		return $this->Pharmacy;
	}
	function getFuelPump(){
		return $this->FuelPump;
	}
	function getTollBooth(){
		return $this->TollBooth;
	}
	function getDriveThru(){
		return $this->DriveThru;
	}
	function getRegister(){
		return $this->Register;
	}
	function getTicketing(){
		return $this->Ticketing;
	}
	function getVendingMachine(){
		return $this->VendingMachine;
	}

	function setConcession($value){
		return $this->Concession = $value;
	}
	function setPharmacy($value){
		return $this->Pharmacy = $value;
	}
	function setFuelPump($value){
		return $this->FuelPump = $value;
	}
	function setTollBooth($value){
		return $this->TollBooth = $value;
	}
	function setDriveThru($value){
		return $this->DriveThru = $value;
	}
	function setRegister($value){
		return $this->Register = $value;
	}
	function setTicketing($value){
		return $this->Ticketing = $value;
	}
	function setVendingMachine($value){
		return $this->VendingMachine = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>