<?php

namespace Mastercard\services\location\domain\options\atms;

class AtmLocationRequestOptions {
    private $pageOffset;
    private $pageLength;
    private $addressLine1;
    private $addressLine2;
    private $city;
    private $countrySubdivision;
    private $postalCode;
    private $country;
    private $latitude;
    private $longitude;
    private $distanceUnit;
    private $radius;
    private $supportEmv;

    const MILE = "MILE";
    const KILOMETER = "KILOMETER";

    const SUPPORT_EMV_YES = 1;
    const SUPPORT_EMV_NO = 2;
    const SUPPORT_ENV_UNKNOWN = 0;

    public function __construct($pageOffset, $pageLength)
    {
        $this->pageOffset = $pageOffset;
        $this->pageLength = $pageLength;
        if ($this->pageLength > 25)
        {
            $this->pageLength = 25;
        }
    }

    /**
     * @param mixed $addressLine1
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param mixed $addressLine2
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
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
     * @param mixed $countrySubdivision
     */
    public function setCountrySubdivision($countrySubdivision)
    {
        $this->countrySubdivision = $countrySubdivision;
    }

    /**
     * @return mixed
     */
    public function getCountrySubdivision()
    {
        return $this->countrySubdivision;
    }

    /**
     * @param mixed $distanceUnit
     */
    public function setDistanceUnit($distanceUnit)
    {
        $this->distanceUnit = $distanceUnit;
    }

    /**
     * @return mixed
     */
    public function getDistanceUnit()
    {
        return $this->distanceUnit;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $radius
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
        if ($this->radius > 100)
        {
            $this->radius = 100;
        }
    }

    /**
     * @return mixed
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param mixed $supportEmv
     */
    public function setSupportEmv($supportEmv)
    {
        $this->supportEmv = $supportEmv;
    }

    /**
     * @return mixed
     */
    public function getSupportEmv()
    {
        return $this->supportEmv;
    }

    /**
     * @return int
     */
    public function getPageLength()
    {
        return $this->pageLength;
    }

    /**
     * @return mixed
     */
    public function getPageOffset()
    {
        return $this->pageOffset;
    }
} 