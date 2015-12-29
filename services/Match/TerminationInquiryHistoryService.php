<?php

namespace Mastercard\services\Match;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\common\URLUtil;
use \Mastercard\services\Match\domain\TerminationInquiryType;
use \Mastercard\services\Match\domain\TerminatedMerchantType;
use \Mastercard\services\Match\domain\MerchantType;
use \Mastercard\services\Match\domain\AddressType;
use \Mastercard\services\Match\domain\PrincipalType;
use \Mastercard\services\Match\domain\DriversLicenseType;
use \Mastercard\services\Match\domain\MerchantMatchType;
use \Mastercard\services\Match\domain\PrincipalMatchType;
use \Mastercard\services\Match\domain\options\TerminationInquiryHistoryOptions;


class TerminationInquiryHistoryService extends Connector {

    const SANDBOX_URL = "https://sandbox.api.mastercard.com/fraud/merchant/v1/termination-inquiry/%s?Format=XML";
    const PRODUCTION_URL = "https://api.mastercard.com/fraud/merchant/v1/termination-inquiry/%s?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment){
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getTerminationInquiry(TerminationInquiryHistoryOptions $options){
        $response = $this->doSimpleRequest($this->getURL($options->getPageOffset(), $options->getPageLength(), $options->getAcquirerId(), $options->getInquiryReferenceNumber()), Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildTerminationInquiry($xml);
    }

    private function getURL($offset, $pageLength, $acquireId, $inquiryReferenceNumber){
        $url = null;
        if($this->environment == Environment::PRODUCTION){
            $url =  TerminationInquiryHistoryService::PRODUCTION_URL;
        }
        else{
            $url =  TerminationInquiryHistoryService::SANDBOX_URL;
        }

        $url = sprintf($url, $inquiryReferenceNumber);

        $url = URLUtil::addQueryParameter($url, "PageOffset", $offset);
        $url = URLUtil::addQueryParameter($url, "PageLength", $pageLength);
        $url = URLUtil::addQueryParameter($url, "AcquirerId", $acquireId);

        return $url;
    }

    private function buildTerminationInquiry($xml){
        $terminatedMerchants = array();
        $terminationInquiry = new TerminationInquiryType();
        $terminationInquiry->setTerminatedMerchant(new TerminatedMerchantType());
        $terminationInquiry->getTerminatedMerchant()->setMerchant(new MerchantType());
        $terminationInquiry->getTerminatedMerchant()->getMerchant()->setAddress(new AddressType());
        $terminationInquiry->getTerminatedMerchant()->getMerchant()->setPrincipal(new PrincipalType());
        $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->setAddress(new AddressType());
        $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->setDriversLicense(new DriversLicenseType());
        $terminationInquiry->getTerminatedMerchant()->setMerchantMatch(new MerchantMatchType());
        $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setPrincipalMatch(new PrincipalMatchType());

        $terminationInquiry->setPageOffset((string)$xml->PageOffset);
        $terminationInquiry->setTotalLength((string)$xml->TotalLength);
        $terminationInquiry->setRef((string)$xml->Ref);
        $terminationInquiry->setTransactionReferenceNumber((string)$xml->TransactionReferenceNumber);

        foreach($xml->TerminatedMerchant as $merchant){
            $terminationInquiry->getTerminatedMerchant()->setTerminationReasonCode($merchant->TerminationReasonCode);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->setName((string)$merchant->Merchant->Name);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->setDoingBusinessAsName((string)$merchant->Merchant->DoingBusinessAsName);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->setPhoneNumber((string)$merchant->Merchant->PhoneNumber);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getAddress()->setLine1((string)$merchant->Merchant->Address->Line1);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getAddress()->setLine2((string)$merchant->Merchant->Address->Line2);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getAddress()->setCity((string)$merchant->Merchant->Address->City);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getAddress()->setCountrySubdivision((string)$merchant->Merchant->Address->CountrySubdivision);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getAddress()->setPostalCode((string)$merchant->Merchant->Address->PostalCode);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getAddress()->setCountry((string)$merchant->Merchant->Address->Country);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->setFirstName((string)$merchant->Merchant->Principal->FirstName);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->setLastName((string)$merchant->Merchant->Principal->LastName);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->setPhoneNumber((string)$merchant->Merchant->Principal->PhoneNumber);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getAddress()->setLine1((string)$merchant->Merchant->Principal->Address->Line1);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getAddress()->setCity((string)$merchant->Merchant->Principal->Address->City);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getAddress()->setCountrySubdivision((string)$merchant->Merchant->Principal->Address->CountrySubdivision);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getAddress()->setPostalCode((string)$merchant->Merchant->Principal->Address->PostalCode);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getAddress()->setCountry((string)$merchant->Merchant->Principal->Address->Country);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getDriversLicense()->setNumber((string)$merchant->Merchant->Principal->DriversLicense->Number);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getDriversLicense()->setCountrySubdivision((string)$merchant->Merchant->Principal->DriversLicense->CountrySubdivision);
            $terminationInquiry->getTerminatedMerchant()->getMerchant()->getPrincipal()->getDriversLicense()->setCountry((string)$merchant->Merchant->Principal->DriversLicense->Country);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setName((string)$merchant->MerchantMatch->Name);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setDoingBusinessAsName((string)$merchant->MerchantMatch->DoingBusinessAsName);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setPhoneNumber((string)$merchant->MerchantMatch->PhoneNumber);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setAddress((string)$merchant->MerchantMatch->Address);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setCountrySubdivisionTaxId((string)$merchant->MerchantMatch->CountrySubdivisionTaxId);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->setNationalTaxId((string)$merchant->MerchantMatch->NationalTaxId);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->getPrincipalMatch()->setName((string)$merchant->MerchantMatch->PrincipalMatch->Name);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->getPrincipalMatch()->setNationalId((string)$merchant->MerchantMatch->PrincipalMatch->NationalId);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->getPrincipalMatch()->setPhoneNumber((string)$merchant->MerchantMatch->PrincipalMatch->PhoneNumber);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->getPrincipalMatch()->setAddress((string)$merchant->MerchantMatch->PrincipalMatch->Address);
            $terminationInquiry->getTerminatedMerchant()->getMerchantMatch()->getPrincipalMatch()->setDriversLicense((string)$merchant->MerchantMatch->PrincipalMatch->DriversLicense);

            array_push($terminatedMerchants, $terminationInquiry->getTerminatedMerchant());
        }
        $terminationInquiry->setTerminatedMerchant($terminatedMerchants);

        return $terminationInquiry;
    }
} 