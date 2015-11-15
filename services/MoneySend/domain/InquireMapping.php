<?php

namespace Mastercard\services\MoneySend\domain;

class InquireMapping {

    private $RequestId;
    private $Mappings;

    public function setMappings($Mappings)
    {
        $this->Mappings = $Mappings;
    }

    public function getMappings()
    {
        return $this->Mappings;
    }

    public function setRequestId($RequestId)
    {
        $this->RequestId = $RequestId;
    }

    public function getRequestId()
    {
        return $this->RequestId;
    }
}