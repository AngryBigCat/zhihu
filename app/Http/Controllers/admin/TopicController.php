<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// use App\Http\Requests\TagInsertRequest;

class TopicController extends Controller
{

    // 话题添加
    public function topiccreate()
    {
        $tags = $this->getAllTags();

    	return view('admin.topic.topiccreate',['tags'=>$tags]);
    }

    // 添加话题操作
    public function create(request $request)
    {
        // 获取数据

        $data = $request->except(['_token']);
        // var_dump($data);die;
        if($request->hasFile('img','tag_name','description')){
            // 更改图片路径
            if($request->hasFile('img')){
                $filename = time().rand(10000,99999);
                $suffix = $request->file('img')->getClientOriginalExtension();
                $dirname = './uploads/topic/';
                $file = $filename .'.'. $suffix;
                $request->file('img')->move($dirname,$file);
                $data['img']=trim($dirname.$file,'.');
            }
            // 获取path
            if($data['pid'] == '0'){
                $data['path'] = '0';
            } else {
                $info = DB::table('tags')->where('id','=',$data['pid'])->first();
                $data['path'] = $info->path.','.$info->id;
            }
            // 执行添加
            $res = DB::table('tags')->insert($data);
            if($res){
                return redirect('/admin/listtopic')->with('info','添加成功');
            } else {
                return back()->with('info','添加失败');
            }
        } else {
            return back();
        }
    }

    //话题列表显示
    public function listtopic(Request $request)
    {

        $tags = DB::table('tags')
            ->select(DB::raw('*,concat(path,",",id) as paths'))
            ->orderBy('paths')
            ->orderBy('id')
            ->where(function($query)use($request){
                $keyword = $request->input('keyword');
                if(!empty($keyword)){
                    $query->where('tag_name','like','%'.$keyword.'%');
                }
            })
            ->paginate($request->input('num',10));

        foreach($tags as $k=>$v){
            $arr = explode(',',$v->path);
            $level = count($arr)-1;
            $v->tag_name = str_repeat('|-----',$level).$v->tag_name;
        }

        return view('admin.topic.listtopic',['tags'=>$tags],['request'=>$request]);
    }
    //获取当前分类所有信息
    public function getAllTags()
    {
        $tags = DB::table('tags')
        ->select(DB::raw('*,concat(path,",",id) as paths'))
        ->orderBy('paths')
        ->get();

        foreach($tags as $k=>$v){
            $arr = explode(',',$v->path);
            $level = count($arr)-1;
            $v->tag_name = str_repeat('|-----',$level).$v->tag_name;
        } 
        return $tags;
    }
    //话题修改
    public function topicupdate(Request $request)
    {
        $id = $request->input('id');

        $info =DB::table('tags')->where('id','=',$id)->first();

        $tags = $this->getAllTags();

        return view('admin.topic.topicUpdate',[
            'tags'=>$tags,
            'info'=>$info
            ]);
        
    }
    //话题修改操作
    public function update(Request $request)
    {
        // dd($request->all());
        $data = $request->except(['_token','id']);
        if($request->hasFile('img','tag_name','description')){
             if($request->hasFile('img')){
                    $filename = time().rand(10000,99999);
                    $suffix = $request->file('img')->getClientOriginalExtension();
                    $dirname = './uploads/topic/';
                    $file = $filename .'.'. $suffix;
                    $request->file('img')->move($dirname,$file);
                    $data['img']=trim($dirname.$file,'.');
            }
            $res = DB::table('tags')->where('id','=',$request->input('id'))->update($data);

            if($res){
                return redirect('/admin/listtopic')->with('info','更新成功');
            } else {
                return back()->with('info','更新失败');
            }
        } else {
            return back();
        }

    }

    // 话题删除
    public function delete(Request $request)
    {   
        //获取
        $id = $request->input('id');
        //读取分类信息
        $info = DB::table('tags')->where('id','=',$id)->first(); 
        //拼接路径开始的字符串
        $path = $info->path.','.$info->id;
        //首页先删除子分类
        DB::table('tags')->where('path','like',$path.'%')->delete();
        //删除当前的分类
        $res = DB::table('tags')->where('id','=',$id)->delete();
        if($res){
            return back()->with('info','删除成功');
        } else {
            return back()->with('info','删除失败');
        }
    }
}
