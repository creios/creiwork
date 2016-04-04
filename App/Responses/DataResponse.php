<?php

namespace Creios\Creiwork\Responses;

abstract class DataResponse extends Response
{

    protected $data;

    /**
     * Response constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

}
