<?php

namespace Mastercard\services\Match\domain;

class AddressType {
    private $line1;
    private $line2;
    private $city;
    private $countrySubdivision;
    private $postalCode;
    private $country;

    public function getLine1(){
        return $this->line1;
    }

    public function setLine1($line1){
        $this->line1 = $line1;
    }

    public function getLine2(){
        return $this->line2;
    }

    public function setLine2($line2){
        $this->line2 = $line2;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getCountrySubdivision(){
        return $this->countrySubdivision;
    }

    public function setCountrySubdivision($countrySubdivision){
        $this->countrySubdivision = $countrySubdivision;
    }

    public function getPostalCode(){
        return $this->postalCode;
    }

    public function setPostalCode($postalCode){
        $this->postalCode = $postalCode;
    }

    public function getCountry(){
        return $this->country;
    }

    public function setCountry($country){
        $this->country = $country;
    }
} 