<?php

use Creios\Creiwork\Framework\Creiwork;

// let composer load everything
require_once "../vendor/autoload.php";

// set path to config file
$config = __DIR__ . '/../config/config.json';

// create a new Creiwork instance and start execution
(new Creiwork($config))->start();
