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

        if (empty($answer)) {
            return redirect('/admin/answers/ans_list');
        }

        if ($answer->forceDelete()) {
            return back()->with('info', '删除成功');
        } else {
            return back()->with('info', '删除失败');
        }
    }


    /**
     * 某个问题下的所有回答
     */
    public function que_anslist(Request $request, $id)
    {   
        $keywords = $request->keywords;
        $info = \App\Answer::join('users', 'users.id', '=', 'answers.user_id')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->whereNull('answers.deleted_at')
            ->where('answers.question_id', $id)
            ->select('answers.*','users.name', 'users.id as uid','questions.title')
            ->where(function($query)use($keywords){
                if (!empty($keywords)) {
                        $query->where('answers.content','like','%'.$keywords.'%');
                    }
                })
            ->paginate($request->input('num',10));

        if (count($info) <= 0) {
            return redirect('/admin/answer');
        }

        return view('admin.answer.que_anslist', ['info'=>$info,'data'=>$request->all()]);
    }
}
