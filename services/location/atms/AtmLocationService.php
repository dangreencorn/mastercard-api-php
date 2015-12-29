<?php

namespace Mastercard\services\location\atms;

use \Mastercard\services\location\domain\options\atms\AtmLocationRequestOptions;
use \Mastercard\services\location\domain\atms\atms\Address;
use \Mastercard\services\location\domain\atms\atms\Atm;
use \Mastercard\services\location\domain\atms\atms\Atms;
use \Mastercard\services\location\domain\atms\atms\Country;
use \Mastercard\services\location\domain\atms\atms\CountrySubdivision;
use \Mastercard\services\location\domain\atms\atms\Location;
use \Mastercard\services\location\domain\atms\atms\Point;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\common\URLUtil;

class AtmLocationService extends Connector{



    private $PRODUCTION_URL = "https://api.mastercard.com/atms/v1/atm?Format=XML";
    private $SANDBOX_URL = "https://sandbox.api.mastercard.com/atms/v1/atm?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getAtms(AtmLocationRequestOptions $options)
    {
        $response = parent::doSimpleRequest($this->getURL($options),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildAtms($xml);
    }

    private function getURL(AtmLocationRequestOptions $options)
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
        $url = URLUtil::addQueryParameter($url, "SupportEMV", $options->getSupportEmv());
        return $url;
    }

    public function buildAtms($xml)
    {
        $atms = new Atms();

        $atms->setPageOffset($xml->PageOffset);
        $atms->setTotalCount($xml->TotalCount);

        $atmArray = array();
        foreach ($xml->Atm as $atm)
        {
            $tmpAtm = new Atm();
            $tmpAtm->setHandicapAccessible((string)$atm->HandicapAccessible);
            $tmpAtm->setCamera((string)$atm->Camera);
            $tmpAtm->setAvailability((string)$atm->Availability);
            $tmpAtm->setAccessFees((string)$atm->AccessFees);
            $tmpAtm->setOwner((string)$atm->Owner);
            $tmpAtm->setSharedDeposit((string)$atm->SharedDeposit);
            $tmpAtm->setSurchargeFreeAlliance((string)$atm->SurchargeFreeAlliance);
            $tmpAtm->setSponsor((string)$atm->Sponsor);
            $tmpAtm->setSupportEMV((string)$atm->SupportEMV);
            $tmpAtm->setSurchargeFreeAllianceNetwork((string)$atm->SurchargeFreeAllianceNetwork);

            $tmpLocation = new Location();
            $location = $atm->Location;
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
            $tmpAtm->setLocation($tmpLocation);
            array_push($atmArray, $tmpAtm);
        }
        $atms->setAtm($atmArray);
        return $atms;
    }

} 