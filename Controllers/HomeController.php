<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    /*
    * return view
    */
    public function index()
    {
        return $this->view('pages/home',["name" => "Cogip"]);
    }
}