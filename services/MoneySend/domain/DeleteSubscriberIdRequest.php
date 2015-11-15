<?php

namespace Mastercard\services\MoneySend\domain;

class DeleteSubscriberIdRequest {

    private $SubscriberId;
    private $SubscriberType;

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