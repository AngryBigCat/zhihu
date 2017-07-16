<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collect;
use App\Question;

class CollectController extends Controller
{
	/**
     * 收藏页面
     * @return 
     */
	public function index()
	{
		$collect = new Collect;
		$myCollects = $collect->pluck('name');
        // 登录用户已经关注的收藏夹id
        $authId= Auth::user()->id;
        $collect = \App\User::find($authId)->followings(\App\Collect::class)->get();
            dd($collect);
		return view('home.collect.collections',compact('myCollects'));
	}
    public function follow()
    {
        // 关注的问题
        $authId= Auth::user()->id;
        $qus = \App\User::find($authId)->followings(\App\Question::class)->get();

        return view('home.collect.following',compact('qus'));
    }
	/**
     * 创建收藏夹
     * @return 
     */
    public function collectAdd(Request $request)
    {
    	$this->validate($request, [
                'name' => 'required|max:60'
            ],[
                'name.required'=>'！！您还木有给收藏夹起个名字！！',
                'name.max'=>'！！您的名字过长！！'
            ]);
    	// 获取数据
    	$collect = new Collect;
    	$collect->user_id = $request->user_id;
    	$collect->name = $request->name;
    	$collect->intro = $request->intro;
    	if ($collect -> save()) {
    		return redirect('collect/collections')->with('info','收藏夹添加成功');
    	}else{
    		return back()->with('info','收藏夹添加失败');
    	}
    	
    }
}
