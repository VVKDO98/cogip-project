<?php

namespace App\Model;

use App\connect\bdd;

class InvoicesModel
{
    public function getAllInvoices(){
        $pdo= (new bdd)->connect();
    }
    public function getLastInvoices(){

    }
    public function getInvoiceById($id){

    }
}