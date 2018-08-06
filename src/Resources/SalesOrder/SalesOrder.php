<?php

namespace DomusErp\Sdk\Resources\SalesOrder;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class SalesOrder extends AbstractResource implements GetContract
{
    /**
     * List of sales order
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_PEDIDOVENDA . '/pedidos', $query);

        return $list;
    }

    /**
     * Gets the sales order data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_PEDIDOVENDA . '/pedidos/' . $id);

        return $data;
    }

    /**
     * Simulate plots
     *
     * @param array $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function simulatePlots($data = [])
    {
        return $this->execute(
            self::HTTP_POST,
            self::DOMUSERP_API_PEDIDOVENDA . '/pedidos/simulacao/parcelas',
            ['body' => $data]
        );
    }

    /**
     * Simulate taxes
     *
     * @param array $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function simulateTaxes($data = [])
    {
        return $this->execute(
            self::HTTP_POST,
            self::DOMUSERP_API_PEDIDOVENDA . '/pedidos/simulacao/impostos',
            ['body' => $data]
        );
    }
}
