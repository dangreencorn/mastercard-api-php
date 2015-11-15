<?php

namespace Mastercard\services\MoneySend\domain;

class Transaction {

    private $Type;
    private $SystemTraceAuditNumber;
    private $NetworkReferenceNumber;
    private $SettlementDate;
    private $Response;
    private $SubmitDateTime;

    /**
     * @param mixed $NetworkReferenceNumber
     */
    public function setNetworkReferenceNumber($NetworkReferenceNumber)
    {
        $this->NetworkReferenceNumber = $NetworkReferenceNumber;
    }

    /**
     * @return mixed
     */
    public function getNetworkReferenceNumber()
    {
        return $this->NetworkReferenceNumber;
    }

    /**
     * @param mixed $Response
     */
    public function setResponse($Response)
    {
        $this->Response = $Response;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->Response;
    }

    /**
     * @param mixed $SettlementDate
     */
    public function setSettlementDate($SettlementDate)
    {
        $this->SettlementDate = $SettlementDate;
    }

    /**
     * @return mixed
     */
    public function getSettlementDate()
    {
        return $this->SettlementDate;
    }

    /**
     * @param mixed $SubmitDateTime
     */
    public function setSubmitDateTime($SubmitDateTime)
    {
        $this->SubmitDateTime = $SubmitDateTime;
    }

    /**
     * @return mixed
     */
    public function getSubmitDateTime()
    {
        return $this->SubmitDateTime;
    }

    /**
     * @param mixed $SystemTraceAuditNumber
     */
    public function setSystemTraceAuditNumber($SystemTraceAuditNumber)
    {
        $this->SystemTraceAuditNumber = $SystemTraceAuditNumber;
    }

    /**
     * @return mixed
     */
    public function getSystemTraceAuditNumber()
    {
        return $this->SystemTraceAuditNumber;
    }

    /**
     * @param mixed $Type
     */
    public function setType($Type)
    {
        $this->Type = $Type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->Type;
    }

}