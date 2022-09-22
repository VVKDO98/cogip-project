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
        $data = ["page"=>"invoice"];
        return $this->view("formadd", $data);
    }
    public function addContact(){
        $data = ["page"=>"contact"];
        return $this->view("formadd", $data);
    }
    public function addCompany(){
        $data = ["page" => "company"];
        return $this->view("formadd", $data);
    }
}