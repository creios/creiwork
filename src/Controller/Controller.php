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

    /**
     * @return TemplateResult
     */
    public function index()
    {
        return new TemplateResult('index', []);
    }

    /**
     * @return JsonResult
     */
    public function json()
    {
        return (new JsonResult(['index', 'title']));
    }

    /**
     * @return $this
     */
    public function jsonDownload()
    {
        return (new JsonResult(['index', 'title']))->asDownload('test.json');
    }

    /**
     * @return RedirectResult
     */
    public function redirect()
    {
        return new RedirectResult('index');
    }

    /**
     * @throws \Exception
     */
    public function error()
    {
        throw new \Exception('Artificial exception for demonstration purpose');
    }

}
