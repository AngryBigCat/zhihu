<?php

namespace App\Http\Controllers;

use App\Tag;
use DB;

class TopicController extends Controller
{
    public function index()
    {
        // 获得话题
    	$tags = DB::table('tags')->whereIn('id',[1,2,3])->get();
        $topic = DB::table('tags')->where('id',1)->get();
        foreach ($topic as $key => $value) {
            $img=$value->img;
        }
        foreach ($topic as $key => $value) {
            $tag_name = $value->tag_name;
        }
        //连表查询 多对多
        $data = Tag::find(1);
        $question = $data->question;
        //其他人关注的话题
        $huati = DB::table('tags')->where('id','<=',5)->get();

    	return view('home.topic.topic',compact('tags','question','img','tag_name','huati'));
    }

    public function tag($id)
    {
        //获得话题
    	$tags = DB::table('tags')->whereIn('id',[1,2,3])->get();
        $topic = DB::table('tags')->where('id',$id)->get();
        foreach ($topic as $key => $value) {
            $img=$value->img;
        }
        foreach ($topic as $key => $value) {
            $tag_name = $value->tag_name;
        }
        //连表查询 多对多
    	$data = Tag::find($id);
        $question = $data->question;
         //其他人关注的话题
        $huati = DB::table('tags')->where('id','<=',5)->get();

    	return view('home.topic.content',compact('tags','question','img','tag_name','huati'));
    }
}
