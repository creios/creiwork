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
        return new TemplateResult('index', []);
    }

    public function json()
    {
        return new JsonResult(['index', 'title']);
    }

    public function redirect()
    {
        return new RedirectResult('index');
    }

    public function printRequest()
    {
        return print_r($this->request, true);
    }

}