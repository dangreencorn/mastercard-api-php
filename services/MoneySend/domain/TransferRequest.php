<?php

namespace Mastercard\services\MoneySend\domain;

class TransferRequest {

   private $LocalDate;
   private $LocalTime;
   private $TransactionReference;
   private $SenderName;
   private $SenderAddress;
   private $FundingCard;
   private $FundingMapped;
   private $FundingUCAF;
   private $FundingMasterCardAssignedId;
   private $FundingAmount;
   private $ReceiverName;
   private $ReceiverAddress;
   private $ReceiverPhone;
   private $ReceivingCard;
   private $ReceivingAmount;
   private $Channel;
   private $UCAFSupport;
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
     * @param mixed $Channel
     */
    public function setChannel($Channel)
    {
        $this->Channel = $Channel;
    }

    /**
     * @return mixed
     */
    public function getChannel()
    {
        return $this->Channel;
    }

    /**
     * @param mixed $FundingAmount
     */
    public function setFundingAmount($FundingAmount)
    {
        $this->FundingAmount = $FundingAmount;
    }

    /**
     * @return mixed
     */
    public function getFundingAmount()
    {
        return $this->FundingAmount;
    }

    /**
     * @param mixed $FundingCard
     */
    public function setFundingCard($FundingCard)
    {
        $this->FundingCard = $FundingCard;
    }

    /**
     * @return mixed
     */
    public function getFundingCard()
    {
        return $this->FundingCard;
    }

    /**
     * @param mixed $FundingMapped
     */
    public function setFundingMapped($FundingMapped)
    {
        $this->FundingMapped = $FundingMapped;
    }

    /**
     * @return mixed
     */
    public function getFundingMapped()
    {
        return $this->FundingMapped;
    }

    /**
     * @param mixed $FundingMasterCardAssignedId
     */
    public function setFundingMasterCardAssignedId($FundingMasterCardAssignedId)
    {
        $this->FundingMasterCardAssignedId = $FundingMasterCardAssignedId;
    }

    /**
     * @return mixed
     */
    public function getFundingMasterCardAssignedId()
    {
        return $this->FundingMasterCardAssignedId;
    }

    /**
     * @param mixed $FundingUCAF
     */
    public function setFundingUCAF($FundingUCAF)
    {
        $this->FundingUCAF = $FundingUCAF;
    }

    /**
     * @return mixed
     */
    public function getFundingUCAF()
    {
        return $this->FundingUCAF;
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
     * @param mixed $ReceiverAddress
     */
    public function setReceiverAddress($ReceiverAddress)
    {
        $this->ReceiverAddress = $ReceiverAddress;
    }

    /**
     * @return mixed
     */
    public function getReceiverAddress()
    {
        return $this->ReceiverAddress;
    }

    /**
     * @param mixed $ReceiverName
     */
    public function setReceiverName($ReceiverName)
    {
        $this->ReceiverName = $ReceiverName;
    }

    /**
     * @return mixed
     */
    public function getReceiverName()
    {
        return $this->ReceiverName;
    }

    /**
     * @param mixed $ReceiverPhone
     */
    public function setReceiverPhone($ReceiverPhone)
    {
        $this->ReceiverPhone = $ReceiverPhone;
    }

    /**
     * @return mixed
     */
    public function getReceiverPhone()
    {
        return $this->ReceiverPhone;
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

    /**
     * @param mixed $UCAFSupport
     */
    public function setUCAFSupport($UCAFSupport)
    {
        $this->UCAFSupport = $UCAFSupport;
    }

    /**
     * @return mixed
     */
    public function getUCAFSupport()
    {
        return $this->UCAFSupport;
    }
}