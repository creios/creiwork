<?php

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemInterface;
use Quarry\Framework\PdoDatabase;

/**
 * This is routerunner's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{

    use \Quarry\Robo\Tasks;

    /**
     * @param string $action
     * @param array $options
     * @return void
     */
    public function flyway(
        $action = 'migrate',
        array $options = ['production' => false]
    ): void {
        $production = $options['production'];
        $config = $this->readConfig($production);
        $database = $config->database;
        $host = $production ? $database->host : '127.0.0.1';
        $this->taskExec(
            'flyway ' .
            "-url=jdbc:mysql://$host:$database->port/$database->name " .
            "-user=$database->user " .
            "-password=$database->password " .
            $action
        )->run();
    }

    /**
     * Extracts the database schema.
     */
    public function quarryExtract(): void
    {
        $database = $this->readConfig(false)->database;
        $this->taskQuarryExtract(
            $this->modelDirectory(),
            new PdoDatabase(
                new PDO(
                    "mysql:dbname=$database->name;host=$database->host;port=$database->port",
                    $database->user,
                    $database->password
                )
            ),
            'creiwork'
        )->run();
    }

    /**
     * Creates Models for extracted database schema.
     */
    public function quarryGenerate(): void
    {
        $this->taskQuarryGenerate(
            $this->modelDirectory(),
            'Creios\\Creiwork\\Model'
        )->run();
    }

    private function modelDirectory(): FilesystemInterface
    {
        return new Filesystem(new Local(__DIR__.'/src/Model'));
    }

    private function readConfig(bool $production): object
    {
        $filename = $production ? 'config.creiwork.json' : 'config.docker.creiwork.json';
        return json_decode(file_get_contents(__DIR__ . "/config/$filename"));
    }
}
