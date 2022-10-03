<?php

namespace App\Routes;

use App\Controllers\CompaniesController;
use App\Controllers\ContactController;
use App\Controllers\errorController;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
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

$router->before("POST|GET","/dashboard/.*",function (){
    if(!isset($_SESSION["user"])){
        header("location:/login");
        exit();
    }
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

$router->get("/login",function (){
    (new LoginController)->index();
});

$router->post("/login",function(){
    $email = $_POST["email"];
    $password = $_POST["password"];
    (new LoginController)->login($email,$password);
});

$router->set404(function (){
    (new errorController)->index();
});

$router->post( '/invoice', function () {
    $ref=$_POST["ref"];
    $price=$_POST["price"];
    $company=$_POST["company"];
    (new DashboardController)->addInvoicePost($ref,$price,$company);
});

$router->post("/companies",function (){
    $name=$_POST["company"];
    $country=$_POST["country"];
    $tva=$_POST["tva"];
    (new DashboardController)->addCompanyPost($name,$country,$tva);
});


$router->run();