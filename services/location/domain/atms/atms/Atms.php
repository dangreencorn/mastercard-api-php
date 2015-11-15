<?php

namespace Mastercard\services\location\domain\atms\atms;

class Atms
{
	private $PageOffset;
	private $TotalCount;
	private $Atm;

	function getPageOffset(){
		return $this->PageOffset;
	}
	function getTotalCount(){
		return $this->TotalCount;
	}
	function getAtm(){
		return $this->Atm;
	}

	function setPageOffset($value){
		return $this->PageOffset = $value;
	}
	function setTotalCount($value){
		return $this->TotalCount = $value;
	}
	function setAtm($value){
		return $this->Atm = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>