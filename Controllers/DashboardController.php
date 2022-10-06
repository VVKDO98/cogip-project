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
    public function addContact(){
        $companies= (new CompaniesModel)->getAllCompanies(0);
        $data = ["page"=>"addcontact",$companies];
        return $this->view("dashboard", $data);
    }
    public function addCompany(){
        $type =(new CompaniesModel)->getType();
        $data = ["page" => "addcompany",$type];
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
        $data = ["page" => "addcompany",$invoice];
        return $this->view("dashboard", $data);
    }
}