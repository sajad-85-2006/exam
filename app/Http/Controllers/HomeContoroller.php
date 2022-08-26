<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeContoroller extends Controller
{
    public function index(){
        return view('Home');
    }
}
