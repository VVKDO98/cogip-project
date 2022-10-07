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
}