<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\DashboardModel;

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
    public function addContact(){
        $data = ["page"=>"addcontact"];
        return $this->view("dashboard", $data);
    }
    public function addCompany(){
        $data = ["page" => "addcompany"];
        return $this->view("dashboard", $data);
    }

}