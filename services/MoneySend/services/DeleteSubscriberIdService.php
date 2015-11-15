<?php

namespace Mastercard\services\MoneySend\services;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use ..\domain\DeleteSubscriberId;
use ..\domain\DeleteSubscriberIdRequest;

class DeleteSubscriberIdService extends Connector {
    private $environment;
    const SANDBOX_URL = "https://sandbox.api.mastercard.com/moneysend/v2/mapping/subscriber?Format=XML";
    const PRODUCTION_URL = "https://api.mastercard.com/moneysend/v2/mapping/subscriber?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment) {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getDeleteSubscriberId(DeleteSubscriberIdRequest $deleteRequest) {
        $response = $this->doSimpleRequest($this->getURL(),Connector::PUT, $this->generateDeleteSubscriberIdXML($deleteRequest));
        $xml = simplexml_load_string($response);
        return $this->buildDeleteSubscriberId($xml);
    }

    private function getURL() {
        if($this->environment == Environment::PRODUCTION){
            return DeleteSubscriberIdService::PRODUCTION_URL;
        }
        else{
            return DeleteSubscriberIdService::SANDBOX_URL;
        }
    }

    private function generateDeleteSubscriberIdXML(DeleteSubscriberIdRequest $request) {
        $xml= null;

        $xml  = "<DeleteSubscriberIdRequest>";
        $xml .=         "<SubscriberId>".$request->getSubscriberId()."</SubscriberId>";
        $xml .=         "<SubscriberType>".$request->getSubscriberType()."</SubscriberType>";
        $xml .= "</DeleteSubscriberIdRequest>";

        return $xml;
    }

    private function buildDeleteSubscriberId($xml) {
        $deleteSubscriberId = new DeleteSubscriberId();
        $deleteSubscriberId->setRequestId((string)$xml->RequestId);

        return $deleteSubscriberId;
    }

}