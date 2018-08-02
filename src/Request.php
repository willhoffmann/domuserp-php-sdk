<?php

namespace DomusErp\Sdk;

use GuzzleHttp\Client;

class Request
{
    /**
     * Options
     *
     * @var array
     */
    protected static $OPTIONS = [
        'Accept'       => 'application/json',
        'Content-Type' => 'application/json',
        'uSER-aGENT'   => 'DOMUSERP-PHP-SDK-1.0.0',
    ];

    /**
     * @var $handler
     */
    protected $handler;

    /**
     * Request constructor
     *
     * Create new request instance
     *
     * @param $handler
     */
    public function __construct($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Execute the request
     *
     * @param $method
     * @param $url
     * @param array $data
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute($method, $url, array $data = [])
    {
        $client = new Client(['handler' => $this->handler]);

        return json_decode($client->request($method, $url, array_merge($data, self::$OPTIONS))->getBody());
    }
}
