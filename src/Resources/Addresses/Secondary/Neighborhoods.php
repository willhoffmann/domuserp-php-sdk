<?php

namespace DomusErp\Sdk\Resources\Addresses\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\DataReceiver;
use DomusErp\Sdk\DomusClient;
use DomusErp\Sdk\Resources\AbstractResource;

class Neighborhoods extends AbstractResource implements GetContract
{
    /**
     * @var int $cityId
     */
    protected $cityId;

    /**
     * Constructor
     *
     * @param DomusClient $domusClient
     * @param $cityId
     */
    public function __construct(DomusClient $domusClient, $cityId)
    {
        parent::__construct($domusClient);
        $this->cityId = $cityId;
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
        $resource = self::DOMUSERP_API_OPERACIONAL . '/' . $this->cityId .'/bairros';
        $list = $this->pagination($resource);

        return $list;
    }

    /**
     * Gets the neighborhood data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $resource = self::DOMUSERP_API_OPERACIONAL . '/enderecos/localidade/'. $this->cityId .'/bairros/' . $id;
        $data = $this->execute(self::HTTP_GET, $resource);

        return $data;
    }

    /**
     * Gets the neighborhoods linked to the neighborhood according to the neighborhoodId parameter
     *
     * @param $neighborhoodId
     * @return Streets
     */
    public function streets($neighborhoodId)
    {
        return new Streets($this->domusClient, $this->cityId, $neighborhoodId);
    }

    /**
     * Create new neighborhood
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
        $resource = self::DOMUSERP_API_OPERACIONAL . '/enderecos/localidade/'. $this->cityId .'/bairros';
        return $this->execute(self::HTTP_POST, $resource, ['json' => $data->toArray()]);
    }
}
