<?php

namespace Mastercard\services\location\domain\categories;

class Categories
{
	private $Category;

	function getCategory(){
		return $this->Category;
	}

	function setCategory($value){
		return $this->Category = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>