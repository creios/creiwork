<?php

namespace Creios\Creiwork;

use League\BooBoo\Util;
use League\BooBoo\Formatter\AbstractFormatter;
use League\Plates\Engine;

/**
 * Class BootstrapFormatter
 * @package Creios\Creiwork
 */
class ErrorPageFormatter extends AbstractFormatter
{

    /**
     * @var Engine
     */
    protected $templates;

    /**
     * BootstrapFormatter constructor.
     * @param $templates
     */
    public function __construct(Engine $templates)
    {
        $this->templates = $templates;
    }

    /**
     * @param \Exception $e
     * @return string
     */
    public function format(\Exception $e)
    {
        return $this->templates->render('error', ['exception' => $e]);
    }
}
