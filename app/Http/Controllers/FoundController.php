<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Users;
// use App\Question;
// use App\User_detail;

class FoundController extends Controller
{
    //users->name  user_detail->introduction,job,headpic  questail->title,content,qs_img,count
    public function found()
    {
    	$questions = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->take(1)->get();
        // dd($questions[0]->title);die;
        $titles = DB::table('questions')->select('questions.title')->orderBy('questions.count','desc')->take(5)->get();
    	 // dd($titles);
    	 // foreach ($questions as $key => $value) {
    	 // 	dd($value->name);
    	 // }
    	$dayHot = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->orderBy('questions.count','desc')->take(5)->get();
   		return view('home.found.found',['questions'=>$questions,'titles'=>$titles,'dayHot'=>$dayHot]);

    }

    public function retui()
    {
        $dayHot = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->orderBy('questions.count','desc')->take(5)->get();
        json_decode($dayHot);
    }

    public function more()
    {
        $questions = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->orderBy('questions.count','desc')->take(10)->get();
        return view('home.found.more',['questions'=>$questions]);
    }


}
