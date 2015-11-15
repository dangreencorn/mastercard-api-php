<?php

namespace Mastercard\services\Match\domain;

class PrincipalMatchType {
    private $name;
    private $nationalId;
    private $phoneNumber;
    private $address;
    private $driversLicense;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getNationalId(){
        return $this->nationalId;
    }

    public function setNationalId($nationalId){
        $this->nationalId = $nationalId;
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

    public function getDriversLicense(){
        return $this->driversLicense;
    }

    public function setDriversLicense($driversLicense){
        $this->driversLicense = $driversLicense;
    }
} 