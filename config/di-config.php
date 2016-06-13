<?php

use GuzzleHttp\Psr7\ServerRequest;
use Interop\Container\ContainerInterface;
use League\Plates;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use TimTegeler\Routerunner\Routerunner;
use function DI\factory;
use function DI\object;

return [

    Routerunner::class => function (ContainerInterface $container) {
        return new Routerunner('Creios\Creiwork\Controller', $container);
    },

    Plates\Engine::class => object()->constructor(__DIR__.'/../template'),

    LoggerInterface::class => function (\Monolog\Handler\StreamHandler $streamHandler) {
        $logger = new \Monolog\Logger('Creiwork');
        $logger->pushHandler($streamHandler);
        return $logger;
    },

    \Monolog\Handler\StreamHandler::class => object()->constructor(__DIR__.'/../log/test.log', \Monolog\Logger::DEBUG),

    ServerRequestInterface::class => factory([ServerRequest::class, 'fromGlobals']),

];
