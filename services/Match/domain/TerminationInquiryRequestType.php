<?php

namespace Mastercard\services\Match\domain;

class TerminationInquiryRequestType {
    private $acquirerId;
    private $transactionReferenceNumber;
    private $merchantType;

    public function getAcquirerId(){
        return $this->acquirerId;
    }

    public function setAcquirerId($acquirerId){
        $this->acquirerId = $acquirerId;
    }

    public function getTransactionReferenceNumber(){
        return $this->transactionReferenceNumber;
    }

    public function setTransactionReferenceNumber($transactionReferenceNumber){
        $this->transactionReferenceNumber = $transactionReferenceNumber;
    }

    public function getMerchantType(){
        return $this->merchantType;
    }

    public function setMerchantType($merchantType){
        $this->merchantType = $merchantType;
    }
} 