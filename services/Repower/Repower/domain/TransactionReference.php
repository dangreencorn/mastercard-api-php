<?php

namespace Mastercard\services\Repower\Repower\domain;

class TransactionReference
{
	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>