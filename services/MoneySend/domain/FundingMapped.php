<?php

namespace Mastercard\services\MoneySend\domain;

class FundingMapped {

    private $SubscriberId;
    private $SubscriberType;
    private $SubscriberAlias;

    /**
     * @param mixed $SubscriberAlias
     */
    public function setSubscriberAlias($SubscriberAlias)
    {
        $this->SubscriberAlias = $SubscriberAlias;
    }

    /**
     * @return mixed
     */
    public function getSubscriberAlias()
    {
        return $this->SubscriberAlias;
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

    /**
     * @param mixed $SubscriberType
     */
    public function setSubscriberType($SubscriberType)
    {
        $this->SubscriberType = $SubscriberType;
    }

    /**
     * @return mixed
     */
    public function getSubscriberType()
    {
        return $this->SubscriberType;
    }

}