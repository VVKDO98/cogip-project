<?php

namespace App\Model;

use App\connect\bdd;

class InvoicesModel
{
    public function getAllInvoices($page=1, $rowcount=10){
        $offset=($rowcount*$page)-$rowcount;
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT ref AS `Invoice Number`, due_dates AS `Due dates`, companies.name AS Company, invoices.created_at as `Created at` FROM invoices LEFT JOIN companies ON invoices.id_company = companies.id LIMIT :limit OFFSET :offset');
        $sql->bindParam(':limit', $rowcount, \PDO::PARAM_INT);
        $sql->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("name" => "All invoices", "invoices" => $sql->fetchAll(\PDO::FETCH_CLASS));
    }
    public function getInvoiceById($id){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT * FROM invoices LEFT JOIN companies ON invoices.id_company WHERE invoices.id = :id');
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return $sql->fetch();
    }
}