<?php

class AuthBasicTest extends PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        $basic = new Rde\Auth\Basic(array());

        $this->assertEquals(
            'WWW-Authenticate: Basic realm="admin realm"',
            $basic->buildAuthentication(),
            '檢查response檔頭');

        $basic->realm('xxx');
        $this->assertEquals(
            'WWW-Authenticate: Basic realm="xxx"',
            $basic->buildAuthentication(),
            '檢查response檔頭');
    }
}
