<?php

namespace Creios\Creiwork\Controller;

use League\Plates\Engine;
use Monolog\Logger;
use TimTegeler\Routerunner\Controller\ControllerInterface;

/**
 * Class BaseController
 * @package Creios\Creiwork\Controller
 */
abstract class BaseController implements ControllerInterface
{

    /**
     * @var Engine
     */
    protected $templates;
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
     * @param Engine $templates
     * @param Logger $logger
     */
    public function __construct(Engine $templates, Logger $logger)
    {
        $this->templates = $templates;
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