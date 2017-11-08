<?php

use PHPUnit\Framework\TestCase;

class IpApiTest extends TestCase
{
    public function testLocateReturnType()
    {
        $api = new \IpApi\IpApi();
        $result = $api->locate('8.8.8.8');

        $this->assertInstanceOf(\IpApi\Response::class, $result);
    }

    public function testResponseOnSuccess()
    {
        $api = new \IpApi\IpApi();
        $result = $api->locate('8.8.8.8');

        $this->assertEquals('United States', $result->country);
        $this->assertEquals('California', $result->regionName);
        $this->assertEquals('Mountain View', $result->city);
    }
}
