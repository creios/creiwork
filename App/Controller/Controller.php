<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Util\Results\JsonResult;
use Creios\Creiwork\Util\Results\RedirectResult;
use Creios\Creiwork\Util\Results\TemplateResult;

/**
 * Class Controller
 * @package Creios\Creiwork\Controller
 */
class Controller extends BaseController
{

    public function index()
    {
        return new JsonResult(['title' => 'index']);
    }

    public function template()
    {
        return new TemplateResult('index', []);
    }

    public function redirect()
    {
        return new RedirectResult('index');
    }

}