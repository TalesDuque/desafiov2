<?php

require __DIR__ . '/includes/app.php';

use \App\Http\Router;

$obRouter = new Router(getenv('URL'));

include __DIR__.'/routes/pages.php';

$obRouter->run()->sendResponse();
