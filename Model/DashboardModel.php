<?php

namespace App\Model;

use App\connect\bdd;


class DashboardModel
{
    public function getAll(): array
    {

        $pdo= (new bdd)->connect();
        $company = $pdo->prepare("select id,  name as Name ,country as Country,tva as TVA from companies ORDER BY created_at DESC LIMIT 5");
        $company->execute();

        $contact = $pdo->prepare("select id, name as Name, phone as Phone, email as Mail from contacts ORDER BY created_at DESC LIMIT 5");
        $contact->execute();

        $invoice = $pdo->prepare("select i.id, ref as Ref,i.created_at as `Created At` ,companies.name as Company from invoices i left join companies on companies.id = i.id_company ORDER BY i.created_at DESC LIMIT 5");
        $invoice->execute();

        $pdo = null;
        return array("companies" => ["datas" => $company->fetchAll(\PDO::FETCH_CLASS)],"contacts"=>["datas" =>$contact->fetchAll(\PDO::FETCH_CLASS)],"invoices"=>["datas" =>$invoice->fetchAll(\PDO::FETCH_CLASS)]);
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