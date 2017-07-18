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
            'name' => 'required|max:60'
            ],[
            'name.required' => 'sorry！您还未写下您的收藏夹名字',
            'name.max' => 'sorry！您的名字太长了'
            ]);

        $col = Collect::findOrFail($request->id);
        $col -> name = $request->name;
        $col -> created_at = $request->created_at;
        $col -> intro = $request->describe;
        // 更新数据库
        // dd($request->pag);
        if($col->save()) {
            return redirect(route('listCollect'))->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }
    }

     /**
     * 后台模块中的收藏列表数据的删除
     *  
     * @return \Illuminate\Http\Response
     */
    public function del(Request $request,$id)
    {
        $res = Collect::find($id);
        // dd($res);
        if($res->delete()) {
            return redirect(route('listCollect'))->with('info','删除成功');
        }else{
            return back()->with('info','删除失败!!!');
        }
    }
}
