<?php

namespace App\Routes;

use App\Controllers\CompaniesController;
use App\Controllers\ContactController;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Controllers\DashboardController;
use Bramus\Router\Router;

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

$router->get('/contacts/(\d+)', function ($page){
    (new ContactController)->index($page);
});

$router->get('/contacts', function (){
    (new ContactController)->index();
});

$router->get('/contact/(\d+)', function ($id){
    (new ContactController)->contact($id);
});

$router->get('/companies', function() {
    (new CompaniesController)->index();
});

$router->get('/companies/(\d+)', function($page) {
    (new CompaniesController)->index($page);
});

$router->get('/company/(\d+)', function($id) {
    (new CompaniesController)->company($id);
});

$router->get('/dashboard', function(){
    (new DashboardController)->index();
});

$router->get("/dashboard/addinvoice", function (){
    (new DashboardController)->addInvoice();
});

$router->get("/dashboard/addcontact", function (){
    (new DashboardController)->addContact();
});

$router->get("/dashboard/addcompany", function (){
    (new DashboardController)->addCompany();
});



$router->post( '/invoice', function () {
    echo 'hello';
});




$router->run();