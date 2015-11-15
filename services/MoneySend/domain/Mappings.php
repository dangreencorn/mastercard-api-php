<?php

namespace Mastercard\services\MoneySend\domain;

class Mappings {

    private $Mapping;

    public function setMapping($Mapping)
    {
        $this->Mapping = $Mapping;
    }

    public function getMapping()
    {
        return $this->Mapping;
    }
}