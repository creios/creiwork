<?php

use DI\ContainerBuilder;
use TimTegeler\Routerunner\Routerunner;

date_default_timezone_set('UTC');
session_start();
ob_start();

require_once "../vendor/autoload.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions('../di-config.php');
$container = $containerBuilder->build();

/** @var \Whoops\Run $whoops */
$whoops = $container->get('\Whoops\Run');
//Development
$whoops->pushHandler($container->get('\Whoops\Handler\PrettyPageHandler'));
//Production
//$whoops->pushHandler($container->get('\Creios\Creiwork\Util\ErrorPageHandler'));
$whoops->register();

/** @var Routerunner $routerunner */
$routerunner = $container->get('TimTegeler\Routerunner\Routerunner');
$routerunner->parse("../routes");
$routerunner->setPostProcessor($container->get('Creios\Creiwork\Util\ResponseBuilder'));
/** @var GuzzleHttp\Psr7\Response $response */
$response = $routerunner->execute($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

ob_end_clean();
out($response);
