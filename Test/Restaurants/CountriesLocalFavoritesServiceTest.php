<?php
namespace Mastercard\Test\Restaurants;

use \Mastercard\common\Environment;
use \Mastercard\services\restaurants\services\CountriesLocalFavoritesService;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class CountriesLocalFavoritesServiceTest extends PHPUnit_Framework_TestCase {

    private $credentials;
    private $service;

    public function setUp()
    {
        $this->credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CountriesLocalFavoritesService(
            $this->credentials->getConsumerKey(),
            $this->credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testRestaurantCountries()
    {
        $countries = $this->service->getCountries();
        $this->assertTrue(count($countries->getCountry()) > 0);
    }
}
 