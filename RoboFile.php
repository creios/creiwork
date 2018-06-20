<?php

/**
 * This is routerunner's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{

    public $flyway = '--rm --net host -v %s:/migrations creios/flyway -url=jdbc:mysql://%s:%s/%s -user=%s -password=%s %s';
    /**
     * Displays info about database
     * @param array $opts
     */
    function flywayInfo($opts = ['host' => 'localhost',
        'port' => '3306',
        'database' => 'creiwork',
        'user' => 'creiwork',
        'password' => 'creiwork'])

    {
        $this->taskDockerRun(sprintf($this->flyway,
            __DIR__,
            $opts['host'],
            $opts['port'],
            $opts['database'],
            $opts['user'],
            $opts['password'],
            'info'))->run();
    }

    /**
     * Migrates database
     * @param array $opts
     */
    function flywayMigrate($opts = ['host' => 'localhost',
        'port' => '3306',
        'database' => 'creiwork',
        'user' => 'creiwork',
        'password' => 'creiwork'])
    {
        $this->taskDockerRun(sprintf($this->flyway,
            __DIR__,
            $opts['host'],
            $opts['port'],
            $opts['database'],
            $opts['user'],
            $opts['password'],
            'migrate'))->run();
    }

    /**
     * Cleans database for a fresh start
     * @param array $opts
     */
    function flywayClean($opts = ['host' => 'localhost',
        'port' => '3306',
        'database' => 'creiwork',
        'user' => 'creiwork',
        'password' => 'creiwork'])
    {
        $this->taskDockerRun(sprintf($this->flyway,
            __DIR__,
            $opts['host'],
            $opts['port'],
            $opts['database'],
            $opts['user'],
            $opts['password'],
            'clean'))->run();
    }
}
