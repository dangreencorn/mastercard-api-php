<?php

namespace Mastercard\services\Repower\Repower;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;

class RepowerService extends Connector{
	private $environment;
    const SANDBOX_URL = "https://sandbox.api.mastercard.com/repower/v1/repower";
    const PRODUCTION_URL = "https://api.mastercard.com/repower/v1/repower";

    public function __construct($consumerKey, $privateKey, $environment){
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }
	
	public function getRepower(RepowerRequest $request){
        $response = $this->doSimpleRequest($this->getURL(),Connector::POST, $this->generateSimpleXML($request));
        $xml = simplexml_load_string($response);
        return $this->buildRepower($xml);
	}
	
	private function getURL(){
		if($this->environment == Environment::PRODUCTION){
			return RepowerService::PRODUCTION_URL;
		}
		else{
			return RepowerService::SANDBOX_URL;
		}
	}

    private function generateSimpleXML(RepowerRequest $request){
        $xml = null;

        $xml  =  "<RepowerRequest>";
        $xml .=      "<TransactionReference>".$request->getTransactionReference()."</TransactionReference>";
        $xml .=      "<CardNumber>".$request->getCardNumber()."</CardNumber>";
        $xml .=      "<TransactionAmount>";
        $xml .=          "<Value>".$request->getTransactionAmount()->getValue()."</Value>";
        $xml .=          "<Currency>".$request->getTransactionAmount()->getCurrency()."</Currency>";
        $xml .=      "</TransactionAmount>";
        $xml .=      "<LocalDate>".$request->getLocalDate()."</LocalDate>";
        $xml .=      "<LocalTime>".$request->getLocalTime()."</LocalTime>";
        $xml .=      "<Channel>".$request->getChannel()."</Channel>";
        $xml .=      "<ICA>".$request->getICA()."</ICA>";
        $xml .=      "<ProcessorId>".$request->getProcessorId()."</ProcessorId>";
        $xml .=      "<RoutingAndTransitNumber>".$request->getRoutingAndTransitNumber()."</RoutingAndTransitNumber>";
        $xml .=      "<MerchantType>".$request->getMerchantType()."</MerchantType>";
        $xml .=      "<CardAcceptor>";
        $xml .=         "<Name>".$request->getCardAcceptor()->getName()."</Name>";
        $xml .=         "<City>".$request->getCardAcceptor()->getCity()."</City>";
        $xml .=         "<State>".$request->getCardAcceptor()->getState()."</State>";
        $xml .=         "<PostalCode>".$request->getCardAcceptor()->getPostalCode()."</PostalCode>";
        $xml .=         "<Country>".$request->getCardAcceptor()->getCountry()."</Country>";
        $xml .=     "</CardAcceptor>";
        $xml .= "</RepowerRequest>";

        return $xml;
    }

    private function buildRepower($xml){
        $repower = new Repower();
        $repower->setTransactionHistory(new TransactionHistory())->setTransaction(new Transaction())->setResponse(new Response());
        $repower->setAccountBalance(new AccountBalance());

        $repower->setRequestId((string)$xml->RequestId);
        $repower->setTransactionReference((string)$xml->TransactionReference);
        $repower->getTransactionHistory()->getTransaction()->setType((string)$xml->TransactionHistory->Transaction->Type);
        $repower->getTransactionHistory()->getTransaction()->setSystemTraceAuditNumber((string)$xml->TransactionHistory->Transaction->SystemTraceAuditNumber);
        $repower->getTransactionHistory()->getTransaction()->setNetworkReferenceNumber((string)$xml->TransactionHistory->Transaction->NetworkReferenceNumber);
        $repower->getTransactionHistory()->getTransaction()->setSettlementDate((string)$xml->TransactionHistory->Transaction->SettlementDate);
        $repower->getTransactionHistory()->getTransaction()->getResponse()->setCode((string)$xml->TransactionHistory->Transaction->Response->Code);
        $repower->getTransactionHistory()->getTransaction()->getResponse()->setDescription((string)$xml->TransactionHistory->Transaction->Response->Description);
        $repower->getTransactionHistory()->getTransaction()->setSubmitDateTime((string)$xml->TransactionHistory->Transaction->SubmitDateTime);
        $repower->getAccountBalance()->setValue((string)$xml->AccountBalance->Value);
        $repower->getAccountBalance()->setCurrency((string)$xml->AccountBalance->Currency);

        return $repower;
    }
}