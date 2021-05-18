<?php

require __DIR__."/vendor/autoload.php";

use \App\Controller\Pages\Dashboard;
use \App\Http\Router;
use \App\Http\Response;

define('URL', 'http://localhost/desafiov2');

$obRouter = new Router(URL);

// Rota do Dashboard
$obRouter->get('/', [
    function(){
        return new Response(200, Dashboard::getDashboard());
    }
]);

$obRouter->run()->sendResponse();
