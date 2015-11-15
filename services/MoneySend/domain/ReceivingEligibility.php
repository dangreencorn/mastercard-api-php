<?php

namespace Mastercard\services\MoneySend\domain;

class ReceivingEligibility {

    private $Eligible;
    private $ReasonCode;
    private $AccountNumber;
    private $ICA;
    private $Currency;
    private $Country;
    private $Brand;

    /**
     * @param mixed $Brand
     */
    public function setBrand($Brand)
    {
        $this->Brand = $Brand;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->Brand;
    }

    /**
     * @param mixed $Country
     */
    public function setCountry($Country)
    {
        $this->Country = $Country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->Country;
    }

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
     * @param mixed $ICA
     */
    public function setICA($ICA)
    {
        $this->ICA = $ICA;
    }

    /**
     * @return mixed
     */
    public function getICA()
    {
        return $this->ICA;
    }

    /**
     * @param mixed $ReasonCode
     */
    public function setReasonCode($ReasonCode)
    {
        $this->ReasonCode = $ReasonCode;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->ReasonCode;
    }

    /**
     * @param mixed $Eligible
     */
    public function setEligible($Eligible)
    {
        $this->Eligible = $Eligible;
    }

    /**
     * @return mixed
     */
    public function getEligible()
    {
        return $this->Eligible;
    }
}