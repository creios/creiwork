<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Util\DataLayer;
use Creios\Http\Message\ServerRequest;
use Monolog\Logger;
use TimTegeler\Routerunner\Controller\ControllerInterface;

/**
 * Class BaseController
 * @package Creios\Creiwork\Controller
 */
abstract class BaseController implements ControllerInterface
{

    /**
     * @var ServerRequest
     */
    protected $request;
    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var String
     */
    protected $reroutedUri;

    /**
     * BaseController constructor.
     * @param ServerRequest $serverRequest
     * @param Logger $logger
     */
    public function __construct(ServerRequest $serverRequest, Logger $logger)
    {
        $this->request = $serverRequest;
        $this->logger = $logger;
    }

    /**
     * @param String $reroutedUri
     */
    public function setReroutedUri($reroutedUri)
    {
        $this->reroutedUri = $reroutedUri;
    }

}