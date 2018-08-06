<?php

namespace DomusErp\Sdk\Resources\Packages;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class Packages extends AbstractResource implements GetContract
{
    /**
     * List of packagings
     *
     * @param array $query
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/embalagens', $query);

        return $list;
    }

    /**
     * Gets the packing data according to the id parameter
     *
     * @param int $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/embalagens/' . $id);

        return $data;
    }
}
