<?php

namespace Mastercard\services\MoneySend\domain;

class Country {

    private $AlphaCountryCode;
    private $NumericCountryCode;

    /**
     * @param mixed $AlphaCountryCode
     */
    public function setAlphaCountryCode($AlphaCountryCode)
    {
        $this->AlphaCountryCode = $AlphaCountryCode;
    }

    /**
     * @return mixed
     */
    public function getAlphaCountryCode()
    {
        return $this->AlphaCountryCode;
    }

    /**
     * @param mixed $NumericCountryCode
     */
    public function setNumericCountryCode($NumericCountryCode)
    {
        $this->NumericCountryCode = $NumericCountryCode;
    }

    /**
     * @return mixed
     */
    public function getNumericCountryCode()
    {
        return $this->NumericCountryCode;
    }
}