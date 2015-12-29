<?php

namespace Mastercard\services\MerchantIdentifier\domain;

class MerchantIds
{
	private $Message;
	private $ReturnedMerchants;

	function getMessage(){
		return $this->Message;
	}
	function getReturnedMerchants(){
		return $this->ReturnedMerchants;
	}

	function setMessage($value){
		return $this->Message = $value;
	}
	function setReturnedMerchants($value){
		return $this->ReturnedMerchants = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>