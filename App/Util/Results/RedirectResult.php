<?php

namespace Creios\Creiwork\Util\Results;

/**
 * Class RedirectResult
 * @package Creios\Creiwork\Util\Results
 */
class RedirectResult extends Result
{

    /**
     * @var string
     */
    protected $url;

    /**
     * RedirectResult constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}