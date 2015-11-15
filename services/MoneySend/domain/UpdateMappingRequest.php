<?php

namespace Mastercard\services\MoneySend\domain;

class UpdateMappingRequest {

    private $AccountUsage;
    private $DefaultIndicator;
    private $Alias;
    private $AccountNumber;
    private $ExpiryDate;
    private $CardholderFullName;
    private $Address;
    private $DateOfBirth;

    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;
    }

    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }

    public function setAccountUsage($AccountUsage)
    {
        $this->AccountUsage = $AccountUsage;
    }

    public function getAccountUsage()
    {
        return $this->AccountUsage;
    }

    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function getAddress()
    {
        return $this->Address;
    }

    public function setAlias($Alias)
    {
        $this->Alias = $Alias;
    }

    public function getAlias()
    {
        return $this->Alias;
    }

    public function setCardholderFullName($CardholderFullName)
    {
        $this->CardholderFullName = $CardholderFullName;
    }

    public function getCardholderFullName()
    {
        return $this->CardholderFullName;
    }

    public function setDateOfBirth($DateOfBirth)
    {
        $this->DateOfBirth = $DateOfBirth;
    }

    public function getDateOfBirth()
    {
        return $this->DateOfBirth;
    }

    public function setDefaultIndicator($DefaultIndicator)
    {
        $this->DefaultIndicator = $DefaultIndicator;
    }

    public function getDefaultIndicator()
    {
        return $this->DefaultIndicator;
    }

    public function setExpiryDate($ExpiryDate)
    {
        $this->ExpiryDate = $ExpiryDate;
    }

    public function getExpiryDate()
    {
        return $this->ExpiryDate;
    }
}