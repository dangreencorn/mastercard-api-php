<?php
namespace Mastercard\Test\Restaurants;

use \Mastercard\common\Environment;
use \Mastercard\services\Restaurants\services\CategoriesLocalFavoritesService;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class CategoriesLocalFavoritesServiceTest extends PHPUnit_Framework_TestCase {
    private $credentials;
    private $service;

    public function setUp()
    {
        $this->credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CategoriesLocalFavoritesService(
            $this->credentials->getConsumerKey(),
            $this->credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testRestaurantCategories()
    {
        $categories = $this->service->getCategories();
        $this->assertTrue(count($categories->getCategory()) > 0);
    }
}
