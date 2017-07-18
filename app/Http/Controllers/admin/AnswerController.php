<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    /**
     * 回答列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->keywords;
        $info = \App\Answer::join('users', 'users.id', '=', 'answers.user_id')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->whereNull('answers.deleted_at')
            ->select('answers.*','users.name', 'users.id as uid','questions.title')
            ->where(function($query)use($keywords){
                if (!empty($keywords)) {
                        $query->where('answers.content','like','%'.$keywords.'%');
                    }
                })
            ->paginate($request->input('num',10));
        return view('admin.answer.answer_list', ['info'=>$info,'data'=>$request->all()]);
    }

    /**
     * 修改回答内容
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_ans(Request $request, $id)
    {
        $content = $request->content;
        $answer = \App\Answer::find($id);
        $answer->content = $content;
        if ($answer->save()) {
            echo json_encode(['status'=>0, 'msg'=>'成功修改id为'.$id.'回答']);
        } else {
            echo json_encode(['stauts'=>1, 'msg'=>'修改失败']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ans_del($id)
    {
        $answer = \App\Answer::find($id);
        if ($answer->delete()) {
            return back()->with('info', '软删除成功');
        } else {
            return back()->with('info', '软删除失败');
        }
    }

    
}
