<?php

namespace App\Model;

use App\connect\bdd;

class HomeModel
{
    public function getLastInvoices($row=5){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT *  FROM invoices LEFT JOIN companies ON invoices.id_company = companies.id ORDER BY invoices.created_at DESC LIMIT :limit');
        $sql->bindParam(':limit', $row, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("datas" =>$sql->fetchAll(\PDO::FETCH_CLASS));
    }
    public function getLastCompanies($row=5){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT * FROM companies ORDER BY created_at DESC LIMIT :limit');
        $sql->bindParam(':limit', $row, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("datas" =>$sql->fetchAll(\PDO::FETCH_CLASS));
    }
    public function getLastContacts($row=5){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT * FROM contacts ORDER BY created_at DESC LIMIT :limit');
        $sql->bindParam(':limit', $row, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("datas" =>$sql->fetchAll(\PDO::FETCH_CLASS));
    }
}