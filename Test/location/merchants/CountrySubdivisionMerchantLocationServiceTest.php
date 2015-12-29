<?php
namespace Mastercard\Test\location\merchants;

use \Mastercard\common\Environment;
use \Mastercard\services\location\merchants\CountrySubdivisionMerchantLocationService;
use \Mastercard\services\location\domain\options\merchants\Details;
use \Mastercard\services\location\domain\options\merchants\CountrySubdivisionMerchantLocationRequestOptions;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;


class CountrySubdivisionMerchantLocationServiceTest extends PHPUnit_Framework_TestCase {

    private $service;

    public function setUp()
    {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->service = new CountrySubdivisionMerchantLocationService(
            $credentials->getConsumerKey(),
            $credentials->getPrivateKey(),
            Environment::SANDBOX
        );
    }

    public function testCountrySubdivisionMerchantLocationServiceWithPaypass()
    {
        $options = new CountrySubdivisionMerchantLocationRequestOptions(
            Details::ACCEPTANCE_PAYPASS,
            "USA"
        );
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }

    public function testCountrySubdivisionMerchantLocationServiceWithOffers()
    {
        $options = new CountrySubdivisionMerchantLocationRequestOptions(
            Details::OFFERS_EASYSAVINGS,
            "USA"
        );
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }

    public function testCountrySubdivisionMerchantLocationServiceWithPrepaidTravelCard()
    {
        $options = new CountrySubdivisionMerchantLocationRequestOptions(
            Details::PRODUCTS_PREPAID_TRAVEL_CARD,
            "USA"
        );
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }

    public function testCountrySubdivisionMerchantLocationServiceWithRepower()
    {
        $options = new CountrySubdivisionMerchantLocationRequestOptions(
            Details::TOPUP_REPOWER,
            "USA"
        );
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }

    public function testCountrySubdivisionMerchantLocationServiceWithCashback()
    {
        $options = new CountrySubdivisionMerchantLocationRequestOptions(
            Details::FEATURES_CASHBACK,
            "USA"
        );
        $countrySubdivisions = $this->service->getCountrySubdivisions($options);
        $this->assertTrue(count($countrySubdivisions->getCountrySubdivision()) > 0);
    }



}
 