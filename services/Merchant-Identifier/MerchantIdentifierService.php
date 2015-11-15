<?php

namespace Mastercard\services\Merchant-Identifier;

use domain/MerchantIdentifierRequestOptions;
use domain/MerchantIds;
use domain/Merchant;
use domain/Address;
use domain/Country;
use domain/CountrySubdivision;
use domain/ReturnedMerchants;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\common\URLUtil;


class MerchantIdentifierService extends Connector {
    private $environment;

    private $PRODUCTION_URL = "https://api.mastercard.com/merchantid/v1/merchantid?Format=XML";
    private $SANDBOX_URL = "https://sandbox.api.mastercard.com/merchantid/v1/merchantid?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getMerchantIds(MerchantIdentifierRequestOptions $options)
    {
        $response = parent::doSimpleRequest($this->getURL($options),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildMerchantIds($xml);
    }

    private function getURL(MerchantIdentifierRequestOptions $options)
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

        $url = URLUtil::addQueryParameter($url, "MerchantId", $options->getMerchantId());
        $url = URLUtil::addQueryParameter($url, "Type", $options->getType());
        return $url;
    }

    public function buildMerchantIds($xml)
    {
        $merchantArray = array();
        foreach ($xml->ReturnedMerchants->Merchant as $merchant)
        {
            $xmlAddress = $merchant->Address;
            $xmlCountrySubdivision = $merchant->Address->CountrySubdivision;
            $xmlCountry = $merchant->Address->Country;
            $xmlMerchant = $merchant;

            $address = new Address();
            $address->setLine1((string)$xmlAddress->Line1);
            $address->setLine2((string)$xmlAddress->Line2);
            $address->setCity((string)$xmlAddress->City);
            $address->setPostalCode((string)$xmlAddress->PostalCode);

            $countrySubdivision = new CountrySubdivision();
            $countrySubdivision->setCode((string)$xmlCountrySubdivision->Code);
            $countrySubdivision->setName((string)$xmlCountrySubdivision->Name);

            $country = new Country();
            $country->setCode((string)$xmlCountry->Code);
            $country->setName((string)$xmlCountry->Name);

            $address->setCountrySubdivision($countrySubdivision);
            $address->setCountry($country);

            $tmpMerchant = new Merchant();
            $tmpMerchant->setAddress($address);
            $tmpMerchant->setPhoneNumber((string)$xmlMerchant->PhoneNumber);
            $tmpMerchant->setBrandName((string)$xmlMerchant->BrandName);
            $tmpMerchant->setMerchantCategory((string)$xmlMerchant->MerchantCategory);
            $tmpMerchant->setMerchantDbaName((string)$xmlMerchant->MerchantDbaName);
            $tmpMerchant->setDescriptorText((string)$xmlMerchant->DescriptorText);
            $tmpMerchant->setLegalCorporateName((string)$xmlMerchant->LegalCorporateName);
            $tmpMerchant->setBrickCount((string)$xmlMerchant->BrickCount);
            $tmpMerchant->setComment((string)$xmlMerchant->Comment);
            $tmpMerchant->setLocationId((string)$xmlMerchant->LocationId);
            $tmpMerchant->setOnlineCount((string)$xmlMerchant->OnlineCount);
            $tmpMerchant->setOtherCount((string)$xmlMerchant->OtherCount);
            $tmpMerchant->setSoleProprietorName((string)$xmlMerchant->SoleProprietorName);
            array_push($merchantArray, $tmpMerchant);
        }
        $returnedMerchants = new ReturnedMerchants();
        $returnedMerchants->setMerchant($merchantArray);

        $merchantIds = new MerchantIds();
        $merchantIds->setReturnedMerchants($returnedMerchants);
        $merchantIds->setMessage($xml->Message);
        return $merchantIds;
    }
} 