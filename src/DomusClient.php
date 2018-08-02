<?php

namespace DomusErp\Sdk;

class DomusClient
{
    /**
     * @version 1.1.0
     */
    const VERSION = "1.1.0";

    /**
     * API host name
     *
     * @var string
     */
    protected $host;

    /**
     * API port
     *
     * @var string
     */
    protected $port;

    /**
     * API username
     *
     * @var string
     */
    protected $username;

    /**
     * API password
     *
     * @var string
     */
    protected $password;

    /**
     * API access token
     *
     * @var string
     */
    protected $token;

    /**
     * API branch
     *
     * @var int
     */
    protected $branch;

    /**
     * API handler
     *
     * @var string
     */
    protected $handler;

    /**
     * Setup API credentials
     *
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     */
    public function __construct($host, $port, $username, $password)
    {
        $this->host     = $host;
        $this->port     = $port;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get token
     *
     * The api authentication token
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken()
    {
        if ($this->token == null) {
            $this->authenticate();
        }

        return $this->token;
    }

    /**
     * Set branch
     *
     * @param $branch
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function setBranch($branch)
    {
        $request = new Request($this->handler);
        $this->branch = $request->execute(
            RequestMethods::HTTP_PUT,
            $this->makeUrl(RequestMethods::DOMUSERP_API_PEDIDOVENDA . '/auth'),
            [
                'json' => [
                    'id' => $branch,
                ],
                'headers' => [
                    'X-Session-ID' => $this->getToken()
                ]
            ]
        )->id;

        return $this;
    }

    /**
     * Get branch
     *
     * @return int
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set handler
     *
     * @param string $handler
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Get handler
     *
     * @return string
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Request an access token and sets it to the client.
     *
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function authenticate()
    {
        $request = new Request($this->handler);
        $this->token = $request->execute(
            RequestMethods::HTTP_POST,
            $this->makeUrl(RequestMethods::DOMUSERP_API_PEDIDOVENDA . '/auth'),
            [
                'json' => [
                    'login'    => $this->username,
                    'password' => $this->password
                ]
            ]
        )->token;

        return $this;
    }

    /**
     * Check and construct an real URL to make request
     *
     * @param $resource
     * @return string
     */
    public function makeUrl($resource)
    {
        $host     = trim(str_replace(['http://', 'https://'], null, $this->host), '/');
        $resource = trim($resource, '/');
        //Create URI
        $uri = $host . ':' . $this->port . '/' . $resource;

        return $uri;
    }

    /**
     * Instantiates a new resource class
     *
     * @param $method
     * @param array $args
     * @return string
     * @throws \ReflectionException
     */
    public function __call($method, array $args)
    {
        $class = __NAMESPACE__ . '\\Resources\\' . ucfirst($method) . '\\' . ucfirst($method);
        array_unshift($args, $this);

        return call_user_func_array([new \ReflectionClass($class), 'newInstance'], $args);
    }
}