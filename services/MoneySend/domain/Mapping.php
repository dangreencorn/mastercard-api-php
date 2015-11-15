<?php

namespace Mastercard\services\MoneySend\domain;

class Mapping {

    private $MappingId;
    private $SubscriberId;
    private $AccountUsage;
    private $DefaultIndicator;
    private $Alias;
    private $ICA;
    private $AccountNumber;
    private $CardholderFullName;
    private $Address;
    private $ReceivingEligibility;
    private $ExpiryDate;

    /**
     * @param mixed $AccountNumber
     */
    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }

    /**
     * @param mixed $AccountUsage
     */
    public function setAccountUsage($AccountUsage)
    {
        $this->AccountUsage = $AccountUsage;
    }

    /**
     * @return mixed
     */
    public function getAccountUsage()
    {
        return $this->AccountUsage;
    }

    /**
     * @param mixed $Address
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param mixed $Alias
     */
    public function setAlias($Alias)
    {
        $this->Alias = $Alias;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->Alias;
    }

    /**
     * @param mixed $CardholderFullName
     */
    public function setCardholderFullName($CardholderFullName)
    {
        $this->CardholderFullName = $CardholderFullName;
    }

    /**
     * @return mixed
     */
    public function getCardholderFullName()
    {
        return $this->CardholderFullName;
    }

    /**
     * @param mixed $DefaultIndicator
     */
    public function setDefaultIndicator($DefaultIndicator)
    {
        $this->DefaultIndicator = $DefaultIndicator;
    }

    /**
     * @return mixed
     */
    public function getDefaultIndicator()
    {
        return $this->DefaultIndicator;
    }

    /**
     * @param mixed $ExpiryDate
     */
    public function setExpiryDate($ExpiryDate)
    {
        $this->ExpiryDate = $ExpiryDate;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->ExpiryDate;
    }

    /**
     * @param mixed $ICA
     */
    public function setICA($ICA)
    {
        $this->ICA = $ICA;
    }

    /**
     * @return mixed
     */
    public function getICA()
    {
        return $this->ICA;
    }

    /**
     * @param mixed $MappingId
     */
    public function setMappingId($MappingId)
    {
        $this->MappingId = $MappingId;
    }

    /**
     * @return mixed
     */
    public function getMappingId()
    {
        return $this->MappingId;
    }

    /**
     * @param mixed $ReceivingEligibility
     */
    public function setReceivingEligibility($ReceivingEligibility)
    {
        $this->ReceivingEligibility = $ReceivingEligibility;
    }

    /**
     * @return mixed
     */
    public function getReceivingEligibility()
    {
        return $this->ReceivingEligibility;
    }

    /**
     * @param mixed $SubscriberId
     */
    public function setSubscriberId($SubscriberId)
    {
        $this->SubscriberId = $SubscriberId;
    }

    /**
     * @return mixed
     */
    public function getSubscriberId()
    {
        return $this->SubscriberId;
    }

}