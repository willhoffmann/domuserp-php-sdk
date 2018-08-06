<?php

namespace DomusErp\Sdk\Resources\Companies\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\DomusClient;
use DomusErp\Sdk\Resources\AbstractResource;

class Branches extends AbstractResource implements GetContract
{
    /**
     * @var integer
     */
    protected $companyId;

    /**
     * Constructor
     *
     * @param DomusClient $domusClient
     * @param $companyId
     */
    public function __construct(DomusClient $domusClient, $companyId)
    {
        parent::__construct($domusClient);
        $this->companyId = $companyId;
    }

    /**
     * List of branches
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/empresas/' . $this->companyId . '/filiais'
        );

        return $list;
    }

    /**
     * Gets the branch data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/empresas/' . $this->companyId . '/filiais/' . $id
        );

        return $data;
    }
}
