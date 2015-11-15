<?php

namespace Mastercard\services\Match\domain\options;

class TerminationInquiryRequestOptions {
    private $pageOffset;
    private $pageLength;

    public function __construct($pageOffset, $pageLength){
        $this->pageOffset = $pageOffset;
        $this->pageLength = $pageLength;

        if($this->pageLength > 25){
            $this->pageLength = 25;
        }
    }

    public function getPageOffset(){
        return $this->pageOffset;
    }

    public function getPageLength(){
        return $this->pageLength;
    }
} 