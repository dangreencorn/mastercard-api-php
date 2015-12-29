<?php
namespace Mastercard\Test\location\atms;

use \Mastercard\common\Environment;
use \Mastercard\services\location\atms\CountrySubdivisionAtmLocationService;
use \Mastercard\services\location\domain\options\atms\CountrySubdivisionAtmLocationRequestOptions;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class CountrySubdivisionAtmLocationServiceTest extends PHPUnit_Framework_TestCase {

    private $service;

    public function setUp()
    {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CountrySubdivisionAtmLocationService(
            $credentials->getConsumerKey(),
            $credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testService()
    {
        $options = new CountrySubdivisionAtmLocationRequestOptions("USA");
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }

}
 