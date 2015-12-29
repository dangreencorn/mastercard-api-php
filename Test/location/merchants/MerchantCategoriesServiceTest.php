<?php
namespace Mastercard\Test\location\merchants;

use \Mastercard\common\Environment;
use \Mastercard\services\location\merchants\MerchantCategoriesService;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class MerchantCategoriesServiceTest extends PHPUnit_Framework_TestCase {

    private $service;

    public function setUp()
    {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new MerchantCategoriesService(
            $credentials->getConsumerKey(),
            $credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testService()
    {
        $categories = $this->service->getCategories();
        $this->assertTrue(count($categories->getCategory()) > 0);
    }
}
 