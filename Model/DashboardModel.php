<?php

namespace App\Model;

use App\connect\bdd;


class DashboardModel
{
    public function getAll(){

        $pdo= (new bdd)->connect();
        $company = $pdo->prepare("select  name ,country,tvafrom companies from companies ");
        $company->execute();

        $contact = $pdo->prepare("select name, phone, email from contracts");
        $contact->execute();

        $invoice = $pdo->prepare("select ref,create_at ,companies.name from invoices left join companies on companies.id = invoices.id_company");
        $invoice->execute();

        $pdo = null;
        return array("companies" => $company->fetchAll(\PDO::FETCH_CLASS),"constacts"=>$contact->fetchAll(\PDO::FETCH_CLASS),"invoives"=>$invoice->fetchAll(\PDO::FETCH_CLASS));
    }

}