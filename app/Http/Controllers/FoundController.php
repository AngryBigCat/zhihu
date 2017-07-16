<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\question_collect;
use App\Collect;

class FoundController extends Controller
{
    /**
     * 遍历发现页面的首推问题
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ritui()
    {   
        // 首推问题
    	$questions = DB::table('questions')
        ->join('user_details','questions.user_id','=','user_details.user_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','user_details.*','questions.*')
        ->take(1)
        ->get();
        // 推荐问题标题
        $titles = DB::table('questions')
        ->select('questions.title')
        ->orderBy('questions.visit_count','desc')
        ->take(5)
        ->get();
        // 热推部分问题
        // 日热
        $now = date("Y-m-d H:i:s", time());
        $bday = date("Y-m-d H:i:s",time()-3600*24);
        
    	$dayHot = DB::table('questions')
        ->join('user_details','.questions.user_id','=','user_details.user_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','user_details.*','questions.*')
        // ->whereBetween('questions.created_at', [$bday,$now]) //今日最热，根据实验需求暂时关闭
        ->orderBy('questions.visit_count','desc')
        ->simplePaginate(5);
        
        // 收藏弹出框----收藏夹数据
        $authId= Auth::user()->id;
        $collect = new Collect;
        $myCollects = $collect->select('name', 'id')->where('user_id',$authId)->get();

        // 登录用户已经关注的问题id
        $tagss = \App\User::find($authId)->followings(\App\Question::class)->get();
            $question_ids = [];
            foreach($tagss as $v) {
                $question_ids[] = $v->id;
            }

        // 返回发现页面
   		return view('home.found.ritui',[
            'questions' => $questions,
            'titles' => $titles,
            'dayHot' => $dayHot,
            'question_ids' => $question_ids,
            'myCollects'=>$myCollects
            ]);
    }

    public  function yuetui()
    {
        $questions = DB::table('questions')
        ->join('user_details','questions.user_id','=','user_details.user_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','user_details.*','questions.*')
        ->take(1)
        ->get();
        // 推荐问题标题
        $titles = DB::table('questions')
        ->select('questions.title')
        ->orderBy('questions.visit_count','desc')
        ->take(5)
        ->get();
        // 月热
        $now = date("Y-m-d H:i:s", time());
        $bmon = date("Y-m-d H:i:s",time()-3600*24*30);
        $monthHot = DB::table('questions')
        ->join('user_details','.questions.user_id','=','user_details.user_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','user_details.*','questions.*')
        ->whereBetween('questions.created_at',[$bmon,$now])
        ->orderBy('questions.visit_count','desc')
        ->simplePaginate(5);

        // 收藏弹出框收藏夹数据
        $authId= Auth::user()->id;
        $collect = new Collect;
        $myCollects = $collect->select('name', 'id')->where('user_id',$authId)->get();

        // 登录用户已经关注的问题id
        $tagss = \App\User::find($authId)->followings(\App\Question::class)->get();
            $question_ids = [];
            foreach($tagss as $v) {
                $question_ids[] = $v->id;
            }
        // 返回数据
        return view('home.found.yuetui',[
            'questions' => $questions,
            'titles' => $titles,
            'monthHot'=> $monthHot,
            'question_ids' => $question_ids,
            'myCollects'=>$myCollects
            ]);
    }
    /**
     * 遍历发现页面的ajax发送热推问题
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function retui()
    {
        $dayHot = DB::table('questions')
        ->join('user_details','.questions.user_id','=','user_details.user_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','user_details.*','questions.*')
        ->orderBy('questions.visit_count','desc')
        ->simplePaginate(5);
        echo json_encode($dayHot);
    }

    /**
     * 遍历更多推荐
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function more()
    {
        $questions = DB::table('questions')
        ->join('user_details','.questions.user_id','=','user_details.user_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','user_details.*','questions.*')
        ->orderBy('questions.visit_count','desc')
        ->take(10)
        ->get();

        return view('home.found.more',['questions'=>$questions]);
    }

    /**
     * 关注问题
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function follow(Request $request)
    {
        if(Auth::check()){
            $auth= Auth::user();
            $qus_id = $request->date;
            $user = \App\User::find($auth->id);
            $qus = \App\Question::find($qus_id);
            // echo $user;
            if ($user->isFollowing($qus)) {
                $user->unfollow($qus);
                echo json_encode(['status'=>0, 'msg'=>'关注']);
            } else {
                $user->follow($qus);
                echo json_encode(['status'=>1, 'msg'=>'取消关注']);
            }
        }

    }

    /**
     * 收藏问题
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function collect(Request $request)
    {
        $this->validate($request, [
            'collect' => 'required',
            'qus_id' => 'required'
        ],[
            'name.required'=>'！！请选一个收藏夹！！',
            'name.max'=>'！！选个问题！！'
        ]);
        $collect_id=$request->collect;
        $question_id=$request->qus_id;
        $result=DB::table('question_collects')
        ->where('question_id','=',$question_id)
        ->where('collect_id',$collect_id)
        ->first();
        if (!empty($result)) {
            return redirect('/found/ritui')->with('info','您已经收藏过该问题');
        }
        // 数据存储
        $res = new question_collect;
        $res -> collect_id = $request->collect;
        $res -> question_id = $request->qus_id;
        if ($res -> save()) {
            return redirect('/found/ritui')->with('info','收藏成功');
        }else{
            return back()->with('info','收藏失败');
        }
    }



}
