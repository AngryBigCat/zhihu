<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advertisement;

class ListAdvertisementController extends Controller
{
	/**
     * 后台模块中的广告列表数据
     *  
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	// 获取输入的关键字
        $keywords = $request->input('keywords');
        // 获取推荐的问题
    	$res = DB::table('advertisements')
        ->where(function($query)use($keywords){
                //如果存在关键字参数
                if(!empty($keywords)) {
                    $query->where('title','like','%'.$keywords.'%');
                }
            })
    	->orderBy('id','desc')
    	->paginate($request->input('num',10));
    	// 返回发现列表页面
    	return view('admin.AD.listAD',['res'=>$res,'data'=>$request->all()]);
    }

    /**
     * 后台模块中的广告地址更新
     *  
     * @return \Illuminate\Http\Response
     */
    public function editAjax(Request $request)
    {
    	$res = Advertisement::find($request -> id);
    	$res -> url = $request -> url;

    	if($res->save()){
         	echo json_encode(['status'=> '1','msg'=>'更新成功']);
        }else{
         	echo json_encode(['tatus'=> '0','msg'=>'更新失败']);
        }
    }

    /**
     * 后台模块中的广告图片更新
     *  
     * @return \Illuminate\Http\Response
     */
    public function ajax(Request $request)
    {
    	 // 删除旧得图片
        $id=$request->id;
        $qus = Advertisement::find($id);
        // echo $qus;die;
        // unlink(ltrim($qus->img,'.'));
        // echo $request->hasFile('img');die;
        if($request->hasFile('img')) {
            //创建文件的名字
            $filename = time().rand(10000,99999);
            //获取文件的后缀
            $suffix = $request->file('img')->getClientOriginalExtension();
            //文件夹
            $dirname = './uploads/ad/';
            //文件名
            $file = $filename .'.'. $suffix;
            //移动
            $request->file('img')->move($dirname,$file);
            //修改图片属性
            $qus->img = $dirname.$file;
            // 上传数据
            // echo ('/uploads/ad/'.$filename);
            if($qus->save()){
                echo ('/uploads/ad/'.$file);
            }else{
                echo '图片上传失败';
            }
        }
    }

    /**
     * 后台模块中的广告删除
     *  
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
    	$res = Advertisement::find($id);
        if($res->delete()) {
            return redirect(route('listAD'))->with('info','删除成功');
        }else{
            return back()->with('info','删除失败!!!');
        }
    }
    /**
     * 后台模块中的广告添加
     *  
     * @return \Illuminate\Http\Response
     */
    public function adAdd()
    {
    	return view('admin.AD.adAdd');
    }

    /**
     * 后台模块中的广告添加的执行
     *  
     * @return \Illuminate\Http\Response
     */
    public function do_adAdd(Request $request)
    {
    	//表单验证  unique唯一
        $this->validate($request, [
            'title' => 'required|max:60|unique:advertisements,ad_name',
            'url' => 'required',
            'img' =>'required',
            ],[
            'title.required' => 'sorry！您还未写下您的广告名',
            'title.max'=>'sorry!您的广告词太长了',
            'title.unique' => 'sorry！您的广告已存在',
            'url.required' => 'sorry！您需要给定一个广告地址',
            'img.required' => 'sorry！您需要给您广告一个美图'
        ]);

    	$ad = new Advertisement;
    	$ad -> ad_name = $request -> title;
    	$ad -> url = $request -> url;
    	if($request->hasFile('img')) {
            //创建文件的名字
            $filename = time().rand(10000,99999);
            //获取文件的后缀
            $suffix = $request->file('img')->getClientOriginalExtension();
            //文件夹
            $dirname = './uploads/ad/';
            //文件名
            $file = $filename .'.'. $suffix;
            //移动
            $request->file('img')->move($dirname,$file);
            //修改图片属性
            $ad-> img = $dirname.$file;
        }

        if($ad->save()) {
            return redirect(route('listAD'))->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }

    }
}
