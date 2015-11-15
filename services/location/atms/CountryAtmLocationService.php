<?php

namespace Mastercard\services\atms;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\services\location\domain\common\countries\Countries;
use \Mastercard\services\location\domain\common\countries\Country;

class CountryAtmLocationService extends Connector {

    private $environment;

    private $PRODUCTION_URL = "https://api.mastercard.com/atms/v1/country?Format=XML";
    private $SANDBOX_URL = "https://sandbox.api.mastercard.com/atms/v1/country?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getCountries()
    {
        $response = parent::doSimpleRequest($this->getURL(),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildCountries($xml);
    }

    private function getURL()
    {
        if ($this->environment == Environment::PRODUCTION)
        {
            return $this->PRODUCTION_URL;
        }
        else
        {
            return $this->SANDBOX_URL;
        }
    }

    private function buildCountries($xml)
    {
        $countries = new Countries();
        $countryArray = array();
        foreach($xml->Country as $country)
        {
            $tmpCountry = new Country();
            $tmpCountry->setCode((string)$country->Code);
            $tmpCountry->setGeoCoding((string)$country->Geocoded);
            $tmpCountry->setName((string)$country->Name);
            array_push($countryArray, $tmpCountry);
        }
        $countries->setCountry($countryArray);
        return $countries;
    }

} 