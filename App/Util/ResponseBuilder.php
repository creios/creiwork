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
        $response = (new Response())->withProtocolVersion('1.1');
        $stream = new StringStream();

        if ($output instanceof TemplateResult) {
            $stream->write($this->engine->render($output->getTemplate(), $output->getData()));

            $response = $response->withHeader('Content-Type', 'text/html')
                ->withBody($stream);

        } else if ($output instanceof JsonResult) {
            $stream->write(json_encode($output->getData()));

            $response = $response->withHeader('Content-Type', 'application/json')
                ->withBody($stream);

        } else if ($output instanceof RedirectResult) {
            $response = $response->withHeader('Location', $output->getUrl());

        } else {
            $stream->write($output);
            $response = $response->withHeader('Content-Type', 'text/plain')->withBody($stream);
        }

        return $response;
    }

}