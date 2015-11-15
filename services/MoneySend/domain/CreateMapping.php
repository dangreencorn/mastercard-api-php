<?php

namespace Mastercard\services\MoneySend\domain;

class CreateMapping {

    private $RequestId;
    private $Mapping;

    public function setMapping($Mapping)
    {
        $this->Mapping = $Mapping;
    }

    public function setRequestId($RequestId)
    {
        $this->RequestId = $RequestId;
    }

    public function getMapping()
    {
        return $this->Mapping;
    }

    public function getRequestId()
    {
        return $this->RequestId;
    }

}