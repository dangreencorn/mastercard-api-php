<?php
namespace Mastercard\Test\location\merchants;

use \Mastercard\common\Environment;
use \Mastercard\services\location\merchants\MerchantLocationService;
use \Mastercard\services\location\domain\options\merchants\Details;
use \Mastercard\services\location\domain\options\merchants\MerchantLocationRequestOptions;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class MerchantLocationServiceTest extends PHPUnit_Framework_TestCase {

    private $service;

    public function setUp()
    {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new MerchantLocationService(
            $credentials->getConsumerKey(),
            $credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testMerchantLocationServiceRepower()
    {
        $options = new MerchantLocationRequestOptions(
            Details::TOPUP_REPOWER,
            0,
            25
        );
        $options->setCountry("USA");
        $options->setPostalCode("22122");
        $merchants = $this->service->getMerchants($options);
        $this->assertTrue(count($merchants->getMerchant()) > 0);
    }

    /*// At the time of the creation of this SDK, PPTC was not returning
    // valid results. Passing of this test implies that PPTC has begun to return
    // valid results and that no SDK changes are needed.
    public function testMerchantLocationServiceRepower()
        {
            $options = new MerchantLocationRequestOptions(
                Details::TOPUP_REPOWER,
                0,
                25
            );
            $options->setCountry("USA");
            $options->setPostalCode("22122");
            $this->service->getMerchants($options);
        }
    }*/

// At the time of the creation of this SDK, PPTC was not returning valid results
// Comment out this unit test once it does.

    public function testMerchantLocationServicePrepaidTravelCardPass()
    {
        $options = new MerchantLocationRequestOptions(
            Details::PRODUCTS_PREPAID_TRAVEL_CARD,
            0,
            25
        );
        $options->setCountry("USA");
        $options->setPostalCode("20006");
        $merchants = $this->service->getMerchants($options);
        $this->assertTrue(count($merchants->getMerchant()) == 0);
    }

    public function testMerchantLocationServiceOffers()
    {
        $options = new MerchantLocationRequestOptions(
            Details::OFFERS_EASYSAVINGS,
            0,
            25
        );
        $options->setCountry("USA");
        $options->setPostalCode("22122");
        $merchants = $this->service->getMerchants($options);
        $this->assertTrue(count($merchants->getMerchant()) > 0);
    }

    public function testMerchantLocationServicePaypass()
    {
        $options = new MerchantLocationRequestOptions(
            Details::ACCEPTANCE_PAYPASS,
            0,
            25
        );
        $options->setCountry("USA");
        $options->setPostalCode("07032");
        $merchants = $this->service->getMerchants($options);
        $this->assertTrue(count($merchants->getMerchant()) > 0);
    }

    public function testMerchantLocationServiceCashback()
    {
        $options = new MerchantLocationRequestOptions(
            Details::FEATURES_CASHBACK,
            0,
            25
        );
        $options->setCountry("USA");
        $options->setPostalCode("46323");
        $merchants = $this->service->getMerchants($options);
        $this->assertTrue(count($merchants->getMerchant()) > 0);
    }

    public function testMerchantLocationServiceInternationalMaestroAccepted()
    {
        $options = new MerchantLocationRequestOptions(
            Details::FEATURES_CASHBACK,
            0,
            25
        );
        $options->setCountry("USA");
        $options->setPostalCode("46323");
        $options->setInternationalMaestroAccepted(true);
        $merchants = $this->service->getMerchants($options);
        $this->assertTrue(count($merchants->getMerchant()) > 0);
    }

}
 