<?php

namespace Mastercard\services\MoneySend\domain;

class InquireMappingRequest {

    private $SubscriberId;
    private $SubscriberType;
    private $AccountUsage;
    private $Alias;
    private $DataResponseFlag;

    public function setAccountUsage($AccountUsage)
    {
        $this->AccountUsage = $AccountUsage;
    }

    public function getAccountUsage()
    {
        return $this->AccountUsage;
    }

    public function setAlias($Alias)
    {
        $this->Alias = $Alias;
    }

    public function getAlias()
    {
        return $this->Alias;
    }

    public function setDataResponseFlag($DataResponseFlag)
    {
        $this->DataResponseFlag = $DataResponseFlag;
    }

    public function getDataResponseFlag()
    {
        return $this->DataResponseFlag;
    }

    public function setSubscriberId($SubscriberId)
    {
        $this->SubscriberId = $SubscriberId;
    }

    public function getSubscriberId()
    {
        return $this->SubscriberId;
    }

    public function setSubscriberType($SubscriberType)
    {
        $this->SubscriberType = $SubscriberType;
    }

    public function getSubscriberType()
    {
        return $this->SubscriberType;
    }
}