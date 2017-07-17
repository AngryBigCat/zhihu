<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Collect;

class ListCollectController extends Controller
{
	/**
     * 后台模块中的收藏夹列表数据
     *  LJQ
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	// 获取输入的关键字
        $keywords = $request->input('keywords');
        // 获取推荐的问题
    	$res = DB::table('collects')
        ->where(function($query)use($keywords){
                //如果存在关键字参数
                if(!empty($keywords)) {
                    $query->where('name','like','%'.$keywords.'%');
                }
            })
    	->orderBy('id','desc')
    	->paginate($request->input('num',10));
    	// 返回发现列表页面
    	// dd($res);
    	return view('admin.collect.listCollect',['res'=>$res,'data'=>$request->all()]);
    } 
    /**
     * 后台模块中的收藏夹修改
     *  LJQ
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	// 查找要编辑id的内容
        $res = Collect::find($id);
        return view('admin.collect.colEdit',compact('res'));
    }

    /**
     * 后台模块中的收藏夹修改的执行
     *  LJQ
     * @return \Illuminate\Http\Response
     */
    public function do_edit(Request $request)
    {
    	//表单验证  unique唯一
        $this->validate($request, [
            'name' => 'required',
            'created_at' => 'required',
            'topic' =>'required',
            ],[
            'title.required' => 'sorry！您还未写下您的问题',
            'title.unique' => 'sorry！您的问题已存在',
            'create_at.required' => 'sorry！您需要给定一个提问时间',
            'topic.required' => 'sorry！您需要给您的问题选一个类别'
            ]);

        $questions = questions::findOrFail($request->id);
        $questions -> title = $request->title;
        $questions -> updated_at = time();
        $questions -> created_at = $request->created_at;
        $questions -> topic = $request->topic;
        $questions -> describe = $request->describe;
        // 更新数据库
        // dd($request->pag);
        if($questions->save()) {
            if ($request->pag=='qus') {
                return redirect(route('listQuestion'))->with('info','更新成功');
            }else{
                return redirect(route('listFound'))->with('info','更新成功');
            }
        }else{
            return back()->with('info','更新失败');
        }
    }
}
