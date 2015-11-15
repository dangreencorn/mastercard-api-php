<?php

namespace Mastercard\services\MoneySend\domain;

class CardholderFullName {

    private $CardholderFirstName;
    private $CardholderMiddleName;
    private $CardholderLastName;

    public function setCardholderFirstName($CardholderFirstName)
    {
        $this->CardholderFirstName = $CardholderFirstName;
    }

    public function setCardholderLastName($CardholderLastName)
    {
        $this->CardholderLastName = $CardholderLastName;
    }

    public function setCardholderMiddleName($CardholderMiddleName)
    {
        $this->CardholderMiddleName = $CardholderMiddleName;
    }

    public function getCardholderFirstName()
    {
        return $this->CardholderFirstName;
    }

    public function getCardholderLastName()
    {
        return $this->CardholderLastName;
    }

    public function getCardholderMiddleName()
    {
        return $this->CardholderMiddleName;
    }
}