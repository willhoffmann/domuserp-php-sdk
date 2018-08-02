<?php

namespace DomusErp\Sdk\Contracts;

interface GetContract
{
    /**
     * Get list all records
     *
     * @param array $query
     *
     * @return array
     */
    public function getList(array $query = []);

    /**
     *  Get a specific item
     *
     * @param int $id
     *
     * @return array
     */
    public function get($id);
}
