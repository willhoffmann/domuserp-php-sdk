<?php

namespace DomusErp\Sdk\Resources\Products\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class ProductsPriceTable extends AbstractResource implements GetContract
{
    /**
     * List of price table products
     *
     * To display the list of products, it is mandatory to enter the code of the price table as parameters
     * Example: ['tabelapreco' => 2]
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_PEDIDOVENDA . '/produtos', $query);

        return $list;
    }

    /**
     * Gets the product data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_PEDIDOVENDA . '/produtos/' . $id);

        return $data;
    }
}
