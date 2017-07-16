<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    public function index()
    {

    	$user = Auth::id();
    	//判断用户是否登录
    	if(!empty($user)){
    		 // 获取用户关注的话题
    		$tagsId = \App\User::find($user)->followings(\App\Tag::class)->get();
            // 得出ID
	    	$qs_id=[];
	        foreach ($tagsId as $key => $value) {
	                array_push($qs_id, $value->id);
	        }
            // 取出最后一个
	        $id = end($qs_id);
    	}
  
        return view('home.index.default',compact('id'));
    }
}
