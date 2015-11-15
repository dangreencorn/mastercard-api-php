<?php

namespace Mastercard\services\Restaurants\services;

use ..\domain\options\CountrySubdivisionsLocalFavoritesRequestOptions;
use ..\domain\country_subdivisions\CountrySubdivisions;
use ..\domain\country_subdivisions\CountrySubdivision;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\common\URLUtil;

class CountrySubdivisionsLocalFavoritesService extends Connector {

    private $environment;

    private $SANDBOX_URL = 'https://sandbox.api.mastercard.com/restaurants/v1/countrysubdivision?Format=XML';
    private $PRODUCTION_URL = 'https://api.mastercard.com/restaurants/v1/countrysubdivision?Format=XML';

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getCountrySubdivisions(CountrySubdivisionsLocalFavoritesRequestOptions $options)
    {
        $response = parent::doSimpleRequest($this->getURL($options),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildCountrySubdivisions($xml);
    }

    private function getURL(CountrySubdivisionsLocalFavoritesRequestOptions $options)
    {
        $url = "";

        if ($this->environment == Environment::PRODUCTION)
        {
            $url = $this->PRODUCTION_URL;
        }
        else
        {
            $url = $this->SANDBOX_URL;
        }

        $url = URLUtil::addQueryParameter($url, "Country", $options->getCountry());
        return $url;
    }

    private function buildCountrySubdivisions($xml)
    {
        $countrySubdivisions = new CountrySubdivisions();
        $countrySubdivisionArray = array();
        foreach($xml->CountrySubdivision as $country)
        {
            $tmpCountrySubdivision = new CountrySubdivision();
            $tmpCountrySubdivision->setCode((string)$country->Code);
            $tmpCountrySubdivision->setName((string)$country->Name);
            array_push($countrySubdivisionArray, $tmpCountrySubdivision);
        }
        $countrySubdivisions->setCountrySubdivision($countrySubdivisionArray);
        return $countrySubdivisions;
    }
} 