<?php
namespace Creios\Creiwork\Util;

use Creios\Creiwork\Responses\JsonResponse;
use Creios\Creiwork\Responses\RedirectResponse;
use Creios\Creiwork\Responses\Response;
use Creios\Creiwork\Responses\TemplateResponse;
use League\Plates\Engine;
use TimTegeler\Routerunner\PostProcessor\PostProcessorInterface;

/**
 * Class OutputLayer
 * @package Creios\Creiwork\Util
 */
class OutputLayer implements PostProcessorInterface
{

    /** @var  Engine */
    protected $engine;

    /**
     * OutputLayer constructor.
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    /**
     * @param Response $output
     * @return string
     */
    public function process($output)
    {
        if ($output instanceof TemplateResponse) {
            return $this->engine->render($output->getTemplate(), $output->getData());
        } else if ($output instanceof JsonResponse) {
            return json_encode($output->getData());
        } else if ($output instanceof RedirectResponse) {
            header("Location: " . $output->getUrl());
            return "";
        } else {
            return $output;
        }
    }

}