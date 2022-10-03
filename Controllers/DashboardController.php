<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\CompaniesModel;
use App\Model\DashboardModel;
use App\Model\InvoicesModel;

class DashboardController extends Controller
{
    public function index(){
        $dashboard = (new DashboardModel)->getAll();
        return $this->view('dashboard', $dashboard);
    }
    public function addInvoice(){
        $companies= (new CompaniesModel)->getAllCompanies();
        $data = ["page"=>"addinvoice", $companies];
        return $this->view("dashboard", $data);
    }
    public function addInvoicePost($ref, $price, $company){
        $post = (new InvoicesModel)->postInvoice($ref,$price,$company);
    }

    public function addContact(){
        $data = ["page"=>"addcontact"];
        return $this->view("dashboard", $data);
    }
    public function addCompany(){
        $data = ["page" => "addcompany"];
        return $this->view("dashboard", $data);
    }
    public function addCompanyPost($name,$country,$tva){
        $data = ["page" => "addcompany"];
        $post = (new CompaniesModel)->postCompany($name,$country,$tva);
        return $this->view("dashboard", $data);
    }

}