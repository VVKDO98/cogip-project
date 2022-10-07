<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\SignModel;
class SignController extends Controller
{
    public function index(){
        return $this->view("sign");
    }
    public function sign($fname, $lname, $email, $password){
        (new SignModel)->addUser($fname, $lname, $email, $password);
    }
}