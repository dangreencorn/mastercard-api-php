<?php

namespace Mastercard\services\MerchantIdentifier\domain;

class Merchant
{
	private $Address;
	private $PhoneNumber;
	private $BrandName;
	private $MerchantCategory;
	private $MerchantDbaName;
	private $DescriptorText;
	private $LegalCorporateName;
	private $BrickCount;
	private $Comment;
	private $LocationId;
	private $OnlineCount;
	private $OtherCount;
	private $SoleProprietorName;

	function getAddress(){
		return $this->Address;
	}
	function getPhoneNumber(){
		return $this->PhoneNumber;
	}
	function getBrandName(){
		return $this->BrandName;
	}
	function getMerchantCategory(){
		return $this->MerchantCategory;
	}
	function getMerchantDbaName(){
		return $this->MerchantDbaName;
	}
	function getDescriptorText(){
		return $this->DescriptorText;
	}
	function getLegalCorporateName(){
		return $this->LegalCorporateName;
	}
	function getBrickCount(){
		return $this->BrickCount;
	}
	function getComment(){
		return $this->Comment;
	}
	function getLocationId(){
		return $this->LocationId;
	}
	function getOnlineCount(){
		return $this->OnlineCount;
	}
	function getOtherCount(){
		return $this->OtherCount;
	}
	function getSoleProprietorName(){
		return $this->SoleProprietorName;
	}

	function setAddress($value){
		return $this->Address = $value;
	}
	function setPhoneNumber($value){
		return $this->PhoneNumber = $value;
	}
	function setBrandName($value){
		return $this->BrandName = $value;
	}
	function setMerchantCategory($value){
		return $this->MerchantCategory = $value;
	}
	function setMerchantDbaName($value){
		return $this->MerchantDbaName = $value;
	}
	function setDescriptorText($value){
		return $this->DescriptorText = $value;
	}
	function setLegalCorporateName($value){
		return $this->LegalCorporateName = $value;
	}
	function setBrickCount($value){
		return $this->BrickCount = $value;
	}
	function setComment($value){
		return $this->Comment = $value;
	}
	function setLocationId($value){
		return $this->LocationId = $value;
	}
	function setOnlineCount($value){
		return $this->OnlineCount = $value;
	}
	function setOtherCount($value){
		return $this->OtherCount = $value;
	}
	function setSoleProprietorName($value){
		return $this->SoleProprietorName = $value;
	}

	function hasAttribute($attributeName){
		return property_exists($this, "_$attributeName");
	}
}

?>