<?php

namespace App\connect;

class bdd
{

    function __construct(){
        $this->host ="localhost";
        $this->bddname = "cogip";
        $this->user = "root";
        $this->password = "";
    }

    public function connect(){
       $bdd = new \PDO("mysql:host=$this->host;dbname=$this->bddname",$this->user, $this->password );
        return $bdd;
    }
}