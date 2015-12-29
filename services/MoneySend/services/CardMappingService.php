<?php

namespace Mastercard\services\MoneySend\services;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\services\MoneySend\domain\Mapping;
use \Mastercard\services\MoneySend\domain\CreateMapping;
use \Mastercard\services\MoneySend\domain\CreateMappingRequest;
use \Mastercard\services\MoneySend\domain\InquireMappingRequest;
use \Mastercard\services\MoneySend\domain\InquireMapping;
use \Mastercard\services\MoneySend\domain\Mappings;
use \Mastercard\services\MoneySend\domain\ReceivingEligibility;
use \Mastercard\services\MoneySend\domain\CardholderFullName;
use \Mastercard\services\MoneySend\domain\Address;
use \Mastercard\services\MoneySend\domain\Currency;
use \Mastercard\services\MoneySend\domain\Country;
use \Mastercard\services\MoneySend\domain\Brand;
use \Mastercard\services\MoneySend\domain\UpdateMapping;
use \Mastercard\services\MoneySend\domain\options\UpdateMappingRequestOptions;
use \Mastercard\services\MoneySend\domain\options\DeleteMappingRequestOptions;

class CardMappingService extends Connector {

    const SANDBOX_URL = "https://sandbox.api.mastercard.com/moneysend/v2/mapping/card?Format=XML";
    const PRODUCTION_URL = "https://api.mastercard.com/moneysend/v2/mapping/card?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment) {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getCreateMapping(CreateMappingRequest $createMappingRequest) {
        $response = $this->doSimpleRequest($this->getURL(),Connector::POST, $this->generateCreateMappingXML($createMappingRequest));
        $xml = simplexml_load_string($response);
        return $this->buildCreateMapping($xml);
    }

    public function getInquireMapping(InquireMappingRequest $inquireMappingRequest) {
        $response = $this->doSimpleRequest($this->getURL(),Connector::PUT, $this->generateInquireMappingXML($inquireMappingRequest));
        $xml = simplexml_load_string($response);
        return $this->buildInquireMapping($xml);
    }

    public function getUpdateMapping(UpdateMappingRequest $updateMappingRequest, UpdateMappingRequestOptions $options) {
        $response = $this->doSimpleRequest($this->getMappingIdURL($options->getMappingId()),Connector::PUT, $this->generateUpdateMappingXML($updateMappingRequest));
        $xml = simplexml_load_string($response);
        return $this->buildUpdateMapping($xml);
    }

    public function getDeleteMapping(DeleteMappingRequestOptions $options) {
        $response = $this->doSimpleRequest($this->getMappingIdURL($options->getMappingId()), Connector::DELETE);
        $xml = simplexml_load_string($response);
        return $this->buildDeleteMapping($xml);
    }

    private function getURL() {
        if($this->environment == Environment::PRODUCTION){
            return CardMappingService::PRODUCTION_URL;
        }
        else{
            return CardMappingService::SANDBOX_URL;
        }
    }

    private function getMappingIdURL($mappingId) {
        if($this->environment == Environment::PRODUCTION){
            return "https://api.mastercard.com/moneysend/v2/mapping/card/{$mappingId}";
        }
        else{
            return "https://sandbox.api.mastercard.com/moneysend/v2/mapping/card/{$mappingId}";
        }
    }

    private function generateCreateMappingXML(CreateMappingRequest $request) {
        $xml= null;

        $xml  = "<CreateMappingRequest>";
        $xml .=         "<SubscriberId>".$request->getSubscriberId()."</SubscriberId>";
        $xml .=         "<SubscriberType>".$request->getSubscriberType()."</SubscriberType>";
        $xml .=         "<AccountUsage>".$request->getAccountUsage()."</AccountUsage>";
        $xml .=         "<DefaultIndicator>".$request->getDefaultIndicator()."</DefaultIndicator>";
        $xml .=         "<Alias>".$request->getAlias()."</Alias>";
        $xml .=         "<ICA>".$request->getICA()."</ICA>";
        $xml .=         "<AccountNumber>".$request->getAccountNumber()."</AccountNumber>";
        $xml .=         "<ExpiryDate>".$request->getExpiryDate()."</ExpiryDate>";
        $xml .=         "<CardholderFullName>";
        $xml .=             "<CardholderFirstName>".$request->getCardholderFullName()->getCardholderFirstName()."</CardholderFirstName>";
        $xml .=             "<CardholderMiddleName>".$request->getCardholderFullName()->getCardholderMiddleName()."</CardholderMiddleName>";
        $xml .=             "<CardholderLastName>".$request->getCardholderFullName()->getCardholderLastName()."</CardholderLastName>";
        $xml .=         "</CardholderFullName>";
        $xml .=         "<Address>";
        $xml .=             "<Line1>".$request->getAddress()->getLine1()."</Line1>";
        $xml .=             "<Line2>".$request->getAddress()->getLine2()."</Line2>";
        $xml .=             "<City>".$request->getAddress()->getCity()."</City>";
        $xml .=             "<CountrySubdivision>".$request->getAddress()->getCountrySubdivision()."</CountrySubdivision>";
        $xml .=             "<PostalCode>".$request->getAddress()->getPostalCode()."</PostalCode>";
        $xml .=             "<Country>".$request->getAddress()->getCountry()."</Country>";
        $xml .=         "</Address>";
        $xml .=         "<DateOfBirth>".$request->getDateOfBirth()."</DateOfBirth>";
        $xml .= "</CreateMappingRequest>";

        return $xml;
    }

    private function buildCreateMapping($xml) {
        $createMapping = new CreateMapping();
        $createMapping->setRequestId((string)$xml->RequestId);

        $createMapping->setMapping(new Mapping());
        $createMapping->getMapping()->setMappingId((string)$xml->Mapping->MappingId);

        return $createMapping;
    }

    private function generateInquireMappingXML(InquireMappingRequest $request) {
        $xml= null;

        $xml  = "<InquireMappingRequest>";
        $xml .=         "<SubscriberId>".$request->getSubscriberId()."</SubscriberId>";
        $xml .=         "<SubscriberType>".$request->getSubscriberType()."</SubscriberType>";
        $xml .=         "<AccountUsage>".$request->getAccountUsage()."</AccountUsage>";
        $xml .=         "<Alias>".$request->getAlias()."</Alias>";
        $xml .=         "<DataResponseFlag>".$request->getDataResponseFlag()."</DataResponseFlag>";
        $xml .= "</InquireMappingRequest>";

        return $xml;
    }

    private function buildInquireMapping($xml) {
        $inquireMapping = new InquireMapping();
        $inquireMapping->setRequestId((string)$xml->RequestId);
        $mappings = new Mappings();

        $mappingArray = Array();
        foreach ($xml->Mappings->Mapping as $mapping)
        {
            $tmpMapping = new Mapping();
            $tmpMapping->setMappingId((string)$mapping->MappingId);
            $tmpMapping->setSubscriberId((string)$mapping->SubscriberId);
            $tmpMapping->setAccountUsage((string)$mapping->AccountUsage);
            $tmpMapping->setDefaultIndicator((string)$mapping->DefaultIndicator);
            $tmpMapping->setAlias((string)$mapping->Alias);
            $tmpMapping->setICA((string)$mapping->ICA);
            $tmpMapping->setAccountNumber((string)$mapping->AccountNumber);

            $tmpCardholderFullName = new CardholderFullName();
            $cardholderFullName = $mapping->CardholderFullName;
            $tmpCardholderFullName->setCardholderFirstName((string)$cardholderFullName->CardholderFirstName);
            $tmpCardholderFullName->setCardholderMiddleName((string)$cardholderFullName->CardholderMiddleName);
            $tmpCardholderFullName->setCardholderLastName((string)$cardholderFullName->CardholderLastName);

            $tmpAddress = new Address();
            $address = $mapping->Address;
            $tmpAddress->setLine1((string)$address->line1);
            $tmpAddress->setLine2((string)$address->line2);
            $tmpAddress->setCity((string)$address->City);
            $tmpAddress->setCountrySubdivision((string)$address->CountrySubdivision);
            $tmpAddress->setPostalCode((string)$address->PostalCode);
            $tmpAddress->setCountry((string)$address->Country);

            $tmpReceivingEligibility = new ReceivingEligibility();
            $receivingEligibility = $mapping->ReceivingEligibility;
            $tmpReceivingEligibility->setEligible((string)$receivingEligibility->Eligible);

            $tmpCurrency = new Currency();
            $currency = $receivingEligibility->Currency;
            $tmpCurrency->setAlphaCurrencyCode((string)$currency->AlphaCurrencyCode);
            $tmpCurrency->setNumericCurrencyCode((string)$currency->NumericCurrencyCode);

            $tmpCountry = new Country();
            $country = $receivingEligibility->Country;
            $tmpCountry->setAlphaCountryCode((string)$country->AlphaCountryCode);
            $tmpCountry->setAlphaCountryCode((string)$country->NumericCountryCode);

            $tmpBrand = new Brand();
            $brand = $receivingEligibility->Brand;
            $tmpBrand->setAcceptanceBrandCode((string)$brand->AcceptanceBrandCode);
            $tmpBrand->setProductBrandCode((string)$brand->ProductBrandCode);

            $tmpMapping->setExpiryDate((string)$mapping->ExpiryDate);

            $tmpReceivingEligibility->setCurrency($tmpCurrency);
            $tmpReceivingEligibility->setCountry($tmpCountry);
            $tmpReceivingEligibility->setBrand($tmpBrand);

            $tmpMapping->setCardholderFullName($tmpCardholderFullName);
            $tmpMapping->setAddress($tmpAddress);
            $tmpMapping->setReceivingEligibility($tmpReceivingEligibility);
            array_push($mappingArray, $tmpMapping);
        }

        $mappings->setMapping($mappingArray);
        $inquireMapping->setMappings($mappings);

        return $inquireMapping;
    }

    private function generateUpdateMappingXML(UpdateMappingRequest $request) {
        $xml= null;

        $xml  = "<UpdateMappingRequest>";
        $xml .=         "<AccountUsage>".$request->getAccountUsage()."</AccountUsage>";
        $xml .=         "<DefaultIndicator>".$request->getDefaultIndicator()."</DefaultIndicator>";
        $xml .=         "<Alias>".$request->getAlias()."</Alias>";
        $xml .=         "<AccountNumber>".$request->getAccountNumber()."</AccountNumber>";
        $xml .=         "<ExpiryDate>".$request->getExpiryDate()."</ExpiryDate>";
        $xml .=         "<CardholderFullName>";
        $xml .=             "<CardholderFirstName>".$request->getCardholderFullName()->getCardholderFirstName()."</CardholderFirstName>";
        $xml .=             "<CardholderMiddleName>".$request->getCardholderFullName()->getCardholderMiddleName()."</CardholderMiddleName>";
        $xml .=             "<CardholderLastName>".$request->getCardholderFullName()->getCardholderLastName()."</CardholderLastName>";
        $xml .=         "</CardholderFullName>";
        $xml .=         "<Address>";
        $xml .=             "<Line1>".$request->getAddress()->getLine1()."</Line1>";
        $xml .=             "<Line2>".$request->getAddress()->getLine2()."</Line2>";
        $xml .=             "<City>".$request->getAddress()->getCity()."</City>";
        $xml .=             "<CountrySubdivision>".$request->getAddress()->getCountrySubdivision()."</CountrySubdivision>";
        $xml .=             "<PostalCode>".$request->getAddress()->getPostalCode()."</PostalCode>";
        $xml .=             "<Country>".$request->getAddress()->getCountry()."</Country>";
        $xml .=         "</Address>";
        $xml .=         "<DateOfBirth>".$request->getDateOfBirth()."</DateOfBirth>";
        $xml .= "</UpdateMappingRequest>";

        return $xml;
    }

    private function buildUpdateMapping($xml) {
        $updateMapping = new UpdateMapping();
        $updateMapping->setRequestId((string)$xml->RequestId);

        $updateMapping->setMapping(new Mapping());
        $updateMapping->getMapping()->setMappingId((string)$xml->Mapping->MappingId);

        return $updateMapping;
    }

    private function buildDeleteMapping($xml) {
        $deleteMapping = new DeleteMapping();
        $deleteMapping->setRequestId((string)$xml->RequestId);

        $deleteMapping->setMapping(new Mapping());
        $deleteMapping->getMapping()->setMappingId((string)$xml->Mapping->MappingId);

        return $deleteMapping;
    }
}