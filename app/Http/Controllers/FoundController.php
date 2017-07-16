<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FoundController extends Controller
{
    /**
     * 请说明你这个公共方法的作用，能加上这种形式的注释吗？？？
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function found()
    {
    	$questions = DB::table('questions')->join('user_details','questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->take(1)->get();
        $titles = DB::table('questions')->select('questions.title')->orderBy('questions.visit_count','desc')->take(5)->get();
    	$dayHot = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->orderBy('questions.visit_count','desc')->take(5)->get();
   		return view('home.found.found',['question' => $questions, 'titles' => $titles, 'dayHot' => $dayHot]);
    }

    /**
     * 请说明你这个公共方法的作用，能加上这种形式的注释吗？？？
     */
    public function retui()
    {
        $dayHot = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->orderBy('questions.visit_count','desc')->take(5)->get();
        json_decode($dayHot);
    }

    /**
     * 请说明你这个公共方法的作用，能加上这种形式的注释吗？？？
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function more()
    {
        $questions = DB::table('questions')->join('user_details','.questions.user_id','=','user_details.user_id')->join('users','questions.user_id','=','users.id')->select('users.name','user_details.*','questions.*')->orderBy('questions.visit_count','desc')->take(10)->get();
        return view('home.found.more',['questions'=>$questions]);
    }


}
