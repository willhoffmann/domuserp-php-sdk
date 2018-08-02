<?php

namespace DomusErp\Sdk;

use DomusErp\Sdk\Resources\AbstractResource;

class DataReceiver
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var AbstractResource
     */
    protected $resource;

    /**
     * @var \stdClass
     */
    protected $data;

    /**
     * DataReceiver constructor
     *
     * @param AbstractResource $resource
     * @param null $id
     */
    public function __construct(AbstractResource $resource, $id = null)
    {
        $this->id = $id;
        $this->resource = $resource;
        $this->data = new \stdClass();
    }

    /**
     * Payload the request
     *
     * @param array $data
     *
     * @return $this
     */
    public function payload(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data->{$key} = $value;
        }

        return $this;
    }

    /**
     * Get the request data
     *
     * @return array
     */
    public function toArray()
    {
        $this->data->id = $this->id;

        return json_decode(json_encode($this->data), true);
    }

    /**
     * Save request
     *
     * @return \stdClass
     */
    public function save()
    {
        return $this->resource->save($this);
    }

    /**
     * Get int
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set a specific data point
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value = null)
    {
        $this->data->{$name} = $value;
    }

    /**
     * Get a specific data point
     *
     * @param string $name
     *
     * @return string
     */
    public function __get($name)
    {
        return $this->data->{$name};
    }
}