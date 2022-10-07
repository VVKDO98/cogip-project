<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\CompaniesModel;
use App\Model\ContactsModel;
use App\Model\DashboardModel;
use App\Model\HomeModel;
use App\Model\InvoicesModel;


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
    public function addInvoice($page=1){
        $companies= (new CompaniesModel)->getAllCompanies(0);
        $invoices= (new InvoicesModel)->getAllInvoices($page);
        $data = ["page"=>"addinvoice", "companies" => $companies, "invoices" => $invoices];
        return $this->view("dashboard", $data);
    }
    public function addInvoicePost($ref, $price, $company){
        $post = (new InvoicesModel)->postInvoice($ref,$price,$company);
    }
    public function addContact($page=1){
        $companies= (new CompaniesModel)->getAllCompanies(0);
        $contacts = (new ContactsModel)->getAllContacts($page);
        $data = ["page"=>"addcontact","companies" => $companies, "contacts" => $contacts];
        return $this->view("dashboard", $data);
    }
    public function addCompany($page=1){
        $type =(new CompaniesModel)->getType();
        $companies= (new CompaniesModel)->getAllCompanies($page);
        $data = ["page" => "addcompany","types" => $type , "companies" => $companies,];
        return $this->view("dashboard", $data);
    }
    public function addCompanyPost($name,$country,$tva,$type){
        $post = (new CompaniesModel)->postCompany($name,$country,$tva,$type);
    }
    public function addcontactPost($name, $surname, $email, $phone, $company, $img){
        $post = (new ContactsModel())->postContact($name,$surname,$email,$phone,$company,$img);
    }
    public function deleteInvoice($id){
        return (new InvoicesModel)->deleteInvoice($id);
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