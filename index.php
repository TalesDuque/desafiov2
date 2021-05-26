<?php

require __DIR__ . '/includes/app.php';

use \App\Http\Router;

$obRouter = new Router(getenv('URL'));

include __DIR__.'/routes/pages.php';
include __DIR__.'/routes/pagesProducts.php';
include __DIR__.'/routes/pagesCategories.php';

$obRouter->run()->sendResponse();
