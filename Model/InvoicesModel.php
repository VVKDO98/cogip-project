<?php

namespace App\Model;

use App\connect\bdd;

class InvoicesModel
{
    public function getAllInvoices($page=1, $rowcount=10){
        $offset=($rowcount*$page)-$rowcount;
        $pdo= (new bdd)->connect();
        $pageSelector = $page!=0? "LIMIT :limit OFFSET :offset":"";
        $sql = $pdo->prepare('SELECT invoices.id AS id ,ref AS `Invoice Number`  , due_dates AS `Due dates`, companies.name AS Company, invoices.created_at as `Created at` FROM invoices LEFT JOIN companies ON invoices.id_company = companies.id '.$pageSelector);
        if($page!=0){
            $sql->bindParam(':limit', $rowcount, \PDO::PARAM_INT);
            $sql->bindParam(':offset', $offset, \PDO::PARAM_INT);
        }
        $sql->execute();
        $sqlrow = $pdo->prepare("SELECT COUNT(id) as Count FROM invoices");
        $sqlrow->execute();
        $pdo=null; //close the connection before return
        return array("name" => "All invoices", "datas" => $sql->fetchAll(\PDO::FETCH_CLASS), "rows" => $sqlrow->fetch(), "page"=>$page);
    }
    public function getInvoiceById($id){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare(
            'SELECT 
            i.id AS id,
            i.id_company AS id_company, 
            i.ref AS Ref,
            i.due_dates AS `Due dates`,
            i.created_at AS `Created at`,
            i.price AS price,
            c.name AS Company
            FROM invoices i 
            LEFT JOIN companies c
            ON i.id_company = c.id
            WHERE i.id = :id');
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return $sql->fetchAll(\PDO::FETCH_CLASS);
    }
    public function postInvoice($ref, $price, $company){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare(
            'INSERT INTO invoices (ref, price, id_company, created_at, updated_at, due_dates)
            VALUES (:ref, :price, :id_company, NOW(), NOW(), NOW())
        ');
        $sql->bindParam(':ref', $ref, \PDO::PARAM_STR_CHAR);
        $sql->bindParam(':price', $price, \PDO::PARAM_INT);
        $sql->bindParam(':id_company', $company, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null;
        return $sql;
    }

    public function deleteInvoice($id){
        $pdo= (new bdd)->connect();
        $sql= $pdo->prepare('
            DELETE FROM invoices WHERE id=:id
        ');
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null;
        return $sql;
    }
}