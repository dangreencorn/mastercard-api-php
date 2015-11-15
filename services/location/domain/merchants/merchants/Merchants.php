<?php

namespace Mastercard\services\location\domain\merchants\merchants;

class Merchants
{
	private $PageOffset;
	private $TotalCount;
	private $Merchant;

	function getPageOffset(){
		return $this->PageOffset;
	}
	function getTotalCount(){
		return $this->TotalCount;
	}
	function getMerchant(){
		return $this->Merchant;
	}

	function setPageOffset($value){
		return $this->PageOffset = $value;
	}
	function setTotalCount($value){
		return $this->TotalCount = $value;
	}
	function setMerchant($value){
		return $this->Merchant = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>