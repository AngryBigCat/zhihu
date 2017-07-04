<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

    	 return view('admin.index');
    }

    public function listtopic()
    {

    	return view('admin.topic.listtopic');
    }

    public function topiccreate()
    {
    	 return view('admin.topic.topiccreate');
    }
}
