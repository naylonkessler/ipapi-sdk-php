<?php

use PHPUnit\Framework\TestCase;

class IpApiTest extends TestCase
{
    public function testLocateReturnType()
    {
        $api = new \IpApi\IpApi();
        $location = $api->locate('8.8.8.8');

        $this->assertInstanceOf(\IpApi\Location::class, $location);
    }

    public function testResponseOnSuccess()
    {
        $api = new \IpApi\IpApi();
        $location = $api->locate('8.8.8.8');

        $this->assertEquals('United States', $location->country);
        $this->assertEquals('California', $location->regionName);
        $this->assertEquals('Mountain View', $location->city);
    }
}
