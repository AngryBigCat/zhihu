<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class BlogController extends Controller
{
    /**
     * 显示博客的列表
     */
    public function index()
    {
        $wen = DB::table('blogs')->get();
        return view('blog.blog',[
            'wen'=>$wen,
            ]);
    }

    /**
     * 显示文章添加页面
     */
    public function create()
    {
       return view('blog.textAdd');
    }
    /**
     * 添加文章执行操作
     */
    public function store(Request $request)
    {
        //获取标题和内容
        $tmp['title'] = $request->title;
        $tmp['content'] = $request->content;
        $tmp['time'] = time();
        
        //插入数据库
       $res =  DB::table('blogs')->insert($tmp);
       //查询数据库

       if (empty($res)) {
            return back()->with('info','添加失败');
       }else{
            return redirect('/blog');
       }
    }


    public function show($id)
    {
        $resour =  DB::table('blogs')->where('id',$id)->first();

        return view('blog.show',[
            'resour'=>$resour,
            ]);
    }

    public function edit($id)
    {    
         $value =  DB::table('blogs')->where('id',$id)->first();
         return view('blog.textEdit',[
            'value'=>$value,
            ]);       
    }


    public function update(Request $request, $id)
    {
        //获取修改的值
        $tmp['title'] = $request->title;
        $tmp['content'] = $request->content;
        $res = DB::table('blogs')->where('id', $id)->update($tmp);
        if (empty($res)) {
            return back()->with('info','修改失败');
        }else {
            return redirect('/blog');
        }
    }


    public function destroy($id)
    {
        DB::table('blogs')->where('id',$id)->delete();
        return redirect('/blog');
    }
}
// 控制器
@if(in_array($v->id,$question_ids))
取消关注
@else
<i class="fa fa-plus" aria-hidden="true"></i>关注
@endif