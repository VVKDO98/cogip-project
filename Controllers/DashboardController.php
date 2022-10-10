<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\DashboardModel;
use App\Model\HomeModel;


class DashboardController extends Controller
{
    public function index(){

        $dashboard = new DashboardModel();
        $dashboardData = $dashboard->getAll();

//        $homemodel = new HomeModel();
//        $invoices = $homemodel->getLastInvoices();
//        $companies = $homemodel->getLastCompanies();
//        $contacts = $homemodel->getLastContacts();
        $alltTable = $dashboard->countTable();
//
//        $data = ["invoices" => $invoices, "companies" => $companies, "contacts" =>$contacts, "count"=>$alltTable];
        $data = [$dashboardData, "count"=>$alltTable];

        return $this->view('dashboard', $data);
    }
}