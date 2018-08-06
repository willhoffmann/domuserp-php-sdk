<?php

namespace DomusErp\Sdk\Resources\Addresses\Secondary;

use DomusErp\Sdk\Resources\AbstractResource;

class States extends AbstractResource
{
    /**
     * List of states
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/enderecos/ufs', $query);

        return $list;
    }
}
