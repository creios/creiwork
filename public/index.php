<?php

use Creios\Creiwork\Framework\ResponseBuilder;
use DI\ContainerBuilder;
use TimTegeler\Routerunner\Routerunner;
use Whoops\Handler\PrettyPageHandler;
use function Creios\Creiwork\Framework\out;

date_default_timezone_set('UTC');
session_start();
ob_start();

require_once "../vendor/autoload.php";

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions('../config/di-config.php');
$container = $containerBuilder->build();

$whoops = $container->get(\Whoops\Run::class);
//Development
$whoops->pushHandler($container->get(PrettyPageHandler::class));
//Production
//$whoops->pushHandler($container->get(\Creios\Creiwork\Framework\ErrorPageHandler::class));
$whoops->register();

$routerunner = $container->get(Routerunner::class);
/** @var GuzzleHttp\Psr7\Response $response */
$response = $routerunner->execute($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

ob_end_clean();
out($response);
