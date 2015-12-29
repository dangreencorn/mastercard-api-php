<?php
namespace Mastercard\Test\Restaurants;

use \Mastercard\common\Environment;
use \Mastercard\services\restaurants\domain\options\CountrySubdivisionsLocalFavoritesRequestOptions;
use \Mastercard\services\restaurants\services\CountrySubdivisionsLocalFavoritesService;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class CountrySubdivisionsLocalFavoritesServiceTest extends PHPUnit_Framework_TestCase {

    private $credentials;
    private $service;

    public function setUp()
    {
        $this->credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CountrySubdivisionsLocalFavoritesService(
            $this->credentials->getConsumerKey(),
            $this->credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testCountrySubdivisionService()
    {
        $options = new CountrySubdivisionsLocalFavoritesRequestOptions("USA");
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }

}
 