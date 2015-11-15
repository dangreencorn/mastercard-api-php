<?php

namespace Mastercard\services\MoneySend\domain;

class CreateMappingRequest
{
    private $SubscriberId;
    private $SubscriberType;
    private $AccountUsage;
    private $DefaultIndicator;
    private $Alias;
    private $ICA;
    private $AccountNumber;
    private $ExpiryDate;
    private $CardholderFullName;
    private $Address;
    private $DateOfBirth;

    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;
    }

    public function setAccountUsage($AccountUsage)
    {
        $this->AccountUsage = $AccountUsage;
    }

    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function setAlias($Alias)
    {
        $this->Alias = $Alias;
    }

    public function setCardholderFullName($CardholderFullName)
    {
        $this->CardholderFullName = $CardholderFullName;
    }

    public function setDateOfBirth($DateOfBirth)
    {
        $this->DateOfBirth = $DateOfBirth;
    }

    public function setDefaultIndicator($DefaultIndicator)
    {
        $this->DefaultIndicator = $DefaultIndicator;
    }

    public function setExpiryDate($ExpiryDate)
    {
        $this->ExpiryDate = $ExpiryDate;
    }

    public function setICA($ICA)
    {
        $this->ICA = $ICA;
    }

    public function setSubscriberId($SubscriberId)
    {
        $this->SubscriberId = $SubscriberId;
    }

    public function setSubscriberType($SubscriberType)
    {
        $this->SubscriberType = $SubscriberType;
    }

    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }

    public function getAccountUsage()
    {
        return $this->AccountUsage;
    }

    public function getAddress()
    {
        return $this->Address;
    }

    public function getAlias()
    {
        return $this->Alias;
    }

    public function getCardholderFullName()
    {
        return $this->CardholderFullName;
    }

    public function getDateOfBirth()
    {
        return $this->DateOfBirth;
    }

    public function getDefaultIndicator()
    {
        return $this->DefaultIndicator;
    }

    public function getExpiryDate()
    {
        return $this->ExpiryDate;
    }

    public function getICA()
    {
        return $this->ICA;
    }

    public function getSubscriberId()
    {
        return $this->SubscriberId;
    }

    public function getSubscriberType()
    {
        return $this->SubscriberType;
    }

}