<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionPost;
use App\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * 提交问题
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionPost $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::user()->id;
        $question = Question::create($data);
        if ($question) {
            return route('question.show', $question->id);
        }
    }

    /**
     * Display the specified resource.
     * $id 问题页面
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findAndIncre($id);
        $answers = $question->answers()->get();
        $sort = [
            'selection' => '默认排序',
            'options' => [
                'mostthumb' => '最多点赞',
                'mostcomment' => '最多评论',
                'latest' => '最新回答',
                'oldest' => '最早回答',
            ]
        ];
        return view('home.question.default', compact('question', 'answers', 'sort'));
    }

    /**
     * 问题按排序显示
     * @param $id
     * @param $sortType
     */
    public function toggleSort($id, $sortType)
    {
        switch ($sortType) {
            case 'mostthumb':
                //最多的赞
                $question = Question::find($id);
                $answers = $question->mostThumbAnswer();
                $sort = [
                    'selection' => '最多点赞',
                    'options' => [
                        'mostcomment' => '最多评论',
                        'latest' => '最新回答',
                        'oldest' => '最早回答',
                    ]
                ];
                return view('home.question.default', compact('question', 'answers', 'sort'));
                break;
            case 'mostcomment':
                return '评论待做';
                break;
            case 'latest':
                //最新的回答
                $question = Question::find($id);
                $answers = $question->latestAnswer();
                $sort = [
                    'selection' => '最新回答',
                    'options' => [
                        'mostcomment' => '最多评论',
                        'mostthumb' => '最多点赞',
                        'oldest' => '最早回答',
                    ]
                ];
                return view('home.question.default', compact('question', 'answers', 'sort'));
                break;
            case 'oldest':
                $question = Question::find($id);
                $answers = $question->oldestAnswer();
                $sort = [
                    'selection' => '最早回答',
                    'options' => [
                        'mostcomment' => '最多评论',
                        'mostthumb' => '最多点赞',
                        'latest' => '最新回答',
                    ]
                ];
                return view('home.question.default', compact('question', 'answers', 'sort'));
                break;
        }
    }

    /**
     * 关注问题
     */
    public function toggleFollow($id)
    {
        $user = Auth::user();
        return $user->toggleFollow($id, Question::class);
    }

}
