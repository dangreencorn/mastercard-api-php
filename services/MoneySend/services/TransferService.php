<?php

namespace Mastercard\services\MoneySend\services;

use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;
use ..\domain\Transfer;
use ..\domain\TransferRequest;
use ..\domain\TransactionHistory;
use ..\domain\Transaction;
use ..\domain\Response;
use ..\domain\PaymentRequest;

class TransferService extends Connector {
    private $environment;
    const SANDBOX_URL = "https://sandbox.api.mastercard.com/moneysend/v2/transfer?Format=XML";
    const PRODUCTION_URL = "https://api.mastercard.com/moneysend/v2/transfer?Format=XML";
    private $transferRequest;
    private $paymentRequest;

    public function __construct($consumerKey, $privateKey, $environment) {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getTransfer($request) {
        if ($request instanceof TransferRequest) {
            $this->transferRequest = $request;
            $response = $this->doSimpleRequest($this->getURL(),Connector::POST, $this->generateTransferXML($this->transferRequest));
            $xml = simplexml_load_string($response);
            return $this->buildTransfer($xml);
        } else {
            $this->paymentRequest = $request;
            $response = $this->doSimpleRequest($this->getURL(),Connector::POST, $this->generatePaymentXML($this->paymentRequest));
            $xml = simplexml_load_string($response);
            return $this->buildTransfer($xml);
        }
    }

    private function getURL() {
        if($this->environment == Environment::PRODUCTION){
            return TransferService::PRODUCTION_URL;
        }
        else{
            return TransferService::SANDBOX_URL;
        }
    }

    private function generateTransferXML(TransferRequest $request) {
        $xml= null;

        if ($request->getFundingMapped() == null) {
            $xml  = "<TransferRequest>";
            $xml .=         "<LocalDate>".$request->getLocalDate()."</LocalDate>";
            $xml .=         "<LocalTime>".$request->getLocalTime()."</LocalTime>";
            $xml .=         "<TransactionReference>".$request->getTransactionReference()."</TransactionReference>";
            $xml .=         "<SenderName>".$request->getSenderName()."</SenderName>";
            $xml .=         "<SenderAddress>";
            $xml .=              "<Line1>".$request->getSenderAddress()->getLine1()."</Line1>";
            $xml .=              "<Line2>".$request->getSenderAddress()->getLine2()."</Line2>";
            $xml .=              "<City>".$request->getSenderAddress()->getCity()."</City>";
            $xml .=              "<CountrySubdivision>".$request->getSenderAddress()->getCountrySubdivision()."</CountrySubdivision>";
            $xml .=              "<PostalCode>".$request->getSenderAddress()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getSenderAddress()->getCountry()."</Country>";
            $xml .=         "</SenderAddress>";
            $xml .=         "<FundingCard>";
            $xml .=              "<AccountNumber>".$request->getFundingCard()->getAccountNumber()."</AccountNumber>";
            $xml .=              "<ExpiryMonth>".$request->getFundingCard()->getExpiryMonth()."</ExpiryMonth>";
            $xml .=              "<ExpiryYear>".$request->getFundingCard()->getExpiryYear()."</ExpiryYear>";
            $xml .=         "</FundingCard>";
            $xml .=         "<FundingUCAF>".$request->getFundingUCAF()."</FundingUCAF>";
            $xml .=         "<FundingMasterCardAssignedId>".$request->getFundingMasterCardAssignedId()."</FundingMasterCardAssignedId>";
            $xml .=         "<FundingAmount>";
            $xml .=              "<Value>".$request->getFundingAmount()->getValue()."</Value>";
            $xml .=              "<Currency>".$request->getFundingAmount()->getCurrency()."</Currency>";
            $xml .=         "</FundingAmount>";
            $xml .=         "<ReceiverName>".$request->getReceiverName()."</ReceiverName>";
            $xml .=         "<ReceiverAddress>";
            $xml .=              "<Line1>".$request->getReceiverAddress()->getLine1()."</Line1>";
            $xml .=              "<Line2>".$request->getReceiverAddress()->getLine2()."</Line2>";
            $xml .=              "<City>".$request->getReceiverAddress()->getCity()."</City>";
            $xml .=              "<PostalCode>".$request->getReceiverAddress()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getReceiverAddress()->getCountry()."</Country>";
            $xml .=         "</ReceiverAddress>";
            $xml .=         "<ReceiverPhone>".$request->getReceiverPhone()."</ReceiverPhone>";
            $xml .=         "<ReceivingCard>";
            $xml .=              "<AccountNumber>".$request->getReceivingCard()->getAccountNumber()."</AccountNumber>";
            $xml .=         "</ReceivingCard>";
            $xml .=         "<ReceivingAmount>";
            $xml .=              "<Value>".$request->getReceivingAmount()->getValue()."</Value>";
            $xml .=              "<Currency>".$request->getReceivingAmount()->getCurrency()."</Currency>";
            $xml .=         "</ReceivingAmount>";
            $xml .=         "<Channel>".$request->getChannel()."</Channel>";
            $xml .=         "<UCAFSupport>".$request->getUCAFSupport()."</UCAFSupport>";
            $xml .=         "<ICA>".$request->getICA()."</ICA>";
            $xml .=         "<ProcessorId>".$request->getProcessorId()."</ProcessorId>";
            $xml .=         "<RoutingAndTransitNumber>".$request->getRoutingAndTransitNumber()."</RoutingAndTransitNumber>";
            $xml .=         "<CardAcceptor>";
            $xml .=              "<Name>".$request->getCardAcceptor()->getName()."</Name>";
            $xml .=              "<City>".$request->getCardAcceptor()->getCity()."</City>";
            $xml .=              "<State>".$request->getCardAcceptor()->getState()."</State>";
            $xml .=              "<PostalCode>".$request->getCardAcceptor()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getCardAcceptor()->getCountry()."</Country>";
            $xml .=         "</CardAcceptor>";
            $xml .=         "<TransactionDesc>".$request->getTransactionDesc()."</TransactionDesc>";
            $xml .=         "<MerchantId>".$request->getMerchantId()."</MerchantId>";
            $xml .= "</TransferRequest>";
        } else {
            $xml  = "<TransferRequest>";
            $xml .=         "<LocalDate>".$request->getLocalDate()."</LocalDate>";
            $xml .=         "<LocalTime>".$request->getLocalTime()."</LocalTime>";
            $xml .=         "<TransactionReference>".$request->getTransactionReference()."</TransactionReference>";
            $xml .=         "<FundingMapped>";
            $xml .=              "<SubscriberId>".$request->getFundingMapped()->getSubscriberId()."</SubscriberId>";
            $xml .=              "<SubscriberType>".$request->getFundingMapped()->getSubscriberType()."</SubscriberType>";
            $xml .=              "<SubscriberAlias>".$request->getFundingMapped()->getSubscriberAlias()."</SubscriberAlias>";
            $xml .=         "</FundingMapped>";
            $xml .=         "<FundingUCAF>".$request->getFundingUCAF()."</FundingUCAF>";
            $xml .=         "<FundingMasterCardAssignedId>".$request->getFundingMasterCardAssignedId()."</FundingMasterCardAssignedId>";
            $xml .=         "<FundingAmount>";
            $xml .=              "<Value>".$request->getFundingAmount()->getValue()."</Value>";
            $xml .=              "<Currency>".$request->getFundingAmount()->getCurrency()."</Currency>";
            $xml .=         "</FundingAmount>";
            $xml .=         "<ReceiverName>".$request->getReceiverName()."</ReceiverName>";
            $xml .=         "<ReceiverAddress>";
            $xml .=              "<Line1>".$request->getReceiverAddress()->getLine1()."</Line1>";
            $xml .=              "<Line2>".$request->getReceiverAddress()->getLine2()."</Line2>";
            $xml .=              "<City>".$request->getReceiverAddress()->getCity()."</City>";
            $xml .=              "<PostalCode>".$request->getReceiverAddress()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getReceiverAddress()->getCountry()."</Country>";
            $xml .=         "</ReceiverAddress>";
            $xml .=         "<ReceiverPhone>".$request->getReceiverPhone()."</ReceiverPhone>";
            $xml .=         "<ReceivingCard>";
            $xml .=              "<AccountNumber>".$request->getReceivingCard()->getAccountNumber()."</AccountNumber>";
            $xml .=         "</ReceivingCard>";
            $xml .=         "<ReceivingAmount>";
            $xml .=              "<Value>".$request->getReceivingAmount()->getValue()."</Value>";
            $xml .=              "<Currency>".$request->getReceivingAmount()->getCurrency()."</Currency>";
            $xml .=         "</ReceivingAmount>";
            $xml .=         "<Channel>".$request->getChannel()."</Channel>";
            $xml .=         "<UCAFSupport>".$request->getUCAFSupport()."</UCAFSupport>";
            $xml .=         "<ICA>".$request->getICA()."</ICA>";
            $xml .=         "<ProcessorId>".$request->getProcessorId()."</ProcessorId>";
            $xml .=         "<RoutingAndTransitNumber>".$request->getRoutingAndTransitNumber()."</RoutingAndTransitNumber>";
            $xml .=         "<CardAcceptor>";
            $xml .=              "<Name>".$request->getCardAcceptor()->getName()."</Name>";
            $xml .=              "<City>".$request->getCardAcceptor()->getCity()."</City>";
            $xml .=              "<State>".$request->getCardAcceptor()->getState()."</State>";
            $xml .=              "<PostalCode>".$request->getCardAcceptor()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getCardAcceptor()->getCountry()."</Country>";
            $xml .=         "</CardAcceptor>";
            $xml .=         "<TransactionDesc>".$request->getTransactionDesc()."</TransactionDesc>";
            $xml .=         "<MerchantId>".$request->getMerchantId()."</MerchantId>";
            $xml .= "</TransferRequest>";
        }

       return $xml;
    }

    private function generatePaymentXML(PaymentRequest $request) {
        $xml= null;

        if ($request->getReceivingMapped() == null) {
            $xml  = "<PaymentRequest>";
            $xml .=         "<LocalDate>".$request->getLocalDate()."</LocalDate>";
            $xml .=         "<LocalTime>".$request->getLocalTime()."</LocalTime>";
            $xml .=         "<TransactionReference>".$request->getTransactionReference()."</TransactionReference>";
            $xml .=         "<SenderName>".$request->getSenderName()."</SenderName>";
            $xml .=         "<SenderAddress>";
            $xml .=              "<Line1>".$request->getSenderAddress()->getLine1()."</Line1>";
            $xml .=              "<Line2>".$request->getSenderAddress()->getLine2()."</Line2>";
            $xml .=              "<City>".$request->getSenderAddress()->getCity()."</City>";
            $xml .=              "<CountrySubdivision>".$request->getSenderAddress()->getCountrySubdivision()."</CountrySubdivision>";
            $xml .=              "<PostalCode>".$request->getSenderAddress()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getSenderAddress()->getCountry()."</Country>";
            $xml .=         "</SenderAddress>";
            $xml .=         "<ReceivingCard>";
            $xml .=              "<AccountNumber>".$request->getReceivingCard()->getAccountNumber()."</AccountNumber>";
            $xml .=         "</ReceivingCard>";
            $xml .=         "<ReceivingAmount>";
            $xml .=              "<Value>".$request->getReceivingAmount()->getValue()."</Value>";
            $xml .=              "<Currency>".$request->getReceivingAmount()->getCurrency()."</Currency>";
            $xml .=         "</ReceivingAmount>";
            $xml .=         "<ICA>".$request->getICA()."</ICA>";
            $xml .=         "<ProcessorId>".$request->getProcessorId()."</ProcessorId>";
            $xml .=         "<RoutingAndTransitNumber>".$request->getRoutingAndTransitNumber()."</RoutingAndTransitNumber>";
            $xml .=         "<CardAcceptor>";
            $xml .=              "<Name>".$request->getCardAcceptor()->getName()."</Name>";
            $xml .=              "<City>".$request->getCardAcceptor()->getCity()."</City>";
            $xml .=              "<State>".$request->getCardAcceptor()->getState()."</State>";
            $xml .=              "<PostalCode>".$request->getCardAcceptor()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getCardAcceptor()->getCountry()."</Country>";
            $xml .=         "</CardAcceptor>";
            $xml .=         "<TransactionDesc>".$request->getTransactionDesc()."</TransactionDesc>";
            $xml .=         "<MerchantId>".$request->getMerchantId()."</MerchantId>";
            $xml .= "</PaymentRequest>";
        } else {
            $xml  = "<PaymentRequest>";
            $xml .=         "<LocalDate>".$request->getLocalDate()."</LocalDate>";
            $xml .=         "<LocalTime>".$request->getLocalTime()."</LocalTime>";
            $xml .=         "<TransactionReference>".$request->getTransactionReference()."</TransactionReference>";
            $xml .=         "<SenderName>".$request->getSenderName()."</SenderName>";
            $xml .=         "<SenderAddress>";
            $xml .=              "<Line1>".$request->getSenderAddress()->getLine1()."</Line1>";
            $xml .=              "<Line2>".$request->getSenderAddress()->getLine2()."</Line2>";
            $xml .=              "<City>".$request->getSenderAddress()->getCity()."</City>";
            $xml .=              "<CountrySubdivision>".$request->getSenderAddress()->getCountrySubdivision()."</CountrySubdivision>";
            $xml .=              "<PostalCode>".$request->getSenderAddress()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getSenderAddress()->getCountry()."</Country>";
            $xml .=         "</SenderAddress>";
            $xml .=         "<ReceivingMapped>";
            $xml .=              "<SubscriberId>".$request->getReceivingMapped()->getSubscriberId()."</SubscriberId>";
            $xml .=              "<SubscriberType>".$request->getReceivingMapped()->getSubscriberType()."</SubscriberType>";
            $xml .=              "<SubscriberAlias>".$request->getReceivingMapped()->getSubscriberAlias()."</SubscriberAlias>";
            $xml .=         "</ReceivingMapped>";
            $xml .=         "<ReceivingAmount>";
            $xml .=              "<Value>".$request->getReceivingAmount()->getValue()."</Value>";
            $xml .=              "<Currency>".$request->getReceivingAmount()->getCurrency()."</Currency>";
            $xml .=         "</ReceivingAmount>";
            $xml .=         "<ICA>".$request->getICA()."</ICA>";
            $xml .=         "<ProcessorId>".$request->getProcessorId()."</ProcessorId>";
            $xml .=         "<RoutingAndTransitNumber>".$request->getRoutingAndTransitNumber()."</RoutingAndTransitNumber>";
            $xml .=         "<CardAcceptor>";
            $xml .=              "<Name>".$request->getCardAcceptor()->getName()."</Name>";
            $xml .=              "<City>".$request->getCardAcceptor()->getCity()."</City>";
            $xml .=              "<State>".$request->getCardAcceptor()->getState()."</State>";
            $xml .=              "<PostalCode>".$request->getCardAcceptor()->getPostalCode()."</PostalCode>";
            $xml .=              "<Country>".$request->getCardAcceptor()->getCountry()."</Country>";
            $xml .=         "</CardAcceptor>";
            $xml .=         "<TransactionDesc>".$request->getTransactionDesc()."</TransactionDesc>";
            $xml .=         "<MerchantId>".$request->getMerchantId()."</MerchantId>";
            $xml .= "</PaymentRequest>";
        }

        return $xml;
    }

    private function buildTransfer($xml) {
        $transfer = new Transfer();
        $transfer->setRequestId((string)$xml->RequestId);
        $transfer->setTransactionReference((string)$xml->TransactionReference);
        $transactionHistory = new TransactionHistory();

        $transactionArray = Array();
        foreach ($xml->TransactionHistory->Transaction as $transaction)
        {
            $tmpTransaction = new Transaction();
            $tmpTransaction->setType((string)$transaction->Type);
            $tmpTransaction->setSystemTraceAuditNumber((string)$transaction->SystemTraceAuditNumber);
            $tmpTransaction->setNetworkReferenceNumber((string)$transaction->NetworkReferenceNumber);
            $tmpTransaction->setSettlementDate((string)$transaction->SettlementDate);

            $tmpResponse = new Response();
            $response = $transaction->Response;
            $tmpResponse->setCode((string)$response->Code);
            $tmpResponse->setDescription((string)$response->Description);

            $tmpTransaction->setSubmitDateTime((string)$transaction->SubmitDateTime);

            $tmpTransaction->setResponse($tmpResponse);
            array_push($transactionArray, $tmpTransaction);
        }

        $transactionHistory->setTransaction($transactionArray);
        $transfer->setTransactionHistory($transactionHistory);

        return $transfer;
    }

}