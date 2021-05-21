<?php

require __DIR__."/vendor/autoload.php";

use \App\Http\Router;
use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;

Environment::load(__DIR__);

View::init([
    'URL' => getenv('URL')
]);

$obRouter = new Router(getenv('URL'));

include __DIR__.'/routes/pages.php';

$obRouter->run()->sendResponse();
