<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $authId= Auth::user()->id;
		$myCollects = DB::table('collects')->where('user_id',$authId)->get();
// dd($myCollects);
        // 登录用户已经关注的收藏夹id
        $authId= Auth::user()->id;
        $col = \App\User::find($authId)->followings(\App\Collect::class)->get();
        
		return view('home.collect.collections',compact('myCollects','col'));
	}

    /**
     * 我关注的问题
     * @return 
     */
    public function follow()
    {
        // 关注的问题
        $authId= Auth::user()->id;
        $qus = \App\User::find($authId)->followings(\App\Question::class)->get();
        return view('home.collect.following',compact('qus'));
    }

    /**
     * 我关注的收藏
     * @return 
     */
    public function myFollow()
    {
        $authId= Auth::user()->id;
        $col = \App\User::find($authId)->followings(\App\Collect::class)->get();
        return view('home.collect.myFollow',compact('col'));
    }

    /**
     * 收藏的关注取消
     * @return 
     */
    public function followAjax(Request $request)
    {
         if(Auth::check()){
            $auth= Auth::user();
            $col_id = $request->data;
            $user = \App\User::find($auth->id);
            $col = \App\Collect::find($col_id);
            // echo $user;
            if ($user->isFollowing($col)) {
                $user->unfollow($col);
                echo json_encode(['status'=>0, 'msg'=>'关注']);
            } else {
                $user->follow($col);
                echo json_encode(['status'=>1, 'msg'=>'取消关注']);
            }
        }
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

    /**
     * 收藏夹下的问题
     * @return 
     */
    public function collectQus(Request $request)
    {
        $collect=Collect::find($request->id);
        // dd($collect->name);
        $res = $collect->question;
        $collect_ids = [];
        foreach($res as $v) {
            $collect_ids[] = $v->id;
        }
        return view('home.collect.detail',compact('collect','res','collect_ids'));
    }
}
