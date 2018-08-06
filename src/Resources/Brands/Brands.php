<?php

namespace DomusErp\Sdk\Resources\Brands;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\Brands\Secondary\Models;

class Brands extends AbstractResource implements GetContract
{
    /**
     * List of product brands
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/marcas', $query);

        return $list;
    }

    /**
     * Gets the product brand data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/marcas/' . $id);

        return $data;
    }

    /**
     * Gets the product models linked to the brand according to the brandId parameter
     *
     * @param $brandId
     * @return Models
     */
    public function models($brandId)
    {
        return new Models($this->domusClient, $brandId);
    }
}
