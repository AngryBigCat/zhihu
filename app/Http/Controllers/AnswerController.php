<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\Http\Requests\StoreAnswerPost;
use App\Http\Requests\StoreCommentPost;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Jcc\LaravelVote\CanBeVoted;

class AnswerController extends Controller
{
    //投票第三方包
    use CanBeVoted;

    /**
     * 提交回答
     * @param StoreAnswerPost $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAnswerPost $request)
    {
        $data = $request->input();
        $user = Auth::user();
        $data['user_id'] = $user->id;
        //记录用户在当前问题已回答状态
        $user->subscribe($data['question_id'], Question::class);
        $answer = Answer::create($data);
        if ($answer) {
            return response()->json([
                'code' => 0,
                'status' => 'success',
                'data' => $answer
            ], 200);
        } else {
            return response()->json([
                'code' => 1,
                'status' => 'error',
                'data' => null
            ], 404);
        }
    }

    /**
     * 更新回答
     * @param StoreAnswerPost $request
     * @param $id
     * @return mixed
     */
    public function update(StoreAnswerPost $request, $id)
    {
        $answer = Answer::find($id);
        $answer->content = $request->input('content');
        $answer->save();
        return $answer;
    }

    /**
     * 删除回答
     * @param $id
     * @return array
     */
    public function delete($id)
    {
        $answer = Answer::findOrFail($id);
        if ($answer->delete()) {
            return [
                'from' => 'answer',
                'msg' => '删除回答成功！'
            ];
        }
    }

    public function restore($id)
    {
        $answer = Answer::withTrashed()->find($id);
        if ($answer->restore()) {
            return [
              'msg' => '恢复回答成功！'
            ];
        }
    }

    /**
     * 点赞、取消点赞
     * @param $id
     * @param $type
     * @return string
     */
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

    /**
     * 提交问题下的评论
     * @param StoreCommentPost $request
     * @param $id
     * @return array
     */
    public function storeCommentByAnswerID(StoreCommentPost $request, $id)
    {
        $comment = Comment::createComment($request->input(), $id, 'App\Answer');
        if (!$comment) {
            return [
                'code' => 50000,
                'msg' => '创建评论失败'
            ];
        }
        return Comment::formatData($comment);
    }

    /**
     * 获取这个回答下的所有评论
     * @param $id
     * @return array|mixed
     */
    public function indexCommentByAnswerID($id)
    {
        $answer = Answer::with('comments.user')->find($id);
        if (!$answer) {
            return [
                'code' => 40000,
                'msg' => '查询的回答不存在'
            ];
        }
        return Comment::filterData($answer->comments);
    }
}
