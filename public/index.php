<?php

use Creios\Creiwork\Framework\Creiwork;
use Middlewares\TrailingSlash;

// let composer load everything
require_once "../vendor/autoload.php";

// set path to config file
$config = __DIR__ . '/../config';

// create a new Creiwork instance and start execution
(new Creiwork($config))
    ->pushMiddleware(TrailingSlash::class)
    ->start();
