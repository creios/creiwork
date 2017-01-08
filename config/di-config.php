<?php

use Aura\Session\SegmentInterface;
use Aura\Session\Session;
use Aura\Session\SessionFactory;
use Creios\Creiwork\Framework\ResponseBuilder;
use GuzzleHttp\Psr7\ServerRequest;
use Interop\Container\ContainerInterface;
use League\Plates;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Noodlehaus\Config;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use TimTegeler\Routerunner\Routerunner;
use function DI\factory;
use function DI\object;

return [

    Routerunner::class => function (ContainerInterface $container) {
        $routerunner = new Routerunner(__DIR__ . '/../config/routerunner-config.yml', $container);
        $routerunner->setPostProcessor($container->get(ResponseBuilder::class));
        return $routerunner;
    },

    Plates\Engine::class => object()->constructor(__DIR__ . '/../template'),

    LoggerInterface::class => function (StreamHandler $streamHandler) {
        $logger = new Logger('Creiwork');
        $logger->pushHandler($streamHandler);
        return $logger;
    },

    StreamHandler::class => object()->constructor(__DIR__ . '/../log/test.log', Logger::INFO),

    ServerRequestInterface::class => factory([ServerRequest::class, 'fromGlobals']),

    SessionFactory::class => object()->constructor(),

    Session::class => function (SessionFactory $sessionFactory) {
        return $sessionFactory->newInstance($_COOKIE);
    },

    SegmentInterface::class => function (Session $session) {
        return $session->getSegment('Creios\Creiwork');
    },

    Config::class => object()->constructor(__DIR__ . '/config.json')
];
