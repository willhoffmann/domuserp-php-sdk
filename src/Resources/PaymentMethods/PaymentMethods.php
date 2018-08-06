<?php

namespace DomusErp\Sdk\Resources\PaymentMethods;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class PaymentMethods extends AbstractResource implements GetContract
{
    /**
     * List of payment methods
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_PEDIDOVENDA . '/formaspagamento', $query);

        return $list;
    }

    /**
     * Gets the payment method data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_PEDIDOVENDA . '/formaspagamento/' . $id);

        return $data;
    }
}
