<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class commentController extends Controller
{
    //
     // 评论列表
    public function index(Request $request)
    {
        $info = DB::table('comments')
            ->join('users','comments.user_id','=','users.id')
            ->select('users.name','comments.*')
            ->where(function($query)use($request){
                $keyword = $request->input('keyword');
                if(!empty($keyword)){
                    $query->where('comments.content','like','%'.$keyword.'%');
                }
            })
            ->paginate($request->input('num',5));
            
    	return view('admin.comment.commentlist',compact('info','request'));
    }


    // 评论删除
    public function delete($id)
    {
        $dalete = DB::table('comments')->where('id', '=', $id)->delete();
         if($dalete){
            return back()->with('info','删除成功');
        } else {
            return back()->with('info','删除失败');
        }
        // $dalete = DB::table('comments')->where('id', '=', $id)->delete();
        // if ($dalete->save()) {
        //     echo json_encode(['status'=>0, 'msg'=>'成功删除id为'.$id.'评论']);
        // } else {
        //     echo json_encode(['stauts'=>1, 'msg'=>'删除失败']);
        // }
    }

    // 评论修改
    public function modify(Request $request, $id)
    {
        $content = $request->content;
        $answer = \App\Comment::find($id);
        $answer->content = $content;
        if ($answer->save()) {
            echo json_encode(['status'=>0, 'msg'=>'成功修改id为'.$id.'评论']);
        } else {
            echo json_encode(['stauts'=>1, 'msg'=>'修改失败']);
        }

    }



    
}
