<?php

namespace Mastercard\Test\MoneySend;

use \Mastercard\common\Environment;
use \Mastercard\services\MoneySend\services\DeleteSubscriberIdService;
use \Mastercard\services\MoneySend\domain\DeleteSubscriberId;
use \Mastercard\services\MoneySend\domain\DeleteSubscriberIdRequest;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class DeleteCardMappingServiceTest extends PHPUnit_Framework_TestCase {

    private $cardMappingService;

    public function setUp() {
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->deleteSubscriberIdService = new DeleteSubscriberIdService($credentials->getConsumerKey(), $credentials->getPrivateKey(), Environment::SANDBOX);
    }

    public function testDeleteSubscriberIdService() {
        $deleteSubscriberIdRequest = new DeleteSubscriberIdRequest();
        $deleteSubscriberIdRequest->setSubscriberId("examplePHP@email.com");
        $deleteSubscriberIdRequest->setSubscriberType("EMAIL_ADDRESS");
        $deleteSubscriberId = $this->deleteSubscriberIdService->getDeleteSubscriberId($deleteSubscriberIdRequest);
        $this->assertTrue($deleteSubscriberId->getRequestId() != null && $deleteSubscriberId->getRequestId() > 0);
    }

}