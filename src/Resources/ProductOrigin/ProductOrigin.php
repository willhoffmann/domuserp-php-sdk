<?php

namespace DomusErp\Sdk\Resources\ProductOrigin;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class ProductOrigin extends AbstractResource implements GetContract
{
    /**
     * List of product origins available in the Domus Contábil
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/origensproduto', $query);

        return $list;
    }

    /**
     * Gets the product origin data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/origensproduto/' . $id);

        return $data;
    }
}
