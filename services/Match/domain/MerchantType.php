<?php

namespace Mastercard\services\Match\domain;

class MerchantType {
    private $name;
    private $doingBusinessAsName;
    private $phoneNumber;
    private $address;
    private $countrySubdivisionTaxId;
    private $nationalTaxId;
    private $principal;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDoingBusinessAsName(){
        return $this->doingBusinessAsName;
    }

    public function setDoingBusinessAsName($businessAsName){
        $this->doingBusinessAsName = $businessAsName;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getCountrySubdivisionTaxId(){
        return $this->countrySubdivisionTaxId;
    }

    public function setCountrySubdivisionTaxId($taxId){
        $this->countrySubdivisionTaxId = $taxId;
    }

    public function getNationalTaxId(){
        return $this->nationalTaxId;
    }

    public function setNationalTaxId($nationalTaxId){
        $this->nationalTaxId = $nationalTaxId;
    }

    public function getPrincipal(){
        return $this->principal;
    }

    public function setPrincipal($principal){
        $this->principal = $principal;
    }
}