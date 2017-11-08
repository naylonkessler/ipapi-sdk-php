<?php

use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testSetting()
    {
        $response = new \IpApi\Response();
        $response->someProp = 'some value';

        $this->assertAttributeEquals(['someProp' => 'some value'], 'attributes', $response);
    }

    public function testGetting()
    {
        $response = new \IpApi\Response();
        $response->someProp = 'some value';

        $this->assertEquals('some value', $response->someProp);
    }

    public function testFilling()
    {
        $response = new \IpApi\Response();
        $response->fill([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ]);

        $this->assertAttributeEquals([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ], 'attributes', $response);

        $response->fill(['propThree' => 'value three']);

        $this->assertAttributeEquals([
            'propOne' => 'value one',
            'propTwo' => 'value two',
            'propThree' => 'value three',
        ], 'attributes', $response);
    }

    public function testToArray()
    {
        $response = new \IpApi\Response();
        $response->fill([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ]);

        $this->assertEquals([
            'propOne' => 'value one',
            'propTwo' => 'value two',
        ], $response->toArray());
    }

    public function testToJson()
    {
        $response = new \IpApi\Response();
        $response->fill(['propOne' => 'value one']);

        $json = json_encode($response);
        $parsed = json_decode($json, true);

        $this->assertEquals(['propOne' => 'value one'], $parsed);
    }
}
