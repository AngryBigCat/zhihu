<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreCommentPost;
use App\Http\Requests\StoreQuestionPost;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * 提交问题
     * @param StoreQuestionPost $request
     * @return string
     */
    public function store(StoreQuestionPost $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::user()->id;
        $question = Question::create($data);
        if ($question) {
            $question->tags()->attach($data['topic_ids']);
            return [
                'msg' => '问题添加成功',
                'redirect_url' => route('question.show', $question->id)
            ];
        }
    }

    /**
     * 显示问题页
     * $id 问题页面
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findAndIncre($id); //查找问题 并自增浏览量+1
        $answers = $question->answers()->withTrashed()->get();
        $myAnswer = $question->getLoggedAnswer($answers);
        $sort = [
            'selection' => '默认排序',
            'options' => [
                'mostthumb' => '最多点赞',
                'mostcomment' => '最多评论',
                'latest' => '最新回答',
                'oldest' => '最早回答',
            ]
        ];
        return view('home.question.default', compact('question', 'answers', 'sort', 'myAnswer'));
    }

    public function delete($id)
    {
        $question = Question::find($id);
        if ($question->delete()) {
            $res = [
                'from' => 'question',
                'msg' => '删除问题成功！'
            ];
            if ($question->answers()->forceDelete()) {
                $res['msg'] .= '并且相关的回答也一并删除！';
            }
            return $res;
        };
    }

    /**
     * 显示含有关于作者的问题页
     * @param $id
     * @param $aid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContainAuthor($id, $aid)
    {
        $question = Question::findAndIncre($id);
        $answers = $question->filterAppointAnswers($question->answers, $aid);
        $myAnswer = $question->getLoggedAnswer($question->answers);
        $topAnswer = $question->getAnswer($question->answers, $aid);
        if (!$topAnswer) {
            return redirect()->route('question.show', ['id' => $id]);
        }
        $sort = [
            'selection' => '默认排序',
            'options' => [
                'mostthumb' => '最多点赞',
                'mostcomment' => '最多评论',
                'latest' => '最新回答',
                'oldest' => '最早回答',
            ]
        ];
        return view('home.question.showContainAuthor', compact('sort', 'question', 'answers', 'myAnswer', 'topAnswer'));
    }

    /**
     *
     * @param $id
     */
    public function getFollowersByQuestionID($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return [
                'msg' => '不存在这个问题'
            ];
        }
        return User::formatFollower($question->followers);
    }

    /**
     * 按点赞最多的排序回答
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mostThumbSort($id)
    {
        //最多的赞
        $question = Question::find($id);
        $answers = $question->mostThumbAnswer();
        $myAnswer = $question->getLoggedAnswer($question->answers);
        $sort = [
            'selection' => '最多点赞',
            'options' => [
                'mostcomment' => '最多评论',
                'latest' => '最新回答',
                'oldest' => '最早回答',
            ]
        ];
        return view('home.question.default', compact('question', 'answers', 'sort', 'myAnswer'));
    }

    public function latestSort($id)
    {
        //最新的回答
        $question = Question::find($id);
        $answers = $question->latestAnswer();
        $myAnswer = $question->getLoggedAnswer($question->answers);
        $sort = [
            'selection' => '最新回答',
            'options' => [
                'mostcomment' => '最多评论',
                'mostthumb' => '最多点赞',
                'oldest' => '最早回答',
            ]
        ];
        return view('home.question.default', compact('question', 'answers', 'sort', 'myAnswer'));

    }

    public function oldestSort($id)
    {
        //最新的回答
        $question = Question::find($id);
        $answers = $question->oldestAnswer();
        $myAnswer = $question->getLoggedAnswer($question->answers);
        $sort = [
            'selection' => '最新回答',
            'options' => [
                'mostcomment' => '最多评论',
                'mostthumb' => '最多点赞',
                'oldest' => '最早回答',
            ]
        ];
        return view('home.question.default', compact('question', 'answers', 'sort', 'myAnswer'));
    }

    /**
     * 关注、取消关注问题
     * @param $id
     * @return mixed
     */
    public function toggleFollow($id)
    {
        $user = Auth::user();
        return $user->toggleFollow($id, Question::class);
    }

    /**
     * 创建该问题下的评论
     * @param StoreCommentPost $request 前端提交过来的评论内容
     * @param $id                           问题ID
     * @return array                        返回创建成功后被格式化好的评论
     */
    public function storeCommentByQuestionID(StoreCommentPost $request, $id)
    {
        $comment = Comment::createComment($request->input(), $id, 'App\Question');
        if (!$comment) {
            return [
                'code' => 50000,
                'msg' => '创建评论失败'
            ];
        }
        return Comment::formatData($comment);
    }

    /**
     * 获取该问题下的评论
     * @param $id           问题ID
     * @return array|mixed  返回评论数组
     */
    public function indexCommentByQuestionID($id)
    {
        $question = Question::with('comments.user')->find($id);
        if (!$question) {
            return [
                   'code' => 40000,
                'msg' => '查询的问题不存在'
            ];
        }
        return Comment::filterData($question->comments);
    }
}
