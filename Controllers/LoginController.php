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
        $datauser = (new LoginModel)->getCredential($email);
//        echo $datauser[0]["password"] === $password?"true":"false";

        if($datauser[0]["password"] === $password){
            $_SESSION['user'] = ["name"=>$datauser[0]["first_name"],"last"=>$datauser[0]["last_name"],"email"=>$datauser[0]["email"],"role_id"=>$datauser[0]["role_id"]];
        header("location:/dashboard");

        }else{
            header("location:/login?error=1");
        }

    }
}