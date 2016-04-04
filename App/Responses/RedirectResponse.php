<?php

namespace Creios\Creiwork\Responses;

/**
 * Class RedirectResponse
 * @package Creios\Creiwork\Responses
 */
class RedirectResponse extends Response
{

    /**
     * @var string
     */
    protected $url;

    /**
     * RedirectResponse constructor.
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