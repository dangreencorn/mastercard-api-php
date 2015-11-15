<?php

namespace Mastercard\services\Repower\RepowerReversal;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;

class RepowerReversalService extends Connector{
	private $environment;
	const SANDBOX_URL = "https://sandbox.api.mastercard.com/repower/v1/repowerreversal?Format=XML";
	const PRODUCTION_URL = "https://api.mastercard.com/repower/v1/repowerreversal?Format=XML";
	
	public function __construct($consumerKey, $privateKey, $environment){
		parent::__construct($consumerKey, $privateKey);
		$this->environment = $environment;
	}
	
	public function getRepowerReversal(RepowerReversalRequest $request){
		$response = $this->doSimpleRequest($this->getURL(),Connector::POST, $this->generateSimpleXML($request));
        $xml = simplexml_load_string($response);
        return $this->buildRepowerReversal($xml);
	}
	
	private function getURL(){
		if($this->environment == Environment::PRODUCTION){
			return RepowerReversalService::PRODUCTION_URL;
		}
		else{
			return RepowerReversalService::SANDBOX_URL;
		}
	}

    private function generateSimpleXML(RepowerReversalRequest $request){
        $xml = null;

        $xml  = "<RepowerReversalRequest>";
        $xml .= "    <ICA>".$request->getICA()."</ICA>";
        $xml .= "    <TransactionReference>".$request->getTransactionReference()."</TransactionReference>";
        $xml .= "    <ReversalReason>".$request->getReversalReason()."</ReversalReason>";
        $xml .= "</RepowerReversalRequest>";

        return $xml;
    }

    private function buildRepowerReversal($xml){
        $repowerReversal = new RepowerReversal();
        $repowerReversal->setTransactionHistory(new TransactionHistory())->setTransaction(new Transaction())->setResponse(new Response());

        $repowerReversal->setRequestId((string)$xml->RequestId);
        $repowerReversal->setOriginalRequestId((string)$xml->OriginalRequestId);
        $repowerReversal->setTransactionReference((string)$xml->TransactionReference);
        $repowerReversal->getTransactionHistory()->getTransaction()->setType((string)$xml->TransactionHistory->Transaction->Type);
        $repowerReversal->getTransactionHistory()->getTransaction()->setSystemTraceAuditNumber((string)$xml->TransactionHistory->Transaction->SystemTraceAuditNumber);
        $repowerReversal->getTransactionHistory()->getTransaction()->setNetworkReferenceNumber((string)$xml->TransactionHistory->Transcation->NetworkReferenceNumber);
        $repowerReversal->getTransactionHistory()->getTransaction()->setSettlementDate((string)$xml->TransactionHistory->Transaction->SettlementDate);
        $repowerReversal->getTransactionHistory()->getTransaction()->getResponse()->setCode((string)$xml->TransactionHistory->Transaction->Response->Code);
        $repowerReversal->getTransactionHistory()->getTransaction()->getResponse()->setDescription((string)$xml->TransactionHistory->Transaction->Response->Description);
        $repowerReversal->getTransactionHistory()->getTransaction()->setSubmitDateTime((string)$xml->TransactionHistory->Transaction->SubmitDateTime);

        return $repowerReversal;
    }
}