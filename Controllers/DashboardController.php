<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Model\DashboardModel;

class DashboardController extends Controller
{
    public function index(){
        $dashboard = (new DashboardModel)->getAll();
        return $this->view('dashboard', $dashboard);
    }
}