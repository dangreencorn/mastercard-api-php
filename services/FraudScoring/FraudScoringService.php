<?php



namespace Mastercard\services\FraudScoring;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use \Mastercard\services\FraudScoring\domain\ScoreLookupRequest;
use \Mastercard\services\FraudScoring\domain\ScoreLookup;
use \Mastercard\services\FraudScoring\domain\TransactionDetail;
use \Mastercard\services\FraudScoring\domain\ScoreResponse;

class FraudScoringService extends Connector {

    const SANDBOX_URL = "https://sandbox.api.mastercard.com/fraud/merchantscoring/v1/score-lookup";
    const PRODUCTION_URL = "https://api.mastercard.com/fraud/merchantscoring/v1/score-lookup";


    public function __construct($consumerKey, $privateKey, $environment){
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getScoreLookup(ScoreLookupRequest $request){
        $response = $this->doSimpleRequest($this->getURL(), Connector::PUT, $this->generateSimpleXML($request));
        $xml = simplexml_load_string($response);
        return $this->buildScoreLookup($xml);
    }

    private function getURL(){
        if($this->environment == Environment::PRODUCTION){
            return FraudScoringService::PRODUCTION_URL;
        }
        else{
            return FraudScoringService::SANDBOX_URL;
        }
    }

    private function generateSimpleXML(ScoreLookupRequest $request){
        $xml= null;

        $xml  = "<ScoreLookupRequest>";
        $xml .=     "<TransactionDetail>";
        $xml .=         "<CustomerIdentifier>".$request->getTransactionDetail()->getCustomerIdentifier()."</CustomerIdentifier>";
        $xml .=         "<MerchantIdentifier>".$request->getTransactionDetail()->getMerchantIdentifier()."</MerchantIdentifier>";
        $xml .=         "<AccountNumber>".$request->getTransactionDetail()->getAccountNumber()."</AccountNumber>";
        $xml .=         "<AccountPrefix>".$request->getTransactionDetail()->getAccountPrefix()."</AccountPrefix>";
        $xml .=         "<AccountSuffix>".$request->getTransactionDetail()->getAccountSuffix()."</AccountSuffix>";
        $xml .=         "<TransactionAmount>".$request->getTransactionDetail()->getTransactionAmount()."</TransactionAmount>";
        $xml .=         "<TransactionDate>".$request->getTransactionDetail()->getTransactionDate()."</TransactionDate>";
        $xml .=         "<TransactionTime>".$request->getTransactionDetail()->getTransactionTime()."</TransactionTime>";
        $xml .=         "<BankNetReferenceNumber>".$request->getTransactionDetail()->getBankNetReferenceNumber()."</BankNetReferenceNumber>";
        $xml .=         "<Stan>".$request->getTransactionDetail()->getStan()."</Stan>";
        $xml .=     "</TransactionDetail>";
        $xml .= "</ScoreLookupRequest>";

        return $xml;
    }

    private function buildScoreLookup($xml){
        $scoreLookup = new ScoreLookup();
        $scoreLookup->setTransactionDetail(new TransactionDetail());
        $scoreLookup->setScoreResponse(new ScoreResponse());

        $scoreLookup->setCustomerIdentifier((string)$xml->CustomerIdentifier);
        $scoreLookup->setRequestTimestamp((string)$xml->RequestTimestamp);
        $scoreLookup->getTransactionDetail()->setCustomerIdentifier((string)$xml->TransactionDetail->CustomerIdentifier);
        $scoreLookup->getTransactionDetail()->setMerchantIdentifier((string)$xml->TransactionDetail->MerchantIdentifier);
        $scoreLookup->getTransactionDetail()->setAccountNumber((string)$xml->TransactionDetail->AccountNumber);
        $scoreLookup->getTransactionDetail()->setAccountPrefix((string)$xml->TransactionDetail->AccountPrefix);
        $scoreLookup->getTransactionDetail()->setAccountSuffix((string)$xml->TransactionDetail->AccountSuffix);
        $scoreLookup->getTransactionDetail()->setTransactionAmount((string)$xml->TransactionDetail->TransactionAmount);
        $scoreLookup->getTransactionDetail()->setTransactionDate((string)$xml->TransactionDetail->TransactionDate);
        $scoreLookup->getTransactionDetail()->setTransactionTime((string)$xml->TranscationDetail->TransactionTime);
        $scoreLookup->getTransactionDetail()->setBankNetReferenceNumber((string)$xml->TransactionDetail->BankNetReferenceNumber);
        $scoreLookup->getTransactionDetail()->setStan((string)$xml->TransactionDetail->Stan);
        $scoreLookup->getScoreResponse()->setMatchIndicator((string)$xml->ScoreResponse->MatchIndicator);
        $scoreLookup->getScoreResponse()->setFraudScore((string)$xml->ScoreResponse->FraudScore);
        $scoreLookup->getScoreResponse()->setReasonCode((string)$xml->ScoreResponse->ReasonCode);
        $scoreLookup->getScoreResponse()->setRulesAdjustedScore((string)$xml->ScoreResponse->RulesAdjustedScore);
        $scoreLookup->getScoreResponse()->setRulesAdjustedReasonCode((string)$xml->ScoreResponse->RulesAdjustedReasonCode);
        $scoreLookup->getScoreResponse()->setRulesAdjustedReasonCodeSecondary((string)$xml->ScoreResponse->RulesAdjustedReasonCodeSecondary);

        return $scoreLookup;

    }
} 