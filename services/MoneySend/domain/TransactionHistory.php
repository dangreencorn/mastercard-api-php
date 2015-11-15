<?php

namespace Mastercard\services\MoneySend\domain;

class TransactionHistory {

    private $Transaction;

    /**
     * @param mixed $Transaction
     */
    public function setTransaction($Transaction)
    {
        $this->Transaction = $Transaction;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->Transaction;
    }

}