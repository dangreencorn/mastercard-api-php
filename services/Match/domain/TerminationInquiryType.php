<?php

namespace Mastercard\services\Match\domain;

class TerminationInquiryType {
    private $pageOffset;
    private $totalLength;
    private $ref;
    private $transactionReferenceNumber;
    private $terminatedMerchant;

    public function getPageOffset(){
        return $this->pageOffset;
    }

    public function setPageOffset($pageOffset){
        $this->pageOffset = $pageOffset;
    }

    public function getTotalLength(){
        return $this->totalLength;
    }

    public function setTotalLength($totalLength){
        $this->totalLength = $totalLength;
    }

    public function getRef(){
        return $this->ref;
    }

    public function setRef($ref){
        $this->ref = $ref;
    }

    public function getTransactionReferenceNumber(){
        return $this->transactionReferenceNumber;
    }

    public function setTransactionReferenceNumber($transactionReferenceNumber){
        $this->transactionReferenceNumber = $transactionReferenceNumber;
    }

    public function getTerminatedMerchant(){
        return $this->terminatedMerchant;
    }

    public function setTerminatedMerchant($terminatedMerchant){
        $this->terminatedMerchant = $terminatedMerchant;
    }

    public function getReferenceId(){
        if($this->ref == null){
            return "";
        }
        return substr(strrchr($this->ref, "/") , 1);
    }
} 