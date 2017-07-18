<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
     // 后台首页
    public function index()
    {

    	 return view('admin.index');
    }
}
