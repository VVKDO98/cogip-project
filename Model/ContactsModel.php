<?php

namespace App\Model;

use App\connect\bdd;
use Exception;

class ContactsModel
{
    public function getAllContacts($page=1, $rowcount=10){

        $offset=($rowcount*$page)-$rowcount;
        $pdo= (new bdd)->connect();
        $pageSelector = $page!=0? "LIMIT :limit OFFSET :offset":"";
        $sql = $pdo->prepare("select contacts.id AS id ,contacts.name AS Name,email AS Email,phone AS Phone, companies.name AS Company ,contacts.created_at AS `Created at` from contacts  LEFT JOIN companies ON contacts.company_id = companies.id ".$pageSelector);
        if($page !=0 ){
            $sql->bindParam(':limit', $rowcount, \PDO::PARAM_INT);
            $sql->bindParam(':offset', $offset, \PDO::PARAM_INT);
        }
        $sql->execute();
        $sqlrow = $pdo->prepare("SELECT COUNT(id) as Count FROM contacts");
        $sqlrow->execute();
        $pdo = null;
        return array("name" => "All contacts", "datas" => $sql->fetchAll(\PDO::FETCH_CLASS), "rows" => $sqlrow->fetch());
    }

    public function getContactById($id){
        $pdo= (new bdd)->connect();
        $sql = $pdo->prepare('SELECT c.name as Contact, co.name as Company, c.phone as Phone, c.email as Email FROM contacts c LEFT JOIN companies co ON c.company_id = co.id WHERE c.id = :id');
        $sql->bindParam(':id', $id, \PDO::PARAM_INT);
        $sql->execute();
        $pdo=null; //close the connection before return
        return $sql->fetchAll(\PDO::FETCH_CLASS);
    }
    public function postContact($name, $surname, $email, $phone, $company, $img){
        $fullName = $name." ".$surname;
        $this->newFile($img);
        $nameImg = $img["name"];
        $pdo = (new bdd)->connect();
        $sql = $pdo->prepare("insert into contacts (name,email,phone,company_id,avatar,created_at,updated_at)
                values(:name,:email,:phone,:company,:avatar,now(),now())");
        $sql->bindParam("name", $fullName,\PDO::PARAM_STR_CHAR);
        $sql->bindParam("email", $email,\PDO::PARAM_STR_CHAR);
        $sql->bindParam("phone", $phone,\PDO::PARAM_STR_CHAR);
        $sql->bindParam("company", $company,\PDO::PARAM_INT);
        $sql->bindParam("avatar",$nameImg,\PDO::PARAM_STR_CHAR);
        $sql->execute();
        $pdo = null;
        return $sql;
    }


    function newFile($file){
        $this->upload($file);
    }
    /**
     * @throws Exception
     */
    function upload($image){
        if(!$this->isImage($image["tmp_name"])){
           throw new Exception("error tmp name");
        }
        if(!in_array(mime_content_type($image["tmp_name"]), ["image/jpeg", "image/gif", "image/png"])){
            throw new Exception("image please");
        }
        $pathImg = $this->path($image["name"]);
        if(!move_uploaded_file($image["tmp_name"],$pathImg)){
            throw new Exception("path error");
        }

    }

    function isImage(string $image) :bool {
        return @is_array(getimagesize($image));
    }

    function path($imageName){
        $path = "./assets/img/" . $imageName ;
        return $path;
    }
}
