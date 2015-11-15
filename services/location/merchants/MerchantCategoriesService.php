<?php

namespace Mastercard\services\location\merchants;

use \Mastercard\services\location\domain\categories\Categories;
use \Mastercard\common\Connector;
use \Mastercard\common\Environment;
use \Mastercard\common\Serializer;

class MerchantCategoriesService extends Connector {
    private $environment;

    private $PRODUCTION_URL = "https://api.mastercard.com/merchants/v1/category?Format=XML";
    private $SANDBOX_URL = "https://sandbox.api.mastercard.com/merchants/v1/category?Format=XML";

    public function __construct($consumerKey, $privateKey, $environment)
    {
        parent::__construct($consumerKey, $privateKey);
        $this->environment = $environment;
    }

    public function getCategories()
    {
        $response = parent::doSimpleRequest($this->getURL(),Connector::GET);
        $xml = simplexml_load_string($response);
        return $this->buildCategories($xml);
    }

    private function getURL()
    {
        if ($this->environment == Environment::PRODUCTION)
        {
            return $this->PRODUCTION_URL;
        }
        else
        {
            return $this->SANDBOX_URL;
        }
    }

    private function buildCategories($xml)
    {
        $categories = new Categories();
        $categoryArray = array();
        foreach($xml->Category as $category)
        {
            array_push($categoryArray, (string) $category);
        }
        $categories->setCategory($categoryArray);
        return $categories;
    }

} 