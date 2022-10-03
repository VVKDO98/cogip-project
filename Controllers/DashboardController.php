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
        $data = ["page"=>"addinvoice"];
        return $this->view("dashboard", $data);
    }
    public function addInvoicePost($ref, $price, $company){
        $companies= (new CompaniesModel)->getAllCompanies();
        $data = ["page"=>"addinvoice", "datas" => $companies];
        $post = (new InvoicesModel)->postInvoice($ref,$price,$company);
        return $this->view("dashboard", $data);
    }
    public function addContact(){
        $data = ["page"=>"addcontact"];
        return $this->view("dashboard", $data);
    }
    public function addCompany(){
        $data = ["page" => "addcompany"];
        return $this->view("dashboard", $data);
    }

}