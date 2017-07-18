<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Suggest;

class SuggestController extends Controller
{
	/**
     * Store a newly created resource in storage.
     * 建议提交
     * @param  \Illuminate\Http\Request $request
     */
    public function suggest(Request $request)
    {
    	$this->validate($request, [
            'content' => 'required'
        ],[
            'content.required'=>'！！兄弟，你得写点东西呀！！'
        ]);
        $user_id=$request->user_id;
        $content = $request->content;
        $result=DB::table('suggests')
        ->where('user_id','=',$user_id)
        ->where('content',$content)
        ->first();
        if (!empty($result)) {
            return back()->with('info','您已经提交过该建议了');
        }
        // 数据存储
        $res = new Suggest;
        $res -> user_id = $user_id;
        $res -> content = $content;
        if ($res -> save()) {
            return back()->with('info','提交成功');
        }else{
            return back()->with('info','提交失败');
        }
    }
}
