<?php
namespace Mastercard\Test\MoneySend;

use \Mastercard\common\Environment;
use \Mastercard\services\MoneySend\services\PanEligibilityService;
use \Mastercard\services\MoneySend\domain\PanEligibility;
use \Mastercard\services\MoneySend\domain\PanEligibilityRequest;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class PanEligibilityServiceTest extends PHPUnit_Framework_TestCase {

    private $panEligibilityService;
    private $panEligibilityRequest;
    private $panEligibility;

    public function setUp() {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->panEligibilityService = new PanEligibilityService($credentials->getConsumerKey(), $credentials->getPrivateKey(), Environment::SANDBOX);
    }

    public function testPanEligibilityService_NotEligible() {
        $this->panEligibilityRequest = new PanEligibilityRequest();
        $this->panEligibilityRequest->setSendingAccountNumber("5184680990000024");
        $this->panEligibilityRequest->setReceivingAccountNumber("5184680060000201");
        $this->panEligibility = $this->panEligibilityService->getPanEligibility($this->panEligibilityRequest);
        $this->assertTrue($this->panEligibility->getRequestId() != null && $this->panEligibility->getRequestId() > 0);
        $this->assertTrue($this->panEligibility->getSendingEligibility()->getEligible() != null && $this->panEligibility->getSendingEligibility()->getEligible() == "false");
        $this->assertTrue($this->panEligibility->getReceivingEligibility()->getEligible() != null && $this->panEligibility->getReceivingEligibility()->getEligible() == "false");
    }

    public function testPanEligibilityService_SendingEligible() {
        $this->panEligibilityRequest = new PanEligibilityRequest();
        $this->panEligibilityRequest->setSendingAccountNumber("5184680430000006");
        $this->panEligibility = $this->panEligibilityService->getPanEligibility($this->panEligibilityRequest);
        $this->assertTrue($this->panEligibility->getRequestId() != null && $this->panEligibility->getRequestId() > 0);
        $this->assertTrue($this->panEligibility->getSendingEligibility()->getEligible() != null && $this->panEligibility->getSendingEligibility()->getEligible() == "true");
        $this->assertTrue($this->panEligibility->getSendingEligibility()->getAccountNumber() != null && strlen($this->panEligibility->getSendingEligibility()->getAccountNumber()) > 1);
    }

    public function testPanEligibilityService_ReceivingEligible() {
        $this->panEligibilityRequest = new PanEligibilityRequest();
        $this->panEligibilityRequest->setReceivingAccountNumber("5184680430000006");
        $this->panEligibility = $this->panEligibilityService->getPanEligibility($this->panEligibilityRequest);
        $this->assertTrue($this->panEligibility->getRequestId() != null && $this->panEligibility->getRequestId() > 0);
        $this->assertTrue($this->panEligibility->getReceivingEligibility()->getEligible() != null && $this->panEligibility->getReceivingEligibility()->getEligible() == "true");
        $this->assertTrue($this->panEligibility->getReceivingEligibility()->getAccountNumber() != null && strlen($this->panEligibility->getReceivingEligibility()->getAccountNumber()) > 1);
    }

}