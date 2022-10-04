<?php

namespace App\Controllers;

use App\Core\Controller;

class errorController extends Controller
{
    public function index(){
        return $this->view('404');
    }
}