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
    public function companie($id){
        $contact = (new CompaniesModel)->getCompanieById($id);
        return $this->view('detail', $contact);
    }
}