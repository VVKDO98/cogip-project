<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\CompaniesModel;
use App\Model\ContactsModel;

class DashboardContactsController extends Controller
{
    public function addContact($page=1){
        $companies= (new CompaniesModel)->getAllCompanies(0);
        $contacts = (new ContactsModel)->getAllContacts($page);
        $data = ["page"=>"addcontact","companies" => $companies, "contacts" => $contacts];
        return $this->view("dashboard", $data);
    }

    public function addcontactPost($name, $surname, $email, $phone, $company, $img){
        $post = (new ContactsModel())->postContact($name,$surname,$email,$phone,$company,$img);
    }

    public function contactDetail($id)
    {
        $invoice = (new ContactsModel)->getContactById($id);
        $company = (new CompaniesModel)->getAllCompanies(0);
        $data = ["page" => "pagecontact","contacts" => $invoice, "companies"=>$company];
        return $this->view("dashboard", $data);
    }

    public function updateContact( $id,  $name,  $email,  $company,  $phone)
    {
        (new ContactsModel)->update($id, $name, $email, $company, $phone);
    }
}