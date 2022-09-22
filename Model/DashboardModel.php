<?php

namespace App\Model;

use App\connect\bdd;


class DashboardModel
{
    public function getAll(){

        $pdo= (new bdd)->connect();
        $company = $pdo->prepare("select  name ,country,tva from companies ");
        $company->execute();

        $contact = $pdo->prepare("select name, phone, email from contacts");
        $contact->execute();

        $invoice = $pdo->prepare("select ref,i.created_at ,companies.name from invoices i left join companies on companies.id = i.id_company");
        $invoice->execute();

        $pdo = null;
        return array("companies" => $company->fetchAll(\PDO::FETCH_CLASS),"contacts"=>$contact->fetchAll(\PDO::FETCH_CLASS),"invoices"=>$invoice->fetchAll(\PDO::FETCH_CLASS));
    }

}