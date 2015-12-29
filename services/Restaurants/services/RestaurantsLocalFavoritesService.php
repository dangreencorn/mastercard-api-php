<?php

namespace Mastercard\services\Restaurants\services;

use \Mastercard\services\Restaurants\domain\options\RestaurantsLocalFavoritesRequestOptions;
use \Mastercard\services\Restaurants\domain\restaurant\Address;
use \Mastercard\services\Restaurants\domain\countries\Country;
use \Mastercard\services\Restaurants\domain\countrySubdivisions\CountrySubdivision;
use \Mastercard\services\Restaurants\domain\restaurant\Location;
use \Mastercard\services\Restaurants\domain\restaurant\Point;
use \Mastercard\services\Restaurants\domain\restaurant\Restaurants;
use \Mastercard\services\Restaurants\domain\restaurant\Restaurant;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\common\URLUtil;

class RestaurantsLocalFavoritesService extends Connector{



    private $SANDBOX_URL = 'https://sandbox.api.mastercard.com/restaurants/v1/restaurant?Format=XML';
    private $PRODUCTION_URL = 'https://api.mastercard.com/restaurants/v1/restaurant?Format=XML';

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getRestaurants(RestaurantsLocalFavoritesRequestOptions $options)
    {
        $response = parent::doSimpleRequest($this->getURL($options),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildAtms($xml);
    }

    private function getURL(RestaurantsLocalFavoritesRequestOptions $options)
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

        $url = URLUtil::addQueryParameter($url, "PageLength", $options->getPageLength());
        $url = URLUtil::addQueryParameter($url, "PageOffset", $options->getPageOffset());
        $url = URLUtil::addQueryParameter($url, "AddressLine1", $options->getAddressLine1());
        $url = URLUtil::addQueryParameter($url, "AddressLine2", $options->getAddressLine2());
        $url = URLUtil::addQueryParameter($url, "City", $options->getCity());
        $url = URLUtil::addQueryParameter($url, "CountrySubdivision", $options->getCountrySubdivision());
        $url = URLUtil::addQueryParameter($url, "PostalCode", $options->getPostalCode());
        $url = URLUtil::addQueryParameter($url, "Country", $options->getCountry());
        $url = URLUtil::addQueryParameter($url, "Latitude", $options->getLatitude());
        $url = URLUtil::addQueryParameter($url, "Longitude", $options->getLongitude());
        $url = URLUtil::addQueryParameter($url, "DistanceUnit", $options->getDistanceUnit());
        $url = URLUtil::addQueryParameter($url, "Radius", $options->getRadius());
        return $url;
    }

    public function buildAtms($xml)
    {
        $pageOffset = (string)$xml->PageOffset;
        $totalCount = (string)$xml->TotalCount;

        $restaurantArray = array();
        foreach ($xml->Restaurant as $restaurant)
        {
            $tmpRestaurant = new Restaurant();
            $tmpRestaurant->setId((string)$restaurant->Id);
            $tmpRestaurant->setName((string)$restaurant->Name);
            $tmpRestaurant->setWebsiteUrl((string)$restaurant->WebsiteUrl);
            $tmpRestaurant->setPhoneNumber((string)$restaurant->PhoneNumber);
            $tmpRestaurant->setCategory((string)$restaurant->Category);
            $tmpRestaurant->setLocalFavoriteInd((string)$restaurant->LocalFavoriteInd);
            $tmpRestaurant->setHiddenGemInd((string)$restaurant->HiddenGemInd);

            $tmpLocation = new Location();
            $location = $restaurant->Location;
            $tmpLocation->setName((string)$location->Name);
            $tmpLocation->setDistance((string)$location->Distance);
            $tmpLocation->setDistanceUnit((string)$location->DistanceUnit);

            $tmpAddress = new Address();
            $address = $location->Address;
            $tmpAddress->setLine1((string)$address->Line1);
            $tmpAddress->setLine2((string)$address->Line2);
            $tmpAddress->setCity((string)$address->City);
            $tmpAddress->setPostalCode((string)$address->PostCode);

            $tmpCountry = new Country();
            $tmpCountry->setName((string)$address->Country->Name);
            $tmpCountry->setCode((string)$address->Country->Code);

            $tmpCountrySubdivision = new CountrySubdivision();
            $tmpCountrySubdivision->setName((string)$address->CountrySubdivision->Name);
            $tmpCountrySubdivision->setCode((string)$address->CountrySubdivision->Code);

            $tmpAddress->setCountry($tmpCountry);
            $tmpAddress->setCountrySubdivision($tmpCountrySubdivision);

            $tmpPoint = new Point();
            $point = $location->Point;
            $tmpPoint->setLatitude((string)$point->Latitude);
            $tmpPoint->setLongitude((string)$point->Longitude);

            $tmpLocation->setPoint($tmpPoint);
            $tmpLocation->setAddress($tmpAddress);
            $tmpRestaurant->setLocation($tmpLocation);
            array_push($restaurantArray, $tmpRestaurant);
        }
        $restaurants = new Restaurants($pageOffset, $totalCount, $restaurantArray);
        return $restaurants;
    }

} 