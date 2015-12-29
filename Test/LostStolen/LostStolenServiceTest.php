<?php
namespace Mastercard\Test\LostStolen;

use \Mastercard\services\LostStolen\domain\Account;
use \Mastercard\services\LostStolen\domain\AccountInquiry;
use \Mastercard\services\LostStolen\LostStolenService;
use \Mastercard\common\Environment;
use \Mastercard\common\CredentialsHelper;
use \PHPUnit_Framework_TestCase;

class LostStolenServiceTest extends PHPUnit_Framework_TestCase
{
    private $LostStolenService;
    private $account;

    public function setUp(){
        $credentials = new CredentialsHelper(Environment::SANDBOX);
        $this->LostStolenService = new LostStolenService($credentials->getConsumerKey(), $credentials->getPrivateKey(), Environment::SANDBOX);
        $this->account = new Account();
    }

    public function testStolen(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("5343434343434343");
        $this->assertEquals(true,$this->account->getReasonCode() == "S");
    }

    public function testFraud(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("5105105105105100");
        $this->assertEquals(true,$this->account->getReasonCode() == "F");
    }

    public function testLost(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("5222222222222200");
        $this->assertEquals(true,$this->account->getReasonCode() == "L");
    }

    public function testCaptureCard(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("5305305305305300");
        $this->assertEquals(true,$this->account->getReasonCode() == "P");
    }

    public function testUnauthorizedUse(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("6011111111111117");
        $this->assertEquals(true,$this->account->getReasonCode() == "U");
    }

    public function testCounterfeit(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("4444333322221111");
        $this->assertEquals(true,$this->account->getReasonCode() == "X");
    }

    public function testNotListed(){
        $this->account = new Account();
        $this->account = $this->LostStolenService->getLostStolen("343434343434343");
        $this->assertEquals(true,$this->account->getReasonCode()== "");
    }

}
 