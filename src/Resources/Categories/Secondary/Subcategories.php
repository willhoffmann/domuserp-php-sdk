<?php

namespace DomusErp\Sdk\Resources\Categories\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\DomusClient;
use DomusErp\Sdk\Resources\AbstractResource;

class Subcategories extends AbstractResource implements GetContract
{
    /**
     * @var integer
     */
    protected $categoryId;

    /**
     * Constructor
     *
     * @param DomusClient $domusClient
     * @param $categoryId
     */
    public function __construct(DomusClient $domusClient, $categoryId)
    {
        parent::__construct($domusClient);
        $this->categoryId = $categoryId;
    }

    /**
     * List of subcategories
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(
            self::DOMUSERP_API_OPERACIONAL . '/categorias/' . $this->categoryId . '/subcategorias',
            $query
        );

        return $list;
    }

    /**
     * Gets the subcategory data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_OPERACIONAL . '/categorias/' . $this->categoryId . '/subcategorias/' . $id
        );

        return $data;
    }
}
