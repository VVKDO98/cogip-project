<?php

namespace App\Model;

use App\connect\bdd;

class LoginModel
{
    public function getCredential($email){
        $pdo= (new bdd)->connect();
        $dataUser = $pdo->prepare("select first_name,last_name,email,password,id,role_id from users u where u.email = ?");
        $dataUser->execute([$email]);
        $pdo =null;
        return $dataUser->fetchAll();
    }

    public function checkEmail(){
        $pdo = (new bdd)->connect();
        $dataCheck = $pdo->prepare("select email from users");
        $dataCheck->execute();
        $pdo = null;
        return $dataCheck->fetchAll();
    }
}