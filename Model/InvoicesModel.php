<?php

namespace App\Model;

use App\connect\bdd;

class InvoicesModel
{
    public function getAllInvoices($page=1, $rowcount=10){
        $offset = ($rowcount*$page)-$rowcount;
        $pdo = (new bdd)->connect();
        $sql =$pdo->prepare("select * from invoices left join companies on invoices.id_company = companies.id limit $rowcount offset $offset");
        $sql->execute();
        $pdo = null ;
        return $sql->fetchAll();
    }
    public function getLastInvoices(){

    }
    public function getInvoiceById($id){

    }
}