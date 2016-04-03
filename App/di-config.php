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
        },

    'League\BooBoo\Runner' =>

    /**
     * @return \League\BooBoo\Runner
     * @throws \League\BooBoo\Exception\NoFormattersRegisteredException
     */
        function (Container $c) {
            $runner = new League\BooBoo\Runner();

            /** @var League\BooBoo\Formatter\HtmlFormatter $htmlFormatter */
            $htmlFormatter = $c->get('League\BooBoo\Formatter\HtmlFormatter');
            $htmlFormatter->setErrorLimit(E_ALL);
            $runner->pushFormatter($htmlFormatter);

            /** @var Creios\Creiwork\ErrorPageFormatter $errorPageFormatter */
            $errorPageFormatter = $c->get('Creios\Creiwork\ErrorPageFormatter');
            $runner->setErrorPageFormatter($errorPageFormatter);

            $runner->register();

            return $runner;
        }

];