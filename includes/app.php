<?php

require __DIR__."/../vendor/autoload.php";

use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;
use \WilliamCosta\DatabaseManager\Database;

Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT')
);

Environment::load(__DIR__.'/../');

View::init([
    'URL' => getenv('URL')
]);
