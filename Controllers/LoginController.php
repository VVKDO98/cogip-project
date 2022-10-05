<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\LoginModel;

class LoginController extends Controller
{
    public function index(){
        return $this->view('login');
    }
    public function login($email,$password){
        try{
            $datauser = (new LoginModel)->getCredential($email);
            if ($datauser["password"] === $password) {
                $_SESSION['user'] = ["name" => $datauser["first_name"], "last" => $datauser["last_name"], "email" => $datauser["email"], "role_id" => $datauser["role_id"]];
                header("location:/dashboard");
            }else {
                header("location:/login?error=1");
            }
        }catch (\Exception $error){
            header("location:/login?error=1");
        }
    }
}