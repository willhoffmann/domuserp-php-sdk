<?php

namespace DomusErp\Sdk\Contracts;

interface CreateContract
{
    /**
     * Create a new record
     *
     * @return array
     */
    public function create();

    /**
     * Update a existing record
     *
     * @param int $id
     */
    public function update($id);
}
