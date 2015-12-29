<?php
namespace Mastercard\Test\MoneySend;

use \Mastercard\common\Environment;
use \Mastercard\services\MoneySend\services\TransferReversalService;
use \Mastercard\services\MoneySend\domain\TransferReversal;
use \Mastercard\services\MoneySend\domain\TransferReversalRequest;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class TransferReversalServiceTest extends PHPUnit_Framework_TestCase {

    private $transferReversalService;
    private $transferReversalRequest;
    private $transferReversal;

    public function setUp() {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->transferReversalService = new TransferReversalService($credentials->getConsumerKey(), $credentials->getPrivateKey(), Environment::SANDBOX);
    }

    public function testTransferReversalService() {
        $this->transferReversalRequest = new TransferReversalRequest();
        $this->transferReversalRequest->setICA("009674");
        $this->transferReversalRequest->setTransactionReference("4000000001111111113");
        $this->transferReversalRequest->setReversalReason("FAILURE IN PROCESSING");
        $this->transferReversal = $this->transferReversalService->getTransferReversal($this->transferReversalRequest);
        $this->assertTrue($this->transferReversal != null);
        $this->assertTrue($this->transferReversal->getTransactionReference() > 0);
        $this->assertTrue($this->transferReversal->getTransactionHistory() != null);
        $this->assertTrue($this->transferReversal->getTransactionHistory()->getTransaction()->getResponse()->getCode() == 00);
    }

}