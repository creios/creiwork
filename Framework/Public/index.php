<?php

use DI\ContainerBuilder;
use TimTegeler\Routerunner\Routerunner;

date_default_timezone_set('UTC');

session_start();

require_once "../vendor/autoload.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions('../di-config.php');
$container = $containerBuilder->build();

/** @var Routerunner $routerunner */
$routerunner = $container->get('TimTegeler\Routerunner\Routerunner');
$routerunner->parse("../routes");
echo $routerunner->execute($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);