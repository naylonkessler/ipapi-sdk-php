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
     * @var string
     */
    protected $apiKey = '';

    /**
     * API endpoint address.
     *
     * @var string
     */
    protected $endpoint = 'http://ip-api.com/json/';

    /**
     * API endpoint address.
     *
     * @var string
     */
    protected $endpointPro = 'http://pro.ip-api.com/json/';

    /**
     * Builds a location object from received parsed data.
     *
     * @param mixed[] $data
     * @return \IpApi\Location
     */
    protected function buildLocation(array $data)
    {
        return new Location($data);
    }

    /**
     * Builds an url with received address to check.
     *
     * @param string $address
     * @return string
     */
    protected function buildUrl($address)
    {
        $url = '';

        if (empty($this->apiKey)) {
            $url = $this->endpoint . $address;
        } else {
            $url = $this->endpointPro . $address . '?key=' . $this->apiKey;
        }

        return $url;
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
     * @return \IpApi\Location
     */
    public function locate($address)
    {
        $url = $this->buildUrl($address);
        $data = $this->fetch($url);
        $parsed = $this->parse($data);
        $location = $this->buildLocation($parsed);

        return $location;
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

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

}
