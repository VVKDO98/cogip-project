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
    if ($gump->errors()){
        $error = "invalid entry";
        header("location:/dashboard/addinvoice?error=".$error);
    }
    else{
        $ref = $_POST["ref"];
        $price = $_POST["price"];
        $company = $_POST["company"];
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
    if ($gump->errors()){
        $error = "invalid entry";
        header("location:/dashboard/addcompany?error=".$error);
    }
    else{
        $name = $_POST["company"];
        $country = $_POST["country"];
        $tva = $_POST["tva"];
        $type = $_POST["type"];
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
    if ($gump->errors()){
        $error = "invalid entry";
        header("location:/dashboard/addcontact?error=".$error);
    }
    else{
        $name = $_POST["fname"];
        $surname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $company = $_POST["company"];
        $img = $_FILES["image"];
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

    $name = $_POST["fname"];
    $surname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $company = $_POST["company"];
    $img = $_FILES["image"];
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
       throw new Exception("Invalide data");
    }
    (new DashboardController)->addcontactPost($name,$surname,$email,$phone,$company,$img);
    header("Location:/dashboard/addcontact");
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