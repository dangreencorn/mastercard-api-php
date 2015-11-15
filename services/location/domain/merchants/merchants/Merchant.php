<?php

namespace Mastercard\services\location\domain\merchants\merchants;

class Merchant
{
	private $Id;
	private $Name;
	private $WebsiteUrl;
	private $PhoneNumber;
	private $Category;
	private $Location;
	private $Acceptance;
	private $Features;

	function getId(){
		return $this->Id;
	}
	function getName(){
		return $this->Name;
	}
	function getWebsiteUrl(){
		return $this->WebsiteUrl;
	}
	function getPhoneNumber(){
		return $this->PhoneNumber;
	}
	function getCategory(){
		return $this->Category;
	}
	function getLocation(){
		return $this->Location;
	}
	function getAcceptance(){
		return $this->Acceptance;
	}
	function getFeatures(){
		return $this->Features;
	}

	function setId($value){
		return $this->Id = $value;
	}
	function setName($value){
		return $this->Name = $value;
	}
	function setWebsiteUrl($value){
		return $this->WebsiteUrl = $value;
	}
	function setPhoneNumber($value){
		return $this->PhoneNumber = $value;
	}
	function setCategory($value){
		return $this->Category = $value;
	}
	function setLocation($value){
		return $this->Location = $value;
	}
	function setAcceptance($value){
		return $this->Acceptance = $value;
	}
	function setFeatures($value){
		return $this->Features = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>