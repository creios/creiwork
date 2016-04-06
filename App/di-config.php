<?php

use Creios\Http\ServerRequestBuilder;
use DI\Container;
use League\Plates\Engine;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TimTegeler\Routerunner\Routerunner;

return [

    'TimTegeler\Routerunner\Routerunner' =>

    /**
     * @param Container $container
     * @return Routerunner
     */
        function (Container $container) {
            return new Routerunner('Creios\Creiwork\Controller', $container);
        },

    'League\Plates\Engine' =>

    /**
     * @return Engine
     */
        function () {
            return new Engine(__DIR__ . '/Template');
        },

    'Monolog\Logger' =>

    /**
     * @return Logger
     */
        function (Container $container) {
            $logger = new Logger('Creiwork');
            $logger->pushHandler($container->get('Monolog\Handler\StreamHandler'));
            return $logger;
        },

    'Monolog\Handler\StreamHandler' =>

    /**
     * @return StreamHandler
     */
        function () {
            return new StreamHandler(__DIR__ . '/test.log', Logger::INFO);
        },

    'Creios\Http\Message\ServerRequest' =>

    /** return ServerRequest */
        function () {
            return (new ServerRequestBuilder(getallheaders(), $_SERVER, $_COOKIE, $_GET, $_POST, $_FILES))->build();
        }

];