<?php

namespace DomusErp\Sdk\Resources\Addresses;

use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\Addresses\Secondary\Cities;
use DomusErp\Sdk\Resources\Addresses\Secondary\States;
use DomusErp\Sdk\Resources\Addresses\Secondary\Types;

class Addresses extends AbstractResource
{
    /**
     * List of address
     *
     * @param array $query
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/enderecos', $query);

        return $list;
    }

    /**
     * Gets the states
     *
     * @return States
     */
    public function states()
    {
        return new States($this->domusClient);
    }

    /**
     * Gets the address types
     *
     * @return Types
     */
    public function types()
    {
        return new Types($this->domusClient);
    }

    /**
     * Gets the cities
     *
     * @return Cities
     */
    public function cities()
    {
        return new Cities($this->domusClient);
    }
}
