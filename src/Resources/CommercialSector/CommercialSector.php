<?php

namespace DomusErp\Sdk\Resources\CommercialSector;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class CommercialSector extends AbstractResource implements GetContract
{
    /**
     * List of commercial sectors
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/setorcomercial', $query);

        return $list;
    }

    /**
     * Gets the commercial sector data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_OPERACIONAL . '/setorcomercial/' . $id
        );

        return $data;
    }

    /**
     * Lists all customers linked to the commercial sector
     *
     * @param $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function customers($id)
    {
        $customers = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_OPERACIONAL . '/setorcomercial/' . $id . '/clientes'
        );

        return $customers;
    }
}
