<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\CompaniesModel;
use App\Model\InvoicesModel;

class DashboardInvoicesController extends Controller
{
    public function addInvoice($page=1){
        $companies= (new CompaniesModel)->getAllCompanies(0);
        $invoices= (new InvoicesModel)->getAllInvoices($page);
        $data = ["page"=>"addinvoice", "companies" => $companies, "invoices" => $invoices];
        return $this->view("dashboard", $data);
    }
    public function addInvoicePost($ref, $price, $company){
        $post = (new InvoicesModel)->postInvoice($ref,$price,$company);
    }
    public function deleteInvoice($id){
        return (new InvoicesModel)->deleteInvoice($id);
    }

    public function invoiceDetail($id)
    {
        $invoice = (new InvoicesModel)->getInvoiceById($id);
        $company = (new CompaniesModel)->getAllCompanies(0);
        $data = ["page" => "pageinvoice","invoice" => $invoice, "companies"=>$company];
        return $this->view("dashboard", $data);
    }
}