<?php

namespace Mastercard\services\MoneySend\domain;

class FundingCard {

    private $AccountNumber;
    private $ExpiryMonth;
    private $ExpiryYear;

    /**
     * @param mixed $AccountNumber
     */
    public function setAccountNumber($AccountNumber)
    {
        $this->AccountNumber = $AccountNumber;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->AccountNumber;
    }

    /**
     * @param mixed $ExpiryMonth
     */
    public function setExpiryMonth($ExpiryMonth)
    {
        $this->ExpiryMonth = $ExpiryMonth;
    }

    /**
     * @return mixed
     */
    public function getExpiryMonth()
    {
        return $this->ExpiryMonth;
    }

    /**
     * @param mixed $ExpiryYear
     */
    public function setExpiryYear($ExpiryYear)
    {
        $this->ExpiryYear = $ExpiryYear;
    }

    /**
     * @return mixed
     */
    public function getExpiryYear()
    {
        return $this->ExpiryYear;
    }

}