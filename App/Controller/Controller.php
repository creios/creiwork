<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Responses\JsonResponse;
use Creios\Creiwork\Responses\RedirectResponse;
use Creios\Creiwork\Responses\TemplateResponse;

/**
 * Class Controller
 * @package Creios\Creiwork\Controller
 */
class Controller extends BaseController
{

    public function index()
    {
        return new JsonResponse(['title' => 'index']);
    }

    public function template()
    {
        return new TemplateResponse('index', ['name' => 'tim']);
    }

    public function redirect()
    {
        return new RedirectResponse('index');
    }
    
}