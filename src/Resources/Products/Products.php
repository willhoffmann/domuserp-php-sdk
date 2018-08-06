<?php

namespace DomusErp\Sdk\Resources\Products;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\Products\Secondary\ProductsPriceTable;

class Products extends AbstractResource implements GetContract
{
    /**
     * Product list
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/produtos', $query);

        return $list;
    }

    /**
     * Gets the products data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/produtos/' . $id);

        return $data;
    }

    /**
     * Gets the product data from the price table
     *
     * @return ProductsPriceTable
     */
    public function priceTable()
    {
        return new ProductsPriceTable($this->domusClient);
    }
}
