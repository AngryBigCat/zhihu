<?php

namespace App\Http\Controllers;

use App\Tag;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    //热门排序话题页面
    public function index($id)
     {
        if(empty($id)){
            return redirect('/');
        }
        //获取用户id
        $user = Auth::id();
        // 检测是否为空
        if(empty($user)){
            return redirect('/login');
        } else {
            //通过用户ID查询关联的话题
            $tagsId = \App\User::find($user)->followings(\App\Tag::class)->get();
            
            //判断此用户是否关注了话题 无关注则跳话题广场
            if(empty($tagsId[0])){
                return redirect('/topic');
            }

            // 获取话题的ID
            $tagid=[];
            foreach ($tagsId as $key => $value) {
                array_push($tagid, $value->id);
            }
            //获取用户关注话题的个数
            $count = count($tagid);
            //获得话题
            $tags = DB::table('tags')->whereIn('id',$tagid)->orderBy('id')->get();
            $topic = DB::table('tags')->where('id',$id)->get();
            // 获取话题缩略图
            $img = $topic[0]->img;
            // 获取话题名称
            $tag_name = $topic[0]->tag_name;
            $id = $topic[0]->id;
           //多个话题有多个问题 多对多
            $dat = Tag::find($id);
            $question = $dat->question;
            // 获取问题ID
            $qs_id=[];
            foreach ($question as $key => $value) {
                array_push($qs_id, $value->id);
            }
            $res = DB::table('questions')
                ->whereIn('id', $qs_id)
                ->orderBy('created_at', 'desc')
                ->get();
            $huati= DB::table('tags')->paginate(5);

            $data = [];
            for($i = 0; $i<count($qs_id); $i++){
                $data[$qs_id[$i]] =  self::browseAnswer($qs_id[$i]);
            }
            //用户关注话题
            $tag_htid = \App\User::find($user)->followings(\App\Tag::class)->get();
            $tag_ids = [];
            foreach($tag_htid as $v) {
                $tag_ids[] = $v->id;
            }

              //用户关注的问题
            $tagss = \App\User::find($user)->followings(\App\question::class)->get();

            $question_ids = [];
            foreach($tagss as $v) {
                $question_ids[] = $v->id;
            }
            return view('home.topic.topic',compact('data' ,'tags','img','id','tag_name','huati','res','count','question_ids','tag_ids'));
        }
     }
    //时间排序话题页面
    public function topicTimeTag($id)
     {
        if(empty($id)){
            return redirect('/');
        }
        //获取用户id
        $user = Auth::id();
        // 检测是否为空
        if(empty($user)){
            return redirect('/login');
        } else {
            //通过用户ID查询关联的话题
            $tagsId = \App\User::find($user)->followings(\App\Tag::class)->get();
            
            //判断此用户是否关注了话题 无关注则跳话题广场
            if(empty($tagsId[0])){
                return redirect('/topic');
            }

            // 获取话题的ID
            $tagid=[];
            foreach ($tagsId as $key => $value) {
                array_push($tagid, $value->id);
            }
            //获取用户关注话题的个数
            $count = count($tagid);
            //获得话题
            $tags = DB::table('tags')->whereIn('id',$tagid)->orderBy('id')->get();
            $topic = DB::table('tags')->where('id',$id)->get();
            // 获取话题缩略图
            $img = $topic[0]->img;
            // 获取话题名称
            $tag_name = $topic[0]->tag_name;
            $id = $topic[0]->id;
           //多个话题有多个问题 多对多
            $dat = Tag::find($id);
            $question = $dat->question;
            // 获取问题ID
            $qs_id=[];
            foreach ($question as $key => $value) {
                array_push($qs_id, $value->id);
            }
            $res = DB::table('questions')
                ->whereIn('id', $qs_id)
                ->orderBy('created_at', 'desc')
                ->get();
            $huati= DB::table('tags')->paginate(5);

            $data = [];
            for($i = 0; $i<count($qs_id); $i++){
                $data[$qs_id[$i]] =  self::TimeAnswer($qs_id[$i]);
            }
            //用户关注话题
            $tag_htid = \App\User::find($user)->followings(\App\Tag::class)->get();
            $tag_ids = [];
            foreach($tag_htid as $v) {
                $tag_ids[] = $v->id;
            }
             // dd( $tag_ids);

              //用户关注的问题
            $tagss = \App\User::find($user)->followings(\App\question::class)->get();
            // dd($tagss);
            $question_ids = [];
            foreach($tagss as $v) {
                $question_ids[] = $v->id;
            }
            return view('home.topic.topic',compact('data' ,'tags','img','id','tag_name','huati','res','count','question_ids','tag_ids'));
        }
     }

    //连表查询函数,按时间排序多表查询
    public static function TimeAnswer($qs_id)
     {
        $res = DB::table('answers as ans')
            ->join('users', 'ans.user_id', '=', 'users.id')
            ->join('user_details as userinfo', 'ans.user_id', '=', 'userinfo.user_id')
            ->where('ans.question_id',$qs_id)
            ->select('ans.*', 'users.name', 'userinfo.a_word')
            ->orderBy('created_at', 'desc')
            ->first();
        return (array)$res;
     }
    //连表查询函数,按点赞量排序多表查询
    public static function browseAnswer($qs_id)
     {
        $res = DB::table('answers as ans')
            ->join('users', 'ans.user_id', '=', 'users.id')
            ->join('user_details as userinfo', 'ans.user_id', '=', 'userinfo.user_id')
            ->where('ans.question_id',$qs_id)
            ->select('ans.*', 'users.name', 'userinfo.a_word')
            ->orderBy('vote_count', 'desc')
            ->first();
        return (array)$res;
     }

    //热门排序话题详情
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
            $ids = $topic[0]->id;
            $count=\App\Tag::find($ids)->followers()->count();
            // dd($count);
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
                ->whereIn('id', $qs_id)
                ->orderBy('created_at', 'desc')
                ->get();
            $huati= DB::table('tags')->paginate(5);

            $data = [];
            for($i = 0; $i<count($qs_id); $i++){
                $data[$qs_id[$i]] =  self::browseAnswer($qs_id[$i]);
            }
             // 子话题
            $sonTag = $this->getClassify($id);
            //子话题的数量
            $numsonTag = count($sonTag);
            //用户关注的问题
            $tags = \App\User::find($user)->followings(\App\Tag::class)->get();
            $tag_ids = [];
            foreach($tags as $v) {
                $tag_ids[] = $v->id;
            }
           
            //用户关注的问题
            $ques = \App\User::find($user)->followings(\App\Question::class)->get();
            $question_ids = [];
            foreach($ques as $v) {
                $question_ids[] = $v->id;
            }
            
        }
        return view('home.topic.topicDetails',compact('data','tag_name','res','description','sonTag','pid','img','tag_ids','ids','question_ids','numsonTag','count'));
     }
    //时间排序话题详情
    public function topicTime($id)
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
            $ids = $topic[0]->id;
            $count=\App\Tag::find($ids)->followers()->count();
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
                ->whereIn('id', $qs_id)
                ->orderBy('created_at', 'desc')
                ->get();
            $huati= DB::table('tags')->paginate(5);

            $data = [];
            for($i = 0; $i<count($qs_id); $i++){
                $data[$qs_id[$i]] =  self::TimeAnswer($qs_id[$i]);
            }
            // 父话题
            $tag= DB::table('tags')
             ->where('pid','=',0)
             ->get();
             // 子话题
            $sonTag = $this->getClassify($id);
            //子话题的数量
            $numsonTag = count($sonTag);
            // $span = $sonTag[0]->tag_name;
            //用户关注的问题
            $tags = \App\User::find($user)->followings(\App\Tag::class)->get();
            $tag_ids = [];
            foreach($tags as $v) {
                $tag_ids[] = $v->id;
            }
            //用户关注的问题
            $ques = \App\User::find($user)->followings(\App\Question::class)->get();
            $question_ids = [];
            foreach($ques as $v) {
                $question_ids[] = $v->id;
            }
            
        }
        return view('home.topic.topicDetails',compact('data','tag_name','res','description','sonTag','tag','pid','img','tag_ids','ids','question_ids','numsonTag','count'));

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
    //关注话题页面
    public function topicConcern()
     {
        // 话题的数量
        $tags =\App\Tag::all()->take(1);
        // 用户ID
        $user = Auth::id();
        // 获取用户关注的话题
        $tagsId = \App\User::find($user)->followings(\App\Tag::class)->get();
        // 得出ID
        $tag_ids = [];
        foreach($tagsId as $v) {
            $tag_ids[] = $v->id;
        }
        $count = count($tag_ids);
        // dd($count);
        //取出第一个
        $id = reset($tag_ids);
        // 判断此用户是否关注了话题 无关注则跳话题页面
        if(!empty($tagsId[0])){
            return redirect('/topic/'.$id);
        }

        return view('home.topic.topicConcern',compact('tags','tag_ids','count'));
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
    //关注话题
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
    //关注问题
    public function ajaxs(Request $request)
     { 

        $que_id = $request->data;

        $user = \App\User::find(Auth::id());
        $que = \App\Question::find($que_id);
        if ($user->isFollowing($que)) {
            $user->unfollow($que);
            echo json_encode(['status'=>0, 'msg'=>'关注']);
        } else {
            $user->follow($que);
            echo json_encode(['status'=>1, 'msg'=>'取消关注']);
        }
     }
}
