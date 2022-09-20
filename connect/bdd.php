<?php

namespace App\connect;

class bdd
{

    function __construct(){
        $this->host ="localhost";
        $this->bddname = "cogip";
        $this->user = "melonde";
        $this->password = "Dev-1234";
    }

    public function connect(){
       $bdd = new \PDO("mysql:host=$this->host;dbname=$this->bddname",$this->user, $this->password );
        return $bdd;
    }
}