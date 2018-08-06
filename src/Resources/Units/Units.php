<?php

namespace DomusErp\Sdk\Resources\Units;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;

class Units extends AbstractResource implements GetContract
{
    /**
     * List of units
     *
     * @param array $query
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->pagination(self::DOMUSERP_API_OPERACIONAL . '/unidades', $query);

        return $list;
    }

    /**
     * Gets the units data according to the id parameter
     *
     * @param int $id
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_OPERACIONAL . '/unidades/' . $id);

        return $data;
    }
}
