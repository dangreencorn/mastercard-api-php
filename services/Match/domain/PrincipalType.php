<?php

namespace Mastercard\services\Match\domain;

class PrincipalType {
    private $firstName;
    private $lastName;
    private $nationalId;
    private $phoneNumber;
    private $address;
    private $driversLicense;

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function getNationalId(){
        return $this->nationalId;
    }

    public function setNationalId($nationalId){
        return $this->nationalId = $nationalId;
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