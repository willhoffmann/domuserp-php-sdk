<?php

namespace DomusErp\Sdk\Resources\People\Data;

use DomusErp\Sdk\DataReceiver;

class PersonData extends DataReceiver
{
    /**
     * Put a address on person data
     *
     * @param array $address
     * @return object
     */
    public function address(array $address)
    {
        if (! isset($this->data->addresses)) {
            $this->data->addresses = [];
        }

        return $this->data->addresses[] = (object) $address;
    }

    /**
     * Put a contact on person data
     *
     * @param array $contact
     * @return object
     */
    public function contacts(array $contact)
    {
        if (! isset($this->data->contacts)) {
            $this->data->contacts = [];
        }

        return $this->data->contacts[] = (object) $contact;
    }

    /**
     * Put a commercial reference on person data
     *
     * @param array $reference
     * @return object
     */
    public function references(array $reference = null)
    {
        if (! isset($this->data->references)) {
            $this->data->references = [];
        }

        return $this->data->contacts[] = (object) $reference;
    }
}
