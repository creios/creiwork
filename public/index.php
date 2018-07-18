<?php

use Creios\Creiwork\Framework\Creiwork;
use Middlewares\TrailingSlash;

// Uncomment this to use profiling via xhgui
// xhgui should be preconfigured in context of docker

// if (file_exists('/xhgui-service/external/header.php')) {
//     require_once '/xhgui-service/external/header.php';
// }

// let composer load everything
require_once "../vendor/autoload.php";

// set path to config file
$config = __DIR__ . '/../config';

// create a new Creiwork instance and start execution
(new Creiwork($config))
    ->pushMiddleware(TrailingSlash::class)
    ->addDefinitions($config.'/di-definitions.php')
    ->start();
