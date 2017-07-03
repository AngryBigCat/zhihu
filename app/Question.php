<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Question extends Model
{
    //第三方包
    use CanBeFollowed;

    //可写入的字段
    protected $fillable = ['user_id', 'title', 'topic', 'describe'];

    /**
     * 关联问题下的回答
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * 判断当前登陆的用户是否关注了该问题
     * @return bool
     */
    public function isFollow()
    {
        $user = Auth::user();
        return $this->isFollowedBy($user);
    }

    public function mostThumbAnswer()
    {
        return $this->hasMany('App\Answer')
                    ->get()
                    ->sortByDesc(function ($answer, $key) {
                        return $answer->countVote();
                    });
    }

    public function mostCommentAnswer()
    {

    }

    public function latestAnswer()
    {
        return $this->hasMany('App\Answer')->latest()->get();
    }

    public function oldestAnswer()
    {
        return $this->hasMany('App\Answer')->oldest()->get();
    }

    public function countFollow()
    {
        return $this->followers()->count();
    }

    public static function findAndIncre($id)
    {
        $question = self::find($id);
        $question->visit_count += 1;
        $question->save();
        return $question;
    }

}
