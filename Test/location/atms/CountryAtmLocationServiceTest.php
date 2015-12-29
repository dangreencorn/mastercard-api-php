<?php
namespace Mastercard\Test\location\atms;

use \Mastercard\common\Environment;
use \Mastercard\services\location\atms\CountryAtmLocationService;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class CountryAtmLocationServiceTest extends PHPUnit_Framework_TestCase {

    private $service;

    public function setUp()
    {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CountryAtmLocationService(
            $credentials->getConsumerKey(),
            $credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testService()
    {
        $countries = $this->service->getCountries();
        $this->assertTrue(count($countries->getCountry()) > 0);
    }

}
 