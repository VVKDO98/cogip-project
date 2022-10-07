<?php

namespace App\Model;

use App\connect\bdd;

class SignModel
{
    public function addUser($fname, $lname, $email, $password){
        $pdo = (new bdd)->connect();
        $sql = $pdo->prepare("insert into users (first_name,last_name,email,password, created_at, updated_at,role_id) 
                    values(:first_name,:last_name,:email,:password,now(),now(),2)");
        $sql->bindParam("first_name",$fname,\PDO::PARAM_STR_CHAR);
        $sql->bindParam("last_name",$lname,\PDO::PARAM_STR_CHAR);
        $sql->bindParam("email",$email,\PDO::PARAM_STR_CHAR);
        $sql->bindParam("password",$password,\PDO::PARAM_STR_CHAR);
        $sql->execute();
        $pdo = null;
        return $sql;
    }
}