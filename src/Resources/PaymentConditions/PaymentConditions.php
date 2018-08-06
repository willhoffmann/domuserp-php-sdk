<?php

namespace DomusErp\Sdk\Resources\PaymentConditions;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class PaymentConditions extends AbstractResource implements GetContract
{
    /**
     * List of payment conditions
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_PEDIDOVENDA . '/condicoespagamento', $query);

        return $list;
    }

    /**
     * Gets the payment condition data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_PEDIDOVENDA . '/condicoespagamento/' . $id
        );

        return $data;
    }
}
