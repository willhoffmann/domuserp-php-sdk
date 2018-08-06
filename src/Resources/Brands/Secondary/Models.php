<?php

namespace DomusErp\Sdk\Resources\Brands\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\DomusClient;
use DomusErp\Sdk\Resources\AbstractResource;

class Models extends AbstractResource implements GetContract
{
    /**
     * @var integer
     */
    protected $brandId;

    /**
     * Constructor
     *
     * @param DomusClient $domusClient
     * @param $brandId
     */
    public function __construct(DomusClient $domusClient, $brandId)
    {
        parent::__construct($domusClient);
        $this->brandId = $brandId;
    }

    /**
     * List of product models
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(
            self::DOMUSERP_API_OPERACIONAL . '/marcas/' . $this->brandId . '/modelos',
            $query
        );

        return $list;
    }

    /**
     * Gets the product models data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_OPERACIONAL . '/marcas/' . $this->brandId . '/modelos/' . $id
        );

        return $data;
    }
}
