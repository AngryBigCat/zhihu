<?php

namespace App\Http\Controllers;

use App\Tag;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //话题页面
    public function index($id)
     {
        if(empty($id)){
            return redirect('/');
        }
        //获取用户id
        $user = Auth::id();
        // 检测是否为空
        if(empty($user)){
            return redirect('/');
        } else {
            //通过用户ID查询关联的话题
            $tagsId = \App\User::find($user)->followings(\App\Tag::class)->get();
            
            //判断此用户是否关注了话题 无关注则跳话题广场
            if(empty($tagsId[0])){
                return redirect('/topicSquare');
            }

            // 获取话题的ID
            $tagid=[];
            foreach ($tagsId as $key => $value) {
                array_push($tagid, $value->id);
            }
            //获取用户关注话题的个数
            $count = count($tagid);
            //获得话题
            $tags = DB::table('tags')->whereIn('id',$tagid)->get();
            $topic = DB::table('tags')->where('id',$id)->get();
            // 获取话题缩略图
            $img = $topic[0]->img;
            // 获取话题名称
            $tag_name = $topic[0]->tag_name;
            $id = $topic[0]->id;
           //多个话题有多个问题 多对多
            $data = Tag::find($id);
            $question = $data->question;
            // 获取问题ID
            $qs_id=[];
            foreach ($question as $key => $value) {
                array_push($qs_id, $value->id);
            }
            //连表查询 
            $res = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->join('user_details','user_details.user_id','=','users.id')
            ->select('users.name','user_details.*','questions.*')
            ->whereIn('questions.id',$qs_id)
            ->get();
             //其他人关注的话题
             $huati= DB::table('tags')->paginate(5);
             // dd($huati);
            return view('home.topic.topic',compact('tags','img','id','tag_name','huati','res','count'));
        }
     }
    //话题广场
    public function topicClassify($id)
     { 
        if(empty($id)){
            return redirect('/');
        }

        $user = Auth::id();
        if(empty($user)){
            return redirect('/');
        } else {
            // 父话题
            $tag= DB::table('tags')
             ->where('pid','=',0)
             ->get();

            //获取当前的父id
            $ids = DB::table('tags')->where('id','=',$id)->get();

             // 子话题
            $sonTag = $this->getClassify($id);

            //热门话题
            $hotTopic1 =\App\Tag::all()->take(3);

            //用户关注的话题
            $tags = \App\User::find($user)->followings(\App\Tag::class)->get();

            $tag_ids = [];

            foreach($tags as $v) {
                $tag_ids[] = $v->id;
            }
            //获取用户关注的个数
           $count= count($tag_ids);

            return view('home.topic.topicSquare',compact('tag_ids','sonTag','tag','hotTopic1','count','ids'));
        }
     }
    //分类函数 获取子话题
    public function getClassify($pid)
     {
        $tags = DB::table('tags')->where('pid','=',$pid)->get();
        $sub_tag = [];
        foreach($tags as $k=>$v){
            $v->sub_tag = $this->getClassify($v->id);
            $sub_tag[]=$v;
        }
        return $sub_tag;
     }
    //话题详情
    public function topicHot($id)
     {
        if(empty($id)){
            return redirect('/');
        }
        
        $user = Auth::id();
        if(empty($user)){
            return redirect('/');
        } else {
             //获取话题id
            $topic = DB::table('tags')->where('id',$id)->get();
            $tag_name = $topic[0]->tag_name;
            $description = $topic[0]->description;
            $pid = $topic[0]->pid;
            $img = $topic[0]->img;
            
            //多个话题有多个问题 多对多
            $data = Tag::find($id);
            $question = $data->question;
            // 获取问题ID
            $qs_id=[];
            foreach ($question as $key => $value) {
                array_push($qs_id, $value->id);
            }

            //连表查询用户,问题 
            $res = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->join('user_details','user_details.user_id','=','users.id')
            ->select('users.name','user_details.*','questions.*')
            ->whereIn('questions.id',$qs_id)
            ->get(); 
            //获取用户关注的个数
            $userid = User::find($user);
            $usertag = $userid->tagtable;
            $count = count($usertag);
            // 父话题
            $tag= DB::table('tags')
             ->where('pid','=',0)
             ->get();
             // 子话题
            $sonTag = $this->getClassify($id);
            // $span = $sonTag[0]->tag_name;
             
            
        }
        return view('home.topic.topicDetails',compact('tag_name','res','description','sonTag','tag','pid','img'));
     }
    // 关注话题
    public function ajaxd(Request $request)
     { 
        $tag_id = $request->date;
        $user = \App\User::find(Auth::id());
        $tag = \App\Tag::find($tag_id);

        if ($user->isFollowing($tag)) {
            $user->unfollow($tag);
            echo json_encode(['status'=>0, 'msg'=>'关注']);
        } else {
            $user->follow($tag);
            echo json_encode(['status'=>1, 'msg'=>'取消关注']);
        }
     }
}
