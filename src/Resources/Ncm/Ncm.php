<?php

namespace DomusErp\Sdk\Resources\Ncm;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class Ncm extends AbstractResource implements GetContract
{
    /**
     * List of NCMs available in the Domus Contábil
     *
     * @param array $query
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/ncm', $query);

        return $list;
    }

    /**
     * Gets the ncm data according to the id parameter
     *
     * @param int $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/ncm/' . $id);

        return $data;
    }
}
