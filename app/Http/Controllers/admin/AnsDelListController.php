<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnsDelListController extends Controller
{
    /**
     * 软删除列表
     */
    public function del_answerList(Request $request)
    {
        $keywords = $request->keywords;
        $info = \App\Answer::onlyTrashed()
            ->join('users', 'users.id', '=', 'answers.user_id')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->select('answers.*','users.name', 'users.id as uid','questions.title')
            ->where(function($query)use($keywords){
                if (!empty($keywords)) {
                        $query->where('answers.content','like','%'.$keywords.'%');
                    }
                })
            ->paginate($request->input('num',10));
            // dd($info);
        return view('admin.answer.del_answer', ['info'=>$info, 'data'=>$request->all()]);
    }

    // 还原删除的回答
    public function rec_answer($id)
    {   
        $answer =\App\Answer::onlyTrashed()->where('id', $id)->first();
        if ($answer->restore()) {
            return back()->with('info', '恢复成功');
        } else {
            return back()->with('info', '恢复失败');
        }
    }

    // 彻底删除一个回答
    public function del_answer($id)
    {
        $answer =\App\Answer::onlyTrashed()->where('id', $id)->first();
        if ($answer->forceDelete()) {
            return back()->with('info', '删除成功');
        } else {
            return back()->with('info', '删除失败');
        }
    }
}
