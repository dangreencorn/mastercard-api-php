<?php

namespace Mastercard\services\Match\domain;

class DriversLicenseType {
    private $number;
    private $countySubdivision;
    private $country;

    public function getNumber(){
        return $this->number;
    }

    public function setNumber($number){
        $this->number = $number;
    }

    public function getCountrySubdivision(){
        return $this->countySubdivision;
    }

    public function setCountrySubdivision($countrySubdivision){
        $this->countySubdivision = $countrySubdivision;
    }

    public function getCountry(){
        return $this->country;
    }

    public function setCountry($country){
        $this->country = $country;
    }
}
