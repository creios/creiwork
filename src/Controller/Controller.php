<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Framework\BaseController;
use Creios\Creiwork\Framework\Result\JsonResult;
use Creios\Creiwork\Framework\Result\RedirectResult;
use Creios\Creiwork\Framework\Result\TemplateResult;

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
        return (new JsonResult(['index', 'title']));
    }

    public function jsonDownload()
    {
        return (new JsonResult(['index', 'title']))->asDownload('test.json');
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
