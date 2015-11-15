<?php

namespace Mastercard\services\Match\domain;

class TerminatedMerchantType {
    private $terminationReasonCode;
    private $merchant;
    private $merchantMatch;

    public function getTerminationReasonCode(){
        return $this->terminationReasonCode;
    }

    public function setTerminationReasonCode($terminationReasonCode){
        $this->terminationReasonCode = $terminationReasonCode;
    }

    public function getMerchant(){
        return $this->merchant;
    }

    public function setMerchant($merchant){
        $this->merchant = $merchant;
    }

    public function getMerchantMatch(){
        return $this->merchantMatch;
    }

    public function setMerchantMatch($merchantMatch){
        $this->merchantMatch = $merchantMatch;
    }
} 