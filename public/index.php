<?php

use DI\ContainerBuilder;
use TimTegeler\Routerunner\Routerunner;

date_default_timezone_set('UTC');
session_start();
ob_start();

require_once "../vendor/autoload.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions('../config/di-config.php');
$container = $containerBuilder->build();

/** @var \Whoops\Run $whoops */
$whoops = $container->get('\Whoops\Run');
//Development
$whoops->pushHandler($container->get('\Whoops\Handler\PrettyPageHandler'));
//Production
//$whoops->pushHandler($container->get('\Creios\Creiwork\Framework\ErrorPageHandler'));
$whoops->register();

/** @var Routerunner $routerunner */
$routerunner = $container->get('TimTegeler\Routerunner\Routerunner');
$routerunner->parse("../config/routes");
$routerunner->setPostProcessor($container->get('Creios\Creiwork\Framework\ResponseBuilder'));
/** @var GuzzleHttp\Psr7\Response $response */
$response = $routerunner->execute($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

ob_end_clean();
out($response);
