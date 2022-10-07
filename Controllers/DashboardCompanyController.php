<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\CompaniesModel;

class DashboardCompanyController extends Controller
{
    public function addCompany($page=1){
        $type =(new CompaniesModel)->getType();
        $companies= (new CompaniesModel)->getAllCompanies($page);
        $data = ["page" => "addcompany","types" => $type , "companies" => $companies,];
        return $this->view("dashboard", $data);
    }
    public function addCompanyPost($name,$country,$tva,$type){
        $post = (new CompaniesModel)->postCompany($name,$country,$tva,$type);
    }
}