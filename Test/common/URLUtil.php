<?php
namespace Mastercard\Test\common;

use \Mastercard\common\URLUtil;
use \PHPUnit_Framework_TestCase;

class Test extends PHPUnit_Framework_TestCase {

    const BASE_URL = "http://www.whocares.com?Format=XML";

    public function testNoValueToAdd()
    {
        $url = self::BASE_URL;
        $url = URLUtil::addQueryParameter($url, "Ignored", null);
        $this->assertTrue(strcmp($url, BASE_URL) == 0);
    }

    public function testAddParamterWithValue()
    {
        $url = self::BASE_URL;
        $url = URLUtil::addQueryParameter($url, "Present", "value");
        $this->assertTrue(strcmp($url, BASE_URL."&Present=value") == 0);
    }

    public function testAddParameterWithSpaces()
    {
        $url = self::BASE_URL;
        $url = \URLUtil::addQueryParameter($url, "Spaces", "value1 value2");
        $this->assertTrue(strcmp($url, BASE_URL."&Spaces=value1%20value2") == 0);
    }
}
 