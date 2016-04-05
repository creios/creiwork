<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Util\DataLayer;
use Monolog\Logger;
use TimTegeler\Routerunner\Controller\ControllerInterface;

/**
 * Class BaseController
 * @package Creios\Creiwork\Controller
 */
abstract class BaseController implements ControllerInterface
{

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
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
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