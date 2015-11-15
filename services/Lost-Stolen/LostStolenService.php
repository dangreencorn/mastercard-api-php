<?php

namespace Mastercard\services\Lost-Stolen;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;

class LostStolenService extends Connector{
	private $environment;
	const SANDBOX_URL = "https://sandbox.api.mastercard.com/fraud/loststolen/v1/account-inquiry?Format=XML";
	const PRODUCTION_URL = "https://api.mastercard.com/fraud/loststolen/v1/account-inquiry?Format=XML";
	
	public function __construct($consumerKey, $privateKey, $environment){
		parent::__construct($consumerKey, $privateKey);
		$this->environment = $environment;
	}
	
	public function getLostStolen($accountNumber){
		$response = $this->doSimpleRequest($this->getURL(),Connector::PUT, $this->generateSimpleXML($accountNumber));
        $xml = simplexml_load_string($response);
        return $this->buildAccount($xml);
    }
	
	private function getURL(){
		if($this->environment == Environment::PRODUCTION){
			return LostStolenService::PRODUCTION_URL;
		}
		else{
			return LostStolenService::SANDBOX_URL;
		}	
	}

    private function generateSimpleXML($accountNumber){
        $xml = null;

        $xml = "<AccountInquiry>";
        $xml .= "<AccountNumber>$accountNumber</AccountNumber>";
        $xml .= "</AccountInquiry>";
        return $xml;
    }

    private function buildAccount($xml){
        $account = new Account();
        $account->setStatus((string)$xml->Status);
        $account->setListed((string)$xml->Listed);
        $account->setReasonCode((string)$xml->ReasonCode);
        $account->setReason((string)$xml->Reason);
        return $account;
    }
}