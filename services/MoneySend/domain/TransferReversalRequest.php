<?php

namespace Mastercard\services\MoneySend\domain;

class TransferReversalRequest {

    private $ICA;
    private $TransactionReference;
    private $ReversalReason;

    /**
     * @param mixed $ICA
     */
    public function setICA($ICA)
    {
        $this->ICA = $ICA;
    }

    /**
     * @return mixed
     */
    public function getICA()
    {
        return $this->ICA;
    }

    /**
     * @param mixed $ReversalReason
     */
    public function setReversalReason($ReversalReason)
    {
        $this->ReversalReason = $ReversalReason;
    }

    /**
     * @return mixed
     */
    public function getReversalReason()
    {
        return $this->ReversalReason;
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