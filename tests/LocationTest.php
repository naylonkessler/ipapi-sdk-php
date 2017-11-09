<?php

use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testSetting()
    {
        $location = new \IpApi\Location();
        $location->someProp = 'some value';

        $this->assertAttributeEquals(['someProp' => 'some value'], 'attributes', $location);
    }

    public function testGetting()
    {
        $location = new \IpApi\Location();
        $location->someProp = 'some value';

        $this->assertEquals('some value', $location->someProp);
    }

    public function testFilling()
    {
        $location = new \IpApi\Location([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ]);

        $this->assertAttributeEquals([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ], 'attributes', $location);
    }

    public function testToArray()
    {
        $location = new \IpApi\Location([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ]);

        $this->assertEquals([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ], $location->toArray());
    }

    public function testToJson()
    {
        $location = new \IpApi\Location(['propOne' => 'value one']);

        $json = json_encode($location);
        $parsed = json_decode($json, true);

        $this->assertEquals(['propOne' => 'value one'], $parsed);
    }
}
