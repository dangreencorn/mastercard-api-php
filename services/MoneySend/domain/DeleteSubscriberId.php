<?php

namespace Mastercard\services\MoneySend\domain;

class DeleteSubscriberId {

    private $RequestId;

    public function setRequestId($RequestId)
    {
        $this->RequestId = $RequestId;
    }

    public function getRequestId()
    {
        return $this->RequestId;
    }
}