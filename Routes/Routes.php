<?php

namespace App\Routes;

use App\Controllers\CompaniesController;
use App\Controllers\ContactController;
use App\Controllers\errorController;
use App\Controllers\HomeController;
use App\Controllers\InvoicesController;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\SignController;
use Bramus\Router\Router;
use GUMP;
use Exception;

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

$router->before("POST|GET","/dashboard/*.*",function (){
    if(!isset($_SESSION["user"])){
        header("location:/login");
        exit();
    }
});

$router->get("/dashboard/addinvoice", function (){
    (new DashboardController)->addInvoice();
});

$router->get("/dashboard/addinvoice/(\d+)", function ($page){
    (new DashboardController)->addInvoice($page);
});

//TODO
$router->get("/dashboard/details/addinvoice/(\d+)", function ($id){
    (new DashboardController)->invoiceDetail($id);
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
$router->get("/logout", function(){
    unset($_SESSION['user']);
    header('Location:/');
    exit();
});
$router->get("/sign", function (){
    (new SignController)->index();
});

$router->post("sign",function (){
    $gump = new GUMP();
    $gump->validation_rules([
        "fname"=>"required|max_len,50|min_len,4",
        "lname"=>"required|max_len,50|min_len,4",
        "email"=>"required|valid_email",
        "password"=>"required|max_len,50|min_len,4",
        "postPassword"=>"required|max_len,50|min_len,4"
    ]);

    $gump->filter_rules([
        "fname"=>"trim|sanitize_string",
        "lname"=>"trim|sanitize_string",
        "email"=>"trim|sanitize_email",
        "password"=>"trim|sanitize_string",
        "postPassword"=>"trim|sanitize_string"
    ]);
    $valid_data = $gump->run($_POST);
    if ($gump->errors()){
        $error = "invalid entry";
        header("/sign?error=".$error);
    }
    else {

        $fname = $valid_data["fname"];
        $lname = $valid_data["lname"];
        $email = $valid_data["email"];
        $password = $valid_data["password"];
        $verifPassword = $valid_data["postPassword"];
        if($password === $verifPassword) {
            (new SignController)->sign($fname, $lname, $email, $password);
            header("location:/login");
            exit();
        }
        else{
            $errorPassword = "not same password";
            header("Location:/sign?error=".$errorPassword);
        }
    }
});

$router->post("/login",function(){
    $gump = new GUMP();
    $gump->validation_rules([
        'email' => 'required|valid_email',
        'password' => 'required|max_len,50|min_len,4'
    ]);

//    $gump->set_fields_error_messages([
//        'login'      => ['required' => 'password or Email invalid.']
//    ]);

    $valid_data = $gump->run($_POST);

    if($gump->errors()){

        $errors= 'password or Email invalid.';
        header('Location:/login?error='.$errors);
//        var_dump($errors);
        exit();
    }else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        (new LoginController)->login($email,$password);
    }
});
$router->post( '/invoice', function () {
    $gump =new GUMP();
    $gump->validation_rules([
        "ref" => "required|max_len,50|min_len,4",
        "price" => "required|float",
        "company" => "required|integer"
    ]);

    $gump->filter_rules([
        "ref" => "trim|sanitize_string",
        "price" => "trim|sanitize_floats",
        "company" => "trim|sanitize_numbers"
    ]);

    $valid_data = $gump->run($_POST);

    if ($gump->errors()){
        $error = "invalid entry";
        header("location:/dashboard/addinvoice?error=".$error);
    }
    else{
        $ref = $valid_data["ref"];
        $price = $valid_data["price"];
        $company = $valid_data["company"];
        (new DashboardController)->addInvoicePost($ref, $price, $company);
        header('location:/dashboard/addinvoice');
        exit();
    }
});

$router->post("/companies",function (){
    $gump = new GUMP();
    $gump->validation_rules([
        "name"=>"required|max_len,50|min_len,4",
        "country"=>"required|max_len,50|min_len,4",
        "tva" => "required|max_len,50|min_len,4",
        "type"=> "required|integer"
    ]);

    $gump->filter_rules([
        "name"=>"trim|sanitize_string",
        "country"=>"trim|sanitize_string",
        "tva"=>"trim|sanitize_string",
        "type"=>"trim|sanitize_numbers"
    ]);

    $valid_data = $gump->run(array_merge($_POST, $_FILES));

    if ($gump->errors()){
        $error = "invalid entry";
        header("location:/dashboard/addcompany?error=".$error);
    }
    else{
        $name = $valid_data["company"];
        $country = $valid_data["country"];
        $tva = $valid_data["tva"];
        $type = $valid_data["type"];
        (new DashboardController)->addCompanyPost($name, $country, $tva, $type);
        header("Location:/dashboard/addcompany");
        exit();
    }
});

$router->post("/contact",function (){
    $gump = new GUMP();
    $gump->validation_rules([
        "fname"=>"required|max_len,50|min_len,4",
        "lname"=>"required|max_len,50|min_len,4",
        "email"=>"required|valid_email",
        "phone"=>"required|max_len,50|min_len,4",
        "company"=>"required|integer",
        "image" => "required|required_file|extension,png;jpg;gif"
    ]);

    $gump->filter_rules([
        "fname"=>"trim|sanitize_string",
        "lname"=>"trim|sanitize_string",
        "email"=>"trim|sanitize_email",
        "phone"=>"trim|sanitize_string",
        "company"=>"trim|sanitize_numbers",
        "image" => "trim|sanitize_string"
    ]);

    $valid_data = $gump->run(array_merge($_POST, $_FILES));


    if ($gump->errors()){
        $error = "invalid entry";
        header("location:/dashboard/addcontact?error=".$error);
    }
    else{
        $name = $valid_data["fname"];
        $surname = $valid_data["lname"];
        $email = $valid_data["email"];
        $phone = $valid_data["phone"];
        $company = $valid_data["company"];
        $img = $valid_data["image"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalide data");
        }
        (new DashboardController)->addcontactPost($name, $surname, $email, $phone, $company, $img);
        header("Location:/dashboard/addcontact");
    }
});

$router->delete("/invoice", function (){
    $id=$_POST['id'];
    (new DashboardController)->deleteInvoice($id);
    header('location:/dashboard/addinvoice');
    exit();
});

$router->post("/del/invoice", function (){
    $id=$_POST['id'];
    (new DashboardController)->deleteInvoice($id);
    header('location:/dashboard/addinvoice');
    exit();
});

$router->set404(function (){
    (new errorController)->index();
});



$router->run();