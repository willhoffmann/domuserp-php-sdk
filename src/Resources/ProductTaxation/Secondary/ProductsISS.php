<?php

namespace DomusErp\Sdk\Resources\ProductTaxation\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class ProductsISS extends AbstractResource implements GetContract
{
    /**
     * Lists ISS products available in the Domus Contábil
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/produtosiss', $query);

        return $list;
    }

    /**
     * Gets the ISS product data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/produtosiss/' . $id);

        return $data;
    }
}
