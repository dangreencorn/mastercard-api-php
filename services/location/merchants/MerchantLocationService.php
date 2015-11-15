<?php

namespace Mastercard\services\location\merchants;

use \Mastercard\services\location\domain\options\merchants\MerchantLocationRequestOptions;
use \Mastercard\services\location\domain\merchants\merchants\Acceptance;
use \Mastercard\services\location\domain\merchants\merchants\Address;
use \Mastercard\services\location\domain\merchants\merchants\Country;
use \Mastercard\services\location\domain\merchants\merchants\CountrySubdivision;
use \Mastercard\services\location\domain\merchants\merchants\Features;
use \Mastercard\services\location\domain\merchants\merchants\Location;
use \Mastercard\services\location\domain\merchants\merchants\Merchants;
use \Mastercard\services\location\domain\merchants\merchants\Merchant;
use \Mastercard\services\location\domain\merchants\merchants\Point;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\common\URLUtil;

class MerchantLocationService extends Connector {

    private $environment;

    private $PRODUCTION_URL = "https://api.mastercard.com/merchants/v1/merchant?Format=XML";
    private $SANDBOX_URL = "https://sandbox.api.mastercard.com/merchants/v1/merchant?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getMerchants(MerchantLocationRequestOptions $options)
    {
        $response = parent::doSimpleRequest($this->getURL($options),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildMerchants($xml);
    }

    private function getURL(MerchantLocationRequestOptions $options)
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

        $url = URLUtil::addQueryParameter($url, "Details", $options->getDetails());
        $url = URLUtil::addQueryParameter($url, "PageOffset", $options->getPageOffset());
        $url = URLUtil::addQueryParameter($url, "PageLength", $options->getPageLength());
        $url = URLUtil::addQueryParameter($url, "Category", $options->getCategory());
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
        $url = URLUtil::addQueryParameter($url, "OfferMerchantId", $options->getMerchantId());
        $url = URLUtil::addQueryParameter($url, "InternationalMaestroAccepted", $options->getInternationalMaestroAccepted());
        return $url;
    }

    public function buildMerchants($xml)
    {
        $merchants = new Merchants();
        $merchants->setPageOffset((string) $xml->PageOffset);
        $merchants->setTotalCount((string) $xml->TotalCount);

        // merchant
        $merchantArray = array();
        foreach ($xml->Merchant as $merchant)
        {
            $tmpMerchant =  new Merchant();
            $tmpMerchant->setId((string)$merchant->Id);
            $tmpMerchant->setName((string)$merchant->Name);
            $tmpMerchant->setWebsiteUrl((string)$merchant->WebsiteUrl);
            $tmpMerchant->setPhoneNumber((string)$merchant->PhoneNumber);
            $tmpMerchant->setCategory((string)$merchant->Category);

            $tmpLocation = new Location();
            $location = $merchant->Location;
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

            // ACCEPTANCE FRAMEWORK NEEDS LOOKED AT <RETURN XML AND DOC DOES NOT HAVE ALL VALUES>
            //$tmpAcceptance = new Acceptance();
            //$acceptance = $merchant->Acceptance;

            // FEATURES FRAMEWORK NEEDS LOOKED AT <RETURN XML AND DOC DOES NOT HAVE ALL VALUES>
            //$tmpFeatures = new Features();
            //$features =  $merchant->Features;

            $tmpLocation->setPoint($tmpPoint);
            $tmpLocation->setAddress($tmpAddress);
            $tmpMerchant->setLocation($tmpLocation);
            array_push($merchantArray, $tmpMerchant);
        }
        $merchants->setMerchant($merchantArray);
        return $merchants;
    }
}