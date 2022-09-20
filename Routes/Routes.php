<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->get('/invoices/', function() {
    (new InvoicesController)->index();
});

$router->run();