<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Tag;

class TopicController extends Controller
{
    public function index()
    {
    	$tags = DB::table('tags')->whereIn('id',[1,2,3])->get();
        // $data = Tag::find($id);
        // $question = $data->question;
        // dd($question);die;
        $topic = DB::table('tags')->where('id',1)->get();
        foreach ($topic as $key => $value) {
            $qiao=$value->img;
        }
        foreach ($topic as $key => $value) {
            $jin = $value->tag_name;
        }
        $data = Tag::find(1);
        $question = $data->question;
    	return view('home.topic.topic',compact('tags','question','qiao','jin'));
    }

    public function tag($id)
    {

    	$tags = DB::table('tags')->whereIn('id',[1,2,3])->get();
        $topic = DB::table('tags')->where('id',$id)->get();
        foreach ($topic as $key => $value) {
            $qiao=$value->img;
        }
        foreach ($topic as $key => $value) {
            $jin = $value->tag_name;
        }
    	$data = Tag::find($id);
        $question = $data->question;
    	return view('home.topic.content',compact('tags','question','qiao','jin'));
    }
}
