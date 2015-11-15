<?php

namespace Mastercard\services\location\domain\options\merchants;

class CountryMerchantLocationRequestOptions {

    private $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }
} 