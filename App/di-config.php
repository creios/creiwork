<?php

use DI\Container;
use League\Plates\Engine;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use TimTegeler\Routerunner\Routerunner;

return [

    'TimTegeler\Routerunner\Routerunner' =>

    /**
     * @param Container $c
     * @return Routerunner
     */
        function (Container $c) {
            return new Routerunner('Creios\Creiwork\Controller', $c);
        },

    'League\Plates\Engine' =>

    /**
     * @return Engine
     */
        function () {
            return new Engine('../Template');
        },

    'Monolog\Logger' =>

    /**
     * @return Logger
     */
        function () {
            $logger = new Logger('Creiwork');
            $logger->pushHandler(new StreamHandler('../test.log', Logger::INFO));
            return $logger;
        }

];