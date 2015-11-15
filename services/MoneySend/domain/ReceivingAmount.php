<?php

namespace Mastercard\services\MoneySend\domain;

class ReceivingAmount {

    private $Value;
    private $Currency;

    /**
     * @param mixed $Currency
     */
    public function setCurrency($Currency)
    {
        $this->Currency = $Currency;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->Currency;
    }

    /**
     * @param mixed $Value
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->Value;
    }

}