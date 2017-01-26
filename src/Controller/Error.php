<?php

namespace Creios\Creiwork\Controller;

use Creios\Creiwork\Framework\BaseController;
use Creios\Creiwork\Framework\Result\TemplateResult;
use Creios\Creiwork\Framework\ResultFactory;

/**
 * Class Error
 * @package Creios\Creiwork\Controller
 */
class Error extends BaseController
{

    /**
     * @return TemplateResult
     */
    public function notFound()
    {
        return ResultFactory::createPlainTextResult('404');
    }
}