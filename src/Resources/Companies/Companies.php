<?php

namespace DomusErp\Sdk\Resources\Companies;

use DomusErp\Sdk\Contracts\GetContract;
use DomusErp\Sdk\Resources\AbstractResource;
use DomusErp\Sdk\Resources\Companies\Secondary\Branches;

class Companies extends AbstractResource implements GetContract
{
    /**
     * List of companies
     *
     * @param array $query
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getList(array $query = [])
    {
        $list = $this->execute(self::HTTP_GET, self::DOMUSERP_API_PEDIDOVENDA . '/empresas');

        return $list;
    }

    /**
     * Gets the company data according to the id parameter
     *
     * @param int $id
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($id)
    {
        $data = $this->execute(self::HTTP_GET, self::DOMUSERP_API_PEDIDOVENDA . '/empresas/' . $id);

        return $data;
    }

    /**
     * Gets the branches linked to the company according to the companyId parameter
     *
     * @param $companyId
     * @return Branches
     */
    public function branches($companyId)
    {
        return new Branches($this->domusClient, $companyId);
    }
}
