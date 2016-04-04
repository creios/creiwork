<?php
namespace Creios\Creiwork\Util;

use Creios\Creiwork\Responses\JsonResponse;
<<<<<<< HEAD
use Creios\Creiwork\Responses\RedirectResponse;
use Creios\Creiwork\Responses\Response;
=======
>>>>>>> 8c11aea970d756dada1ebcb36f6791e4566e2730
use Creios\Creiwork\Responses\TemplateResponse;
use League\Plates\Engine;
use TimTegeler\Routerunner\PostProcessor\PostProcessorInterface;

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
<<<<<<< HEAD
     * @param Response $output
     * @return string
=======
     * @param mixed
     * @return mixed
>>>>>>> 8c11aea970d756dada1ebcb36f6791e4566e2730
     */
    public function process($output)
    {
        if ($output instanceof TemplateResponse) {
            return $this->engine->render($output->getTemplate(), $output->getData());
        } else if ($output instanceof JsonResponse) {
            return json_encode($output->getData());
<<<<<<< HEAD
        } else if ($output instanceof RedirectResponse) {
            header("Location: " . $output->getUrl());
            return "";
=======
>>>>>>> 8c11aea970d756dada1ebcb36f6791e4566e2730
        } else {
            return $output;
        }
    }

}