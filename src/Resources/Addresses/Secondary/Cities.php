<?php

namespace DomusErp\Sdk\Resources\Addresses\Secondary;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class Cities extends AbstractResource implements GetContract
{
    /**
     * List of cities
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/enderecos/localidade', $query);

        return $list;
    }

    /**
     * Gets the city data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(
            self::HTTP_GET,
            self::DOMUSERP_API_OPERACIONAL . '/enderecos/localidade/' . $id
        );

        return $data;
    }

    /**
     * Gets the neighborhoods linked to the category according to the cityId parameter
     *
     * @param $cityId
     * @return Neighborhoods
     */
    public function neighborhoods($cityId)
    {
        return new Neighborhoods($this->domusClient, $cityId);
    }
}
