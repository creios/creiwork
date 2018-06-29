<?php

use League\Plates;
use Quarry\Framework\Database;
use Quarry\Framework\PdoDatabase;
use function DI\autowire;
use function DI\create;

return [

    \PDO::class => function (Config $config) {
        $host = $config->get('database.host');
        $database = $config->get('database.database');
        $user = $config->get('database.user');
        $password = $config->get('database.password');

        $dsn = "mysql:dbname={$database};host={$host};charset=UTF8";
        $pdo = new \PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    },
    Database::class =>
        autowire(PdoDatabase::class),

    Plates\Engine::class =>
        create()->constructor(__DIR__ . '/../templates'),
];
