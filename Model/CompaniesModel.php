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

    public function getCompanyById($id){
        $pdo= (new bdd)->connect();
        $companies = $pdo->prepare(
    'SELECT 
                companies.id AS id,
                companies.name AS Name,
                companies.tva as TVA,
                companies.country AS Country
            FROM 
                companies
            WHERE
                companies.id = :id'
        );
        $companies->bindParam(':id', $id, \PDO::PARAM_INT);
        $companies->execute();

        $contacts = $pdo->prepare(
    'SELECT
                c.id as id,
                c.name as Name,
                c.phone as Phone
            FROM contacts c
            WHERE company_id = :id'
        );
        $contacts->bindParam(':id', $id, \PDO::PARAM_INT);
        $contacts->execute();

        $invoices= $pdo->prepare(
            'SELECT
                i.id as id,
                i.ref as `Invoice number`,
                i.due_dates as Dates,
                c.name as Company,
                i.created_at as `Created at`
            FROM invoices i
            LEFT JOIN companies c on c.id = i.id_company
            WHERE i.id_company = :id
            '
        );
        $invoices->bindParam(':id', $id, \PDO::PARAM_INT);
        $invoices->execute();

        $pdo=null; //close the connection before return
        return array( "companies" => $companies->fetchAll(\PDO::FETCH_CLASS), "contacts" => $contacts->fetchAll(\PDO::FETCH_CLASS), "invoices" => $invoices->fetchAll(\PDO::FETCH_CLASS) );
    }
    public function postCompany($name,$country,$tva,$type){
        $pdo = (new bdd)->connect();
        $sql = $pdo->prepare("insert into companies(name, country,tva,type_id,created_at,updated_at)
                values(:name, :country, :tva,:type, now(),now())");
        $sql->bindParam(":name", $name, \PDO::PARAM_STR_CHAR);
        $sql->bindParam(":country",$country, \PDO::PARAM_STR_CHAR);
        $sql->bindParam(":tva", $tva, \PDO::PARAM_STR_CHAR);
        $sql->bindParam("type",$type,\PDO::PARAM_INT);
        $sql->execute();
        $pdo = null;
        return $sql;
    }
    public function getType(){
        $pdo = (new bdd)->connect();
        $sql = $pdo->prepare("select id,name from types");
        $sql->execute();
        $pdo = null;
        return $sql->fetchAll(\PDO::FETCH_CLASS);
    }
}