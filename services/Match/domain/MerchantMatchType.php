<?php

namespace Mastercard\services\Match\domain;

class MerchantMatchType {
    private $name;
    private $doingBusinessAsName;
    private $phoneNumber;
    private $address;
    private $countrySubdivisionTaxId;
    private $nationalTaxId;
    private $principalMatch;

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

    public function setCountrySubdivisionTaxId($countrySubdivisionTaxId){
        $this->countrySubdivisionTaxId = $countrySubdivisionTaxId;
    }

    public function getNationalTaxId(){
        return $this->nationalTaxId;
    }

    public function setNationalTaxId($nationalTaxId){
        $this->nationalTaxId = $nationalTaxId;
    }

    public function getPrincipalMatch(){
        return $this->principalMatch;
    }

    public function setPrincipalMatch($principalMatch){
        $this->principalMatch = $principalMatch;
    }
} 