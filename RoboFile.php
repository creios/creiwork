<?php

/**
 * This is routerunner's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    /**
     * @param array $options
     * @return void
     */
    public function migrate(array $options = ['production' => false]): void
    {
        $config = $this->readConfig($options['production']);
        $database = $config->database;
        $this->taskExec(
            'flyway ' .
            "-url=jdbc:mysql://$database->host:$database->port/$database->database " .
            "-user=$database->user " .
            "-password=$database->password " .
            'migrate'
        )->run();
    }

    private function readConfig(bool $production): object
    {
        $filename = $production ? 'config.json' : 'config.docker.json';
        return json_decode(file_get_contents(__DIR__ . "/config/$filename"));
    }
}
