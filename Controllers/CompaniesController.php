<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\CompaniesModel;

class CompaniesController extends Controller
{
    public function index($page=1){
        $contacts = (new CompaniesModel)->getAllCompanies($page);
        return $this->view('table',$contacts);
    }
    public function company($id){
        $contact = (new CompaniesModel)->getCompanyById($id);
        return $this->view('detail', $contact);
    }
}