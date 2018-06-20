<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Framework\Controller\BaseController;
use Creios\Creiwork\Framework\Result\ApacheFileResult;
use Creios\Creiwork\Framework\Result\Interfaces\DisposableResultInterface;
use Creios\Creiwork\Framework\Result\RedirectResult;
use Creios\Creiwork\Framework\Result\StringResult;
use Creios\Creiwork\Framework\Result\TemplateResult;
use Creios\Creiwork\Framework\Result\Util\Disposition;

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
        return new TemplateResult('index');
    }

    /**
     * @return StringResult
     */
    public function json()
    {
        return StringResult::createJsonResult(json_encode(['index', 'title']));
    }

    /**
     * @return DisposableResultInterface
     */
    public function jsonDownload()
    {
        $disposition = (new Disposition(Disposition::ATTACHMENT))->withFilename('test.json');
        return StringResult::createJsonResult(json_encode(['index', 'title']))
            ->withDisposition($disposition);
    }

    /**
     * @return ApacheFileResult
     */
    public function roboFile()
    {
        return new ApacheFileResult(__DIR__ . '/../../RoboFile.php');
    }

    /**
     * @return RedirectResult
     */
    public function redirect()
    {
        return new RedirectResult('/');
    }

    /**
     * @throws \Exception
     */
    public function error()
    {
        throw new \Exception('Artificial exception for demonstration purpose');
    }

}
