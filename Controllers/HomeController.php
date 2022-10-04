<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\HomeModel;

class HomeController extends Controller
{
    /*
    * return view
    */
    public function index()
    {
        $homemodel = new HomeModel();
        $invoices = $homemodel->getLastInvoices();
        $companies = $homemodel->getLastCompanies();
        $contacts = $homemodel->getLastContacts();
        $data = ["invoices" => $invoices, "companies" => $companies, "contacts" =>$contacts];
        return $this->view('home',$data);
    }
}