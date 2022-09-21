<?php

namespace App\Model;

use App\connect\bdd;

class CompaniesModel
{
    public function getAllCompanies($page=1, $rowcount=10){

        $offset=($rowcount*$page)-$rowcount;
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare("select companies.id AS id ,companies.name AS Name, tva AS TVA, country AS Country, types.name AS Type ,companies.created_at AS `Created at` from companies LEFT JOIN types ON companies.type_id = types.id LIMIT :limit OFFSET :offset");
        $sql->bindParam(':limit', $rowcount, \PDO::PARAM_INT);
        $sql->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $sql->execute();
        $sqlrow = $pdo->prepare("SELECT COUNT(id) as Count FROM companies");
        $sqlrow->execute();
        $pdo = null;
        return array("name" => "All companies", "datas" => $sql->fetchAll(\PDO::FETCH_CLASS), "rows" => $sqlrow->fetch() );
    }

    public function getCompanieById($id){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT * FROM companies WHERE companies.id = :id');
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return $sql->fetch();
    }
}