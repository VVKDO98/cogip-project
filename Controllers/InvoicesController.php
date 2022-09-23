<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\InvoicesModel;

class InvoicesController extends Controller
{
    /*
    * return view
    */
    public function index($page=1)
    {
        $invoices = (new InvoicesModel)->getAllInvoices($page);
        return $this->view('table',$invoices);
    }
    public function invoice($id){
        $invoice = (new InvoicesModel)->getInvoiceById($id);
        return $this->view('details', $invoice);
    }
}