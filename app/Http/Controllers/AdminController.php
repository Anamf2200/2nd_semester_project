<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('Admin.Dashboard');
    }

    public function login(){
        return view('Admin.login');
    }
}
