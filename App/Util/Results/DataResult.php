<?php

namespace Creios\Creiwork\Util\Results;

/**
 * Class DataResult
 * @package Creios\Creiwork\Util\Results
 */
abstract class DataResult extends Result
{

    /**
     * @var array
     */
    protected $data;

    /**
     * Result constructor.
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
