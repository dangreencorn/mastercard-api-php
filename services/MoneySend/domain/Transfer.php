<?php

namespace Mastercard\services\MoneySend\domain;

class Transfer {

    private $RequestId;
    private $TransactionReference;
    private $TransactionHistory;

    /**
     * @param mixed $RequestId
     */
    public function setRequestId($RequestId)
    {
        $this->RequestId = $RequestId;
    }

    /**
     * @return mixed
     */
    public function getRequestId()
    {
        return $this->RequestId;
    }

    /**
     * @param mixed $TransactionHistory
     */
    public function setTransactionHistory($TransactionHistory)
    {
        $this->TransactionHistory = $TransactionHistory;
    }

    /**
     * @return mixed
     */
    public function getTransactionHistory()
    {
        return $this->TransactionHistory;
    }

    /**
     * @param mixed $TransactionReference
     */
    public function setTransactionReference($TransactionReference)
    {
        $this->TransactionReference = $TransactionReference;
    }

    /**
     * @return mixed
     */
    public function getTransactionReference()
    {
        return $this->TransactionReference;
    }

}