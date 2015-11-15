<?php

namespace Mastercard\services\Repower\Repower\domain;

class Channel
{
	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>