<?php

namespace Mastercard\services\MoneySend\services;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\services\MoneySend\domain\SendingEligibility;
use \Mastercard\services\MoneySend\domain\ReceivingEligibility;
use \Mastercard\services\MoneySend\domain\Currency;
use \Mastercard\services\MoneySend\domain\Brand;
use \Mastercard\services\MoneySend\domain\Country;
use \Mastercard\services\MoneySend\domain\PanEligibilityRequest;
use \Mastercard\services\MoneySend\domain\PanEligibility;

class PanEligibilityService extends Connector {

    const SANDBOX_URL = "https://sandbox.api.mastercard.com/moneysend/v2/eligibility/pan?Format=XML";
    const PRODUCTION_URL = "https://api.mastercard.com/moneysend/v2/eligibility/pan?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment) {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getPanEligibility(PanEligibilityRequest $panEligibilityRequest) {
        $response = $this->doSimpleRequest($this->getURL(),Connector::PUT, $this->generatePanEligibilityXML($panEligibilityRequest));
        $xml = simplexml_load_string($response);
        return $this->buildPanEligibility($xml);
    }

    private function getURL() {
        if($this->environment == Environment::PRODUCTION){
            return PanEligibilityService::PRODUCTION_URL;
        }
        else{
            return PanEligibilityService::SANDBOX_URL;
        }
    }

    private function generatePanEligibilityXML(PanEligibilityRequest $request) {
        if ($request->getSendingAccountNumber() == null) {
            $xml= null;

            $xml  = "<PanEligibilityRequest>";
            $xml .=         "<ReceivingAccountNumber>".$request->getReceivingAccountNumber()."</ReceivingAccountNumber>";
            $xml .= "</PanEligibilityRequest>";

            return $xml;
        } elseif ($request->getReceivingAccountNumber() == null) {
            $xml= null;

            $xml  = "<PanEligibilityRequest>";
            $xml .=         "<SendingAccountNumber>".$request->getSendingAccountNumber()."</SendingAccountNumber>";
            $xml .= "</PanEligibilityRequest>";

            return $xml;
        } else {
        $xml= null;

        $xml  = "<PanEligibilityRequest>";
        $xml .=         "<SendingAccountNumber>".$request->getSendingAccountNumber()."</SendingAccountNumber>";
        $xml .=         "<ReceivingAccountNumber>".$request->getReceivingAccountNumber()."</ReceivingAccountNumber>";
        $xml .= "</PanEligibilityRequest>";

        return $xml;
        }
    }

    private function buildPanEligibility($xml) {
        $panEligibility = new PanEligibility();
        $panEligibility->setRequestId((string)$xml->RequestId);

        $tmpSendingEligibility = new SendingEligibility();
        $sendingEligibility = $xml->SendingEligibility;
        $tmpSendingEligibility->setEligible((string)$sendingEligibility->Eligible);
        $tmpSendingEligibility->setReasonCode((string)$sendingEligibility->ReasonCode);
        $tmpSendingEligibility->setAccountNumber((string)$sendingEligibility->AccountNumber);
        $tmpSendingEligibility->setICA((string)$sendingEligibility->ICA);

        $tmpCurrency = new Currency();
        $currency = $sendingEligibility->Currency;
        $tmpCurrency->setAlphaCurrencyCode((string)$currency->AlphaCurrencyCode);
        $tmpCurrency->setNumericCurrencyCode((string)$currency->NumericCurrencyCode);

        $tmpCountry = new Country();
        $country = $sendingEligibility->Country;
        $tmpCountry->setAlphaCountryCode((string)$country->AlphaCountryCode);
        $tmpCountry->setNumericCountryCode((string)$country->NumericCountryCode);

        $tmpBrand = new Brand();
        $brand = $sendingEligibility->Brand;
        $tmpBrand->setAcceptanceBrandCode((string)$brand->AcceptanceBrandCode);
        $tmpBrand->setProductBrandCode((string)$brand->ProductBrandCode);

        $tmpSendingEligibility->setCurrency($tmpCurrency);
        $tmpSendingEligibility->setCountry($tmpCountry);
        $tmpSendingEligibility->setBrand($tmpBrand);
        $panEligibility->setSendingEligibility($tmpSendingEligibility);

        $tmpReceivingEligibility = new ReceivingEligibility();
        $receivingEligibility = $xml->ReceivingEligibility;
        $tmpReceivingEligibility->setEligible((string)$receivingEligibility->Eligible);
        $tmpReceivingEligibility->setReasonCode((string)$receivingEligibility->ReasonCode);
        $tmpReceivingEligibility->setAccountNumber((string)$receivingEligibility->AccountNumber);
        $tmpReceivingEligibility->setICA((string)$receivingEligibility->ICA);

        $tmpCurrency = new Currency();
        $currency = $receivingEligibility->Currency;
        $tmpCurrency->setAlphaCurrencyCode((string)$currency->AlphaCurrencyCode);
        $tmpCurrency->setNumericCurrencyCode((string)$currency->NumericCurrencyCode);

        $tmpCountry = new Country();
        $country = $receivingEligibility->Country;
        $tmpCountry->setAlphaCountryCode((string)$country->AlphaCountryCode);
        $tmpCountry->setNumericCountryCode((string)$country->NumericCountryCode);

        $tmpBrand = new Brand();
        $brand = $receivingEligibility->Brand;
        $tmpBrand->setAcceptanceBrandCode((string)$brand->AcceptanceBrandCode);
        $tmpBrand->setProductBrandCode((string)$brand->ProductBrandCode);

        $tmpReceivingEligibility->setCurrency($tmpCurrency);
        $tmpReceivingEligibility->setCountry($tmpCountry);
        $tmpReceivingEligibility->setBrand($tmpBrand);
        $panEligibility->setReceivingEligibility($tmpReceivingEligibility);

        return $panEligibility;
    }

}