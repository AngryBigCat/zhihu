<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListQuestionController extends Controller
{
	/**
     * 后台模块中的问题列表数据
     *  LJQ
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取输入的关键字
        $keywords = $request->input('keywords');
        // 获取推荐的问题
    	$res = DB::table('questions')
    	->join('users','questions.user_id','=','users.id')
    	->select('users.name','questions.*')
        ->where(function($query)use($keywords){
                //如果存在关键字参数
                if(!empty($keywords)) {
                    $query->where('title','like','%'.$keywords.'%');
                }
            })
    	->orderBy('questions.id','desc')
    	->paginate($request->input('num',10));
    	// 返回发现列表页面
    	return view('admin.question.listQuestion',['res'=>$res,'data'=>$request->all()]);
    }
}
