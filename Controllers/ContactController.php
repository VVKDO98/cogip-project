<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\ContactsModel;

class ContactController extends Controller
{
    public function contact($id=1){
        $contacts = (new ContactsModel)->getAllContacts($id);
        return $this->view('table',$contacts);
    }
}