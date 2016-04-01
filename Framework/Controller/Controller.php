<?php

namespace Creios\Creiwork\Controller;

/**
 * Class Controller
 * @package Creios\Creiwork\Controller
 */
class Controller extends BaseController
{

    /**
     * @return string
     */
    public function index()
    {
        return $this->templates->render('index', ['name' => 'Jonathan']);
    }

}