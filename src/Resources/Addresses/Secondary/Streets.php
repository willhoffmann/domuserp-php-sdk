<?php

namespace DomusErp\Sdk\Resources\Addresses\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\DataReceiver;
use DomusErp\Sdk\DomusClient;
use DomusErp\Sdk\Resources\AbstractResource;

class Streets extends AbstractResource implements GetContract
{
    /**
     * BASE URI RESOURCE
     *
     * @var string
     */
    protected static $BASE_URI = self::DOMUSERP_API_OPERACIONAL . '/enderecos/localidade';

    /**
     * @var int $cityId
     */
    protected $cityId;

    /**
     * @var int $neighborhoodId
     */
    protected $neighborhoodId;

    /**
     * Constructor
     *
     * @param DomusClient $domusClient
     * @param $cityId
     */
    public function __construct(DomusClient $domusClient, $cityId, $neighborhoodId)
    {
        parent::__construct($domusClient);
        $this->cityId = $cityId;
        $this->neighborhoodId = $neighborhoodId;
    }

    /**
     * List of neighborhoods
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $resource = self::$BASE_URI . '/' . $this->cityId . '/bairros/' . $this->neighborhoodId . '/logradouro';
        $list = $this->pagination($resource);

        return $list;
    }

    /**
     * Gets the street data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $resource = self::$BASE_URI . '/' . $this->cityId . '/bairros/' . $this->neighborhoodId . '/logradouro/' . $id;
        $data = $this->execute(self::HTTP_GET, $resource);

        return $data;
    }

    /**
     * Create new street
     *
     * @return DataReceiver
     */
    public function create()
    {
        return new DataReceiver($this);
    }

    /**
     * Send the save request
     *
     * @param DataReceiver $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function save(DataReceiver $data)
    {
        $resource = self::$BASE_URI . '/' . $this->cityId . '/bairros/' . $this->neighborhoodId . '/logradouro';
        return $this->execute(self::HTTP_POST, $resource, ['json' => $data->toArray()]);
    }
}
