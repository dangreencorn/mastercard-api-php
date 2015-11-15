<?php

namespace Mastercard\services\location\domain\options\merchants;

class MerchantLocationRequestOptions {

    private $details;
    private $pageOffset;
    private $pageLength;
    private $category;
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
    private $merchantId;
    private $internationalMaestroAccepted;

    const MILE = "mile";
    const KILOMETER = "kilometer";

    public function __construct($details, $pageOffset, $pageLength)
    {
        $this->details = $details;
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
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
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
     * @param mixed $internationalMaestroAccepted
     */
    public function setInternationalMaestroAccepted($isInternationalMaestroAccepted)
    {
        // only option to pass is 1.  Otherwise we do not use the query parameter.
        if ($isInternationalMaestroAccepted)
        {
            $this->internationalMaestroAccepted = 1;
        }
        else
        {
            $this->internationalMaestroAccepted = null;
        }
    }

    /**
     * @return mixed
     */
    public function getInternationalMaestroAccepted()
    {
        return $this->internationalMaestroAccepted;
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
     * @param mixed $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
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
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
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