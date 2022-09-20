<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\InvoicesModel;

class InvoicesController extends Controller
{
    /*
    * return view
    */
    public function index()
    {
        $invoices = (new InvoicesModel)->getAllInvoices();
        $data = Array(
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020'),
            Array('F20220915-001', '01/01/2022', 'John Doe', '25/09/2020')
        );
        return $this->view('table',$data);
    }
}