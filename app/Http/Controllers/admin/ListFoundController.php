<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\admin\ListFoundEditRequest;
use Illuminate\Support\Facades\DB;
use App\Model\questions;

class ListFoundController extends Controller
{

    /**
     * 后台模块中的发现列表数据
     *  
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
    	->orderBy('questions.visit_count','desc')
    	->paginate($request->input('num',10));
    	// 返回发现列表页面
    	return view('admin.found.listFound',['res'=>$res,'data'=>$request->all()]);
    }
    // public function index_ajax(Request $request)
    // {
    //     // var_dump($request->num);
    //     $res = DB::table('questions')
    //     ->join('users','questions.user_id','=','users.id')
    //     ->select('users.name','questions.*')
    //     ->orderBy('questions.visit_count','desc')
    //     ->paginate($request->input('num'));
    //     print_r($res);
    // }
    /**
     * 后台模块中的发现列表数据的编辑
     *  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 查找要编辑id的内容
        $res = DB::table('questions')
        ->join('users','questions.user_id','=','users.id')
        ->select('users.name','questions.*')
        ->where('questions.id',$id)
        ->get();
        // 将查找到的内容返回页面
        // dd($res[0]);
        return view('admin.found.found_edit',compact('res'));
    }

     /**
     * 后台模块中的发现列表数据的ajax上传图片
     *  
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
         // 删除旧得图片
        $id=$request->id;
        $qus = questions::find($id);
        // echo $qus->qs_img;die;
        if(($qus->qs_img) !='/img/avatar04.png'){
        unlink($qus->qs_img);
        }

        if($request->hasFile('qs_img')) {
            //创建文件的名字
            $filename = time().rand(10000,99999);
            //获取文件的后缀
            $suffix = $request->file('qs_img')->getClientOriginalExtension();
            //文件夹
            $dirname = './uploads/qs/';
            //文件名
            $file = $filename .'.'. $suffix;
            //移动
            $request->file('qs_img')->move($dirname,$file);
            //修改图片属性
            $qus->qs_img = $dirname.$file;
            // 上传数据
            // echo ('/uploads/qs/'.$filename);
            if($qus->save()){
                echo ('/uploads/qs/'.$file);
            }else{
                echo '图片上传失败';
            }
        }

    }
    /**
     * 后台模块中的发现列表数据的编辑执行
     *  
     * @return \Illuminate\Http\Response
     */
    public function do_edit(ListFoundEditRequest $request)
    {
        $questions = questions::findOrFail($request->id);
        // var_dump($_FILES);die();
        $questions -> title = $request->title;
        $questions -> updated_at = time();
        $questions -> created_at = $request->created_at;
        $questions -> topic = $request->topic;
        $questions -> describe = $request->describe;
        // 删除旧得图片
        // $id=$request->id;
        // $qus = questions::find($id);
        // if($qus->qs_img!=='/img/avatar04.png'||$qus->qs_img==''){
        // unlink('.'.$qus->qs_img);
        // }
        // // 将上传的图片起名然后保存数据库
        // if($request->hasFile('qs_img')) {
        //     //创建文件的名字
        //     $filename = time().rand(10000,99999);
        //     //获取文件的后缀
        //     $suffix = $request->file('qs_img')->getClientOriginalExtension();
        //     //文件夹
        //     $dirname = './uploads/qs/';
        //     //文件名
        //     $file = $filename .'.'. $suffix;
        //     //移动
        //     $request->file('qs_img')->move($dirname,$file);
        //     //修改图片属性
        //     $questions->qs_img = $dirname.$file;
        // }
        // 更新数据库
        if($questions->save()) {
            return redirect(route('listFound'))->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }
    }

    /**
     * 后台模块中的发现列表数据的删除
     *  
     * @return \Illuminate\Http\Response
     */
    public function del(Request $request,$id)
    {
        $res = questions::find($id);
        if($res->delete()) {
            return redirect(route('listFound'))->with('info','删除成功');
        }else{
            return back()->with('info','删除失败!!!');
        }
    }
}
