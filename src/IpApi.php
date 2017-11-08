<?php

namespace IpApi;

/**
 * Class IpApi.
 *
 * A main wrapper over the IpApi api.
 *
 * @package IpApi
 */
class IpApi
{
    /**
     * API endpoint address.
     *
     * @var string
     */
    protected $endpoint = 'http://ip-api.com/json/';

    /**
     * Builds a response object from received parsed data.
     *
     * @param mixed[] $data
     * @return \IpApi\Response
     */
    protected function buildResponse(array $data)
    {
        $response = new Response();
        $response->fill($data);

        return $response;
    }

    /**
     * Builds an url with received address to check.
     *
     * @param string $address
     * @return string
     */
    protected function buildUrl($address)
    {
        return $this->endpoint . $address;
    }

    /**
     * Fetches a response from the url received.
     *
     * @param string $url
     * @return bool|string
     */
    protected function fetch($url)
    {
        return file_get_contents($url);
    }

    /**
     * Locates the received address over api.
     *
     * @param string $address
     * @return \IpApi\Response
     */
    public function locate($address)
    {
        $url = $this->buildUrl($address);
        $data = $this->fetch($url);
        $parsed = $this->parse($data);
        $response = $this->buildResponse($parsed);

        return $response;
    }

    /**
     * Parses the received data.
     *
     * @param string $data
     * @return mixed
     */
    protected function parse($data)
    {
        return json_decode($data, true);
    }
}
