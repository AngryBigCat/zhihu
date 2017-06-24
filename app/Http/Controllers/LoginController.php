<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login_form1');
    }

    public function login_form2()
    {
    	return view('home.login_form2');
    }
}
