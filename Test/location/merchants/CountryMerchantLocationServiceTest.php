<?php
namespace Mastercard\Test\location\merchants;

use \Mastercard\common\Environment;
use \Mastercard\services\location\merchants\CountryMerchantLocationService;
use \Mastercard\services\location\domain\options\merchants\CountryMerchantLocationRequestOptions;
use \Mastercard\services\location\domain\options\merchants\Details;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class CountryMerchantLocationServiceTest extends PHPUnit_Framework_TestCase {

    private $service;

    public function setUp()
    {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CountryMerchantLocationService(
            $credentials->getConsumerKey(),
            $credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testService()
    {
        $options = new CountryMerchantLocationRequestOptions(Details::FEATURES_CASHBACK);
        $countries = $this->service->getCountries($options);
        $this->assertTrue(count($countries->getCountry()) > 0);
    }
}
 