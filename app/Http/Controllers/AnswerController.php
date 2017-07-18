<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests\StoreAnswerPost;
use Illuminate\Support\Facades\Auth;
use Jcc\LaravelVote\CanBeVoted;

class AnswerController extends Controller
{
    use CanBeVoted;
    /**
     * 提交回答
     */
    public function store(StoreAnswerPost $request)
    {
        $data = $request->input();
        $data['user_id'] = Auth::user()->id;
        return Answer::create($data);
    }

    public function toggleVote($id, $type)
    {
        if ($type == 'upVote') {
            $result = Answer::upVote($id);
            if (array_key_exists('attached', $result)) {
                return 'up';
            };
        } else if ($type == 'cancelVote') {
            Answer::cancelVote($id);
            return 'cancel';
        }
    }


}
