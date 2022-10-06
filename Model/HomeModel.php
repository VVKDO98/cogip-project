<?php

namespace App\Model;

use App\connect\bdd;

class HomeModel
{
    public function getLastInvoices($row=5){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT invoices.id, ref as "Invoice number", due_dates as "Dates due", companies.name as Company, invoices.created_at as "created at" FROM invoices LEFT JOIN companies ON invoices.id_company = companies.id ORDER BY invoices.created_at DESC LIMIT :limit');
        $sql->bindParam(':limit', $row, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("datas" =>$sql->fetchAll(\PDO::FETCH_CLASS));
    }
    public function getLastCompanies($row=5){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT companies.id, companies.name as Name, tva as TVA, country as Country, types.name as Type, companies.created_at as "Created at" FROM companies  left join types on companies.type_id = types.id ORDER BY companies.created_at DESC LIMIT :limit');
        $sql->bindParam(':limit', $row, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("datas" =>$sql->fetchAll(\PDO::FETCH_CLASS));
    }
    public function getLastContacts($row=5){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT contacts.id, contacts.name as Name, phone as Phone, email as Email, companies.name as Company, contacts.created_at as "Created ad" FROM contacts left join companies on companies.id = contacts.company_id ORDER BY contacts.created_at DESC LIMIT :limit');
        $sql->bindParam(':limit', $row, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return array("datas" =>$sql->fetchAll(\PDO::FETCH_CLASS));
    }
    public function countTable(){
        $pdo = (new bdd)->connect();

        $invoice = $pdo->prepare("select count(id) as 'row' from invoices");
        $invoice->execute();
        $resultInvoices = $invoice->fetch();

        $company= $pdo->prepare("select count(id) as 'row' from companies");
        $company->execute();
        $resultCompanies = $company->fetch();

        $contact =$pdo->prepare("select count(id) as 'row' from contacts");
        $contact->execute();
        $resultContact = $contact->fetch();

        $pdo = null;

        $allTable = ["invoices"=>$resultInvoices,"companies" => $resultCompanies, "contacts"=> $resultContact ];

        return $allTable;
    }
}