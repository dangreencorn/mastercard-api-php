<?php

namespace Mastercard\services\Restaurants\services;

use ..\domaincountries\Countries;
use ..\domaincountries\Country;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;

class CountriesLocalFavoritesService extends Connector {

    private $environment;

    private $SANDBOX_URL = 'https://sandbox.api.mastercard.com/restaurants/v1/country?Format=XML';
    private $PRODUCTION_URL = 'https://api.mastercard.com/restaurants/v1/country?Format=XML';

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
            $url = $this->PRODUCTION_URL;
        }
        else
        {
            $url = $this->SANDBOX_URL;
        }

        return $url;
    }

    private function buildCountries($xml)
    {
        $countries = new Countries();
        $countryArray = array();
        foreach($xml->Country as $country)
        {
            $tmpCountry = new Country();
            $tmpCountry->setCode((string)$country->Code);
            $tmpCountry->setGeoCoding((string)$country->Geocoding);
            $tmpCountry->setName((string)$country->Name);
            array_push($countryArray, $tmpCountry);
        }
        $countries->setCountry($countryArray);
        return $countries;
    }
} 