<?php

namespace Mastercard\services\MoneySend\domain;

class PaymentRequest {

    private $LocalDate;
    private $LocalTime;
    private $TransactionReference;
    private $SenderName;
    private $SenderAddress;
    private $ReceivingCard;
    private $ReceivingMapped;
    private $ReceivingAmount;
    private $ICA;
    private $ProcessorId;
    private $RoutingAndTransitNumber;
    private $CardAcceptor;
    private $TransactionDesc;
    private $MerchantId;

    /**
     * @param mixed $CardAcceptor
     */
    public function setCardAcceptor($CardAcceptor)
    {
        $this->CardAcceptor = $CardAcceptor;
    }

    /**
     * @return mixed
     */
    public function getCardAcceptor()
    {
        return $this->CardAcceptor;
    }

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
     * @param mixed $LocalDate
     */
    public function setLocalDate($LocalDate)
    {
        $this->LocalDate = $LocalDate;
    }

    /**
     * @return mixed
     */
    public function getLocalDate()
    {
        return $this->LocalDate;
    }

    /**
     * @param mixed $LocalTime
     */
    public function setLocalTime($LocalTime)
    {
        $this->LocalTime = $LocalTime;
    }

    /**
     * @return mixed
     */
    public function getLocalTime()
    {
        return $this->LocalTime;
    }

    /**
     * @param mixed $MerchantId
     */
    public function setMerchantId($MerchantId)
    {
        $this->MerchantId = $MerchantId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->MerchantId;
    }

    /**
     * @param mixed $ProcessorId
     */
    public function setProcessorId($ProcessorId)
    {
        $this->ProcessorId = $ProcessorId;
    }

    /**
     * @return mixed
     */
    public function getProcessorId()
    {
        return $this->ProcessorId;
    }

    /**
     * @param mixed $ReceivingAmount
     */
    public function setReceivingAmount($ReceivingAmount)
    {
        $this->ReceivingAmount = $ReceivingAmount;
    }

    /**
     * @return mixed
     */
    public function getReceivingAmount()
    {
        return $this->ReceivingAmount;
    }

    /**
     * @param mixed $ReceivingCard
     */
    public function setReceivingCard($ReceivingCard)
    {
        $this->ReceivingCard = $ReceivingCard;
    }

    /**
     * @return mixed
     */
    public function getReceivingCard()
    {
        return $this->ReceivingCard;
    }

    /**
     * @param mixed $ReceivingMapped
     */
    public function setReceivingMapped($ReceivingMapped)
    {
        $this->ReceivingMapped = $ReceivingMapped;
    }

    /**
     * @return mixed
     */
    public function getReceivingMapped()
    {
        return $this->ReceivingMapped;
    }

    /**
     * @param mixed $RoutingAndTransitNumber
     */
    public function setRoutingAndTransitNumber($RoutingAndTransitNumber)
    {
        $this->RoutingAndTransitNumber = $RoutingAndTransitNumber;
    }

    /**
     * @return mixed
     */
    public function getRoutingAndTransitNumber()
    {
        return $this->RoutingAndTransitNumber;
    }

    /**
     * @param mixed $SenderAddress
     */
    public function setSenderAddress($SenderAddress)
    {
        $this->SenderAddress = $SenderAddress;
    }

    /**
     * @return mixed
     */
    public function getSenderAddress()
    {
        return $this->SenderAddress;
    }

    /**
     * @param mixed $SenderName
     */
    public function setSenderName($SenderName)
    {
        $this->SenderName = $SenderName;
    }

    /**
     * @return mixed
     */
    public function getSenderName()
    {
        return $this->SenderName;
    }

    /**
     * @param mixed $TransactionDesc
     */
    public function setTransactionDesc($TransactionDesc)
    {
        $this->TransactionDesc = $TransactionDesc;
    }

    /**
     * @return mixed
     */
    public function getTransactionDesc()
    {
        return $this->TransactionDesc;
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