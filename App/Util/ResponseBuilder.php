<?php
namespace Creios\Creiwork\Util;

use Creios\Creiwork\Util\Results\JsonResult;
use Creios\Creiwork\Util\Results\RedirectResult;
use Creios\Creiwork\Util\Results\Result;
use Creios\Creiwork\Util\Results\TemplateResult;
use Creios\Http\Message\Response;
use Creios\Http\Message\StringStream;
use League\Plates\Engine;
use TimTegeler\Routerunner\PostProcessor\PostProcessorInterface;

/**
 * Class ResponseBuilder
 * @package Creios\Creiwork\Util
 */
class ResponseBuilder implements PostProcessorInterface
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
     * @param Result $output
     * @return Response
     */
    public function process($output)
    {
        $response = new Response('1.1');

        if ($output instanceof TemplateResult) {
            $response->withBody(new StringStream($this->engine->render($output->getTemplate(), $output->getData())));
            $response->withHeader('Content-Type', 'text/html');
        } else if ($output instanceof JsonResult) {
            $response->withBody(new StringStream(json_encode($output->getData())));
            $response->withHeader('Content-Type', 'application/json');
        } else if ($output instanceof RedirectResult) {
            $response->withHeader('Location', $output->getUrl());
        } else {
            $response->withBody(new StringStream($output));
            $response->withHeader('Content-Type', 'text/plain');
        }

        return $response;
    }

}