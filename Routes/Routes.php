<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->get('/invoices', function() {
    (new InvoicesController)->index();
});

$router->get('/invoices/(\d+)', function($page) {
    (new InvoicesController)->index($page);
});

$router->get('/invoice/(\d+)', function($id) {
    (new InvoicesController)->invoice($id);
});



$router->post( '/invoice', function () {
    echo 'hello';
});



$router->run();