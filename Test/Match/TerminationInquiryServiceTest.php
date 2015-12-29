<?php
namespace Mastercard\Test\Match;

use \Mastercard\common\Environment;
use \Mastercard\services\Match\TerminationInquiryService;
use \Mastercard\services\Match\TerminationInquiryHistoryService;
use \Mastercard\services\Match\domain\TerminationInquiryRequestType;
use \Mastercard\services\Match\domain\MerchantType;
use \Mastercard\services\Match\domain\AddressType;
use \Mastercard\services\Match\domain\PrincipalType;
use \Mastercard\services\Match\domain\DriversLicenseType;
use \Mastercard\services\Match\domain\options\TerminationInquiryRequestOptions;
use \Mastercard\services\Match\domain\options\TerminationInquiryHistoryOptions;
use \Mastercard\services\Match\domain\TerminationInquiryType;
use \Mastercard\services\Match\domain\TerminatedMerchantType;
use \Mastercard\services\Match\domain\MerchantMatchType;
use \Mastercard\services\Match\domain\PrincipalMatchType;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class TerminationInquiryServiceTest extends PHPUnit_Framework_TestCase {
    private $terminationInquiryService;
    private $terminationInquiryHistoryService;
    private $terminationInquiryRequest;

    public function setUp(){
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->terminationInquiryService = new TerminationInquiryService($credentials->getConsumerKey(),$credentials->getPrivateKey(),Environment::SANDBOX);
        $this->terminationInquiryHistoryService = new TerminationInquiryHistoryService($credentials->getConsumerKey(), $credentials->getPrivateKey(), Environment::SANDBOX);

        $this->terminationInquiryRequest = new TerminationInquiryRequestType();
        $this->terminationInquiryRequest->setMerchantType(new MerchantType());
        $this->terminationInquiryRequest->getMerchantType()->setAddress(new AddressType());
        $this->terminationInquiryRequest->getMerchantType()->setPrincipal(new PrincipalType());
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->setAddress(new AddressType());
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->setDriversLicense(new DriversLicenseType());

        $this->terminationInquiryRequest->setAcquirerId("1996");
        $this->terminationInquiryRequest->setTransactionReferenceNumber("12345");
        $this->terminationInquiryRequest->getMerchantType()->setName("TERMINATED MERCHANT 2");
        $this->terminationInquiryRequest->getMerchantType()->setDoingBusinessAsName("DOING BUSINESS AS TERMINATED MERCHANT 2");
        $this->terminationInquiryRequest->getMerchantType()->setPhoneNumber("5555555555");
        $this->terminationInquiryRequest->getMerchantType()->getAddress()->setLine1("20 EAST MAIN ST");
        $this->terminationInquiryRequest->getMerchantType()->getAddress()->setLine2("EAST ISLIP           NY");
        $this->terminationInquiryRequest->getMerchantType()->getAddress()->setCity("EAST ISLIP");
        $this->terminationInquiryRequest->getMerchantType()->getAddress()->setCountrySubdivision("NY");
        $this->terminationInquiryRequest->getMerchantType()->getAddress()->setPostalCode("55555");
        $this->terminationInquiryRequest->getMerchantType()->getAddress()->setCountry("USA");
        $this->terminationInquiryRequest->getMerchantType()->setCountrySubdivisionTaxId("205545287");
        $this->terminationInquiryRequest->getMerchantType()->setNationalTaxId("2891327625");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->setFirstName("PATRICIA");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->setLastName("CLARKE");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->setNationalId("4236559970");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->getAddress()->setLine1("93-52 243 STREET");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->getAddress()->setCity("BELLEROSE");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->getAddress()->setCountrySubdivision("NY");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->getAddress()->setPostalCode("55555-5555");
        $this->terminationInquiryRequest->getMerchantType()->getPrincipal()->getAddress()->setCountry("USA");
    }

    public function testService(){
        $inquiry = $this->terminationInquiryService->getTerminationInquiry($this->terminationInquiryRequest, new TerminationInquiryRequestOptions(0,10));

        $this->assertTrue(count($inquiry->getTerminatedMerchant()) > 0);
        $this->assertTrue($inquiry->getRef() !== null && strlen($inquiry->getRef()) > 0);
        $this->assertTrue($inquiry->getTransactionReferenceNumber() !== null && strlen($inquiry->getTransactionReferenceNumber()) > 0);
        $this->assertTrue(strlen($inquiry->getReferenceId()) > 0);

        $historyOptions = new TerminationInquiryHistoryOptions(0,10,1996,$inquiry->getReferenceId());

        $terminationInquiry = $this->terminationInquiryHistoryService->getTerminationInquiry($historyOptions);
        $this->assertEquals(true, $terminationInquiry !== null);
    }
}
 