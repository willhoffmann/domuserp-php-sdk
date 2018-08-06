<?php

namespace DomusErp\Sdk\Resources\Categories;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\Categories\Secondary\Subcategories;

class Categories extends AbstractResource implements GetContract
{
    /**
     * List of categories
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/categorias', $query);

        return $list;
    }

    /**
     * Gets the category data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/categorias/' . $id);

        return $data;
    }

    /**
     * Gets the subcategories linked to the category according to the categoryId parameter
     *
     * @param $categoryId
     * @return Subcategories
     */
    public function subcategories($categoryId)
    {
        return new Subcategories($this->domusClient, $categoryId);
    }
}
