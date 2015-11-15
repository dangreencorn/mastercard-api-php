<?php

namespace Mastercard\services\Match\domain\options;

class TerminationInquiryHistoryOptions {
    private $pageOffset;
    private $pageLength;
    private $acquirerId;
    private $inquiryReferenceNumber;

    public function __construct($pageOffset, $pageLength, $acquireId, $inquiryReferenceNumber){
        $this->pageOffset = $pageOffset;
        $this->pageLength = $pageLength;
        $this->acquirerId = $acquireId;
        $this->inquiryReferenceNumber = $inquiryReferenceNumber;

        if($pageLength > 25){
            $this->pageLength = 25;
        }
    }

    public function getPageOffset(){
        return $this->pageOffset;
    }

    public function getPageLength(){
        return $this->pageLength;
    }

    public function getAcquirerId(){
        return $this->acquirerId;
    }

    public function getInquiryReferenceNumber(){
        return $this->inquiryReferenceNumber;
    }
} 