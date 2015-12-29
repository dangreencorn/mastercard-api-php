<?php

namespace Mastercard\services\MerchantIdentifier\domain;
/**
 * Created by PhpStorm.
 * User: TVC0725
 * Date: 4/28/14
 * Time: 10:26 AM
 */

class MerchantIdentifierRequestOptions {

    private $merchantId;
    private $type;

    public function __construct($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $merchantId
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
} 