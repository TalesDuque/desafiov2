<?php

use \App\Controller\Pages;
use \App\Http\Response;

// Rota do Dashboard
$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Dashboard::getDashboard());
    }
]);
