<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\ContactsModel;

class ContactController extends Controller
{
    public function index($page=1){
        $contacts = (new ContactsModel)->getAllContacts($page);
        return $this->view('table',$contacts);
    }
    public function contact($id){
        $contact = (new ContactsModel())->getContactById($id);
        return $this->view('details', $contact);
    }
}