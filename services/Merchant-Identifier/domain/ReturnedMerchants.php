<?php

namespace Mastercard\services\Merchant-Identifier\domain;

class ReturnedMerchants
{
	private $Merchant;

	function getMerchant() {
		return $this->Merchant;
	}

	function setMerchant($value) {
		return $this->Merchant = $value;
	}

	function hasAttribute($attributeName) {
		return property_exists($this, "_$attributeName");
	}
}

?>