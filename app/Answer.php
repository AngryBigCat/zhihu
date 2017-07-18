<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Jcc\LaravelVote\CanBeVoted;

class Answer extends Model
{
    //第三方包
    use CanBeVoted, SoftDeletes;
    // 软删除
    protected $dates = ['deleted_at'];

    //第三方包属性 与User关联
    protected $vote = User::class;

    //可写入的字段
    protected $fillable = ['content', 'question_id', 'user_id'];

    /**
     * 该回答关联的用户
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 统计点赞数
     */
    public function countVote()
    {
        return $this->countUpVoters();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * 是否点过赞
     */
    public function isVote()
    {
        $user = Auth::user();
        return $this->isVotedBy($user);
    }

    //以下两个方法，可考虑放入控制器里面

    /**
     * 点赞
     */
    public static function upVote($id)
    {
        $user = Auth::user();
        $answer = self::find($id);
        return $user->upVote($answer);
    }

    /**
     * 取消点赞
     */
    public static function cancelVote($id)
    {
        $user = Auth::user();
        $answer = Answer::find($id);
        return $user->cancelVote($answer);
    }
}
