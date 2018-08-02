<?php

namespace DomusErp\Sdk\Resources;

use DomusErp\Sdk\DomusClient;
use DomusErp\Sdk\Request;
use DomusErp\Sdk\RequestMethods;

abstract class AbstractResource implements RequestMethods
{
    /**
     * Domus client object
     *
     * @var DomusClient
     */
    protected $domusClient;

    /**
     * API branch
     *
     * @var int
     */
    protected $branch;

    /**
     * Create a new Resource instance
     *
     * @param DomusClient $domusClient
     */
    public function __construct(DomusClient $domusClient)
    {
        $this->domusClient = $domusClient;
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
        $this->branch = $branch;
        $this->domusClient->setBranch($branch);

        return $this;
    }

    /**
     * @param $resource
     * @param array $query
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function pagination($resource, array $query = [])
    {
        $query['start'] = isset($query['start']) ? $query['start'] : 0;
        $query['pageSize'] = isset($query['pageSize']) ? $query['pageSize'] : 100;

        return $this->execute(self::HTTP_GET, $resource, ['query' => $query]);
    }

    /**
     * Execute the resource
     *
     * @param $method
     * @param $resource
     * @param array $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function execute($method, $resource, array $data = [])
    {
        if (! $this->branch) {
            $this->setBranch(1);
        }

        $request = new Request($this->domusClient->getHandler());
        $dataResource = $request->execute($method, $this->domusClient->makeUrl($resource), array_merge($data, [
            'headers' => [
                'X-Session-ID' => $this->domusClient->getToken()
            ]
        ]));

        return $dataResource;
    }
}
