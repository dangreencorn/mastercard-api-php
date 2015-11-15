<?php

namespace Mastercard\services\location\domain\options\merchants;

class CountrySubdivisionMerchantLocationRequestOptions {

    private $details;
    private $country;

    public function __construct($details, $country)
    {
        $this->details = $details;
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }
} 