<?php

namespace App\Model;

use App\connect\bdd;

class ContactsModel
{
    public function getAllContacts($id=1){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare("select name,email,phone from contacts");
        //$sql-> bindParam(':id',$id,\PDO::PARAM_INT);
        $sql->execute();
        $pdo = null;
        return array("name" => "All contacts", "invoices" => $sql->fetchAll(\PDO::FETCH_CLASS));
    }
}