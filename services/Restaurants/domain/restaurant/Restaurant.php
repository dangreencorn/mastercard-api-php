<?php

namespace Mastercard\services\Restaurants\domain\restaurant;

class Restaurant
{
	private $Id;
	private $Name;
	private $WebsiteUrl;
	private $PhoneNumber;
	private $Category;
	private $Location;
	private $LocalFavoriteInd;
	private $HiddenGemInd;

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
	function getLocalFavoriteInd(){
		return $this->LocalFavoriteInd;
	}
	function getHiddenGemInd(){
		return $this->HiddenGemInd;
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
	function setLocalFavoriteInd($value){
		return $this->LocalFavoriteInd = $value;
	}
	function setHiddenGemInd($value){
		return $this->HiddenGemInd = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>