<?php
namespace Mastercard\Test\MerchantIdentifier;

use \Mastercard\common\Environment;
use \Mastercard\services\MerchantIdentifier\MerchantIdentifierService;
use \Mastercard\services\MerchantIdentifier\domain\MerchantIdentifierRequestOptions;
use \Mastercard\services\MerchantIdentifier\domain\MerchantIds;
use \Mastercard\services\MerchantIdentifier\domain\ReturnedMerchants;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class MerchantIdentifierServiceTest extends PHPUnit_Framework_TestCase {

    private $merchantIdentifierService;

    public function setUp() {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->merchantIdentifierService = new MerchantIdentifierService($credentials->getConsumerKey(), $credentials->getPrivateKey(), Environment::SANDBOX);
    }

    public function testMerchantIdentifierServiceByMerchantId_ExactMatch() {
        $options = new MerchantIdentifierRequestOptions("DIRECTSATELLITETV");
        $options->setType("ExactMatch");
        $merchantIds = $this->merchantIdentifierService->getMerchantIds($options);
        $this->assertTrue(count($merchantIds->getReturnedMerchants()) > 0);
    }

    public function testMerchantIdentifierServiceByMerchantId_FuzzyMatch() {
        $options = new MerchantIdentifierRequestOptions("DIRECTSATELLITETV");
        $options->setType("FuzzyMatch");
        $merchantIds = $this->merchantIdentifierService->getMerchantIds($options);
        $this->assertTrue(count($merchantIds->getReturnedMerchants()->getMerchant()) > 0);
    }

//    public function testMerchantIdentifierServiceByMerchantId_DESCRIPTOR_TOO_SMALL() {
//        $options = new MerchantIdentifierRequestOptions("BESTBUY");
//        $merchant = $this->merchantIdentifierService->getMerchantIds($options);
//        //$this->assertTrue(count($merchant->getReturnedMerchants()) > 0);
//    }
}