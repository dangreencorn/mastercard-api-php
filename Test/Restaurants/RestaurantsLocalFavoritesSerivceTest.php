<?php
namespace Mastercard\Test\Restaurants;

use \Mastercard\common\Environment;
use \Mastercard\services\restaurants\services\RestaurantsLocalFavoritesService;
use \Mastercard\services\restaurants\domain\options\RestaurantsLocalFavoritesRequestOptions;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class RestaurantsLocalFavoritesServiceTest extends PHPUnit_Framework_TestCase {

    private $credentials;
    private $service;

    public function setUp()
    {
        $this->credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new RestaurantsLocalFavoritesService(
            $this->credentials->getConsumerKey(),
            $this->credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testByLatitudeLongitude()
    {
        $options = new RestaurantsLocalFavoritesRequestOptions(
            0,
            25
        );
        $options->setLatitude(38.53463);
        $options->setLongitude(-90.286781);
        $restaurants = $this->service->getRestaurants($options);
        $this->assertTrue(count($restaurants->getRestaurant()) > 0);
    }
}