<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\DashboardModel;
use App\Model\HomeModel;


class DashboardController extends Controller
{
    public function index(){
        $homemodel = new HomeModel();
        $invoices = $homemodel->getLastInvoices();
        $companies = $homemodel->getLastCompanies();
        $contacts = $homemodel->getLastContacts();
        $alltTable = $homemodel->countTable();

        $data = ["invoices" => $invoices, "companies" => $companies, "contacts" =>$contacts, "count"=>$alltTable];
       // $dashboard = (new DashboardModel)->getAll();
        return $this->view('dashboard', $data);
    }


    public function invoiceDetail($id)
    {
        $invoice = (new InvoicesModel)->getInvoiceById($id);
        $company = (new CompaniesModel)->getAllCompanies(0);
        $data = ["page" => "pageinvoice","invoice" => $invoice, "companies"=>$company];
        return $this->view("dashboard", $data);
    }

    public function companyDetail($id)
    {
        $comp = new CompaniesModel();
        $company= $comp->getCompanyById($id);
        $types = $comp->getType();
        $data = ["page" => "pagecompany","types" => $types, "company"=>$company];
        return $this->view("dashboard", $data);
    }
}