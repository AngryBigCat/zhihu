<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Collect extends Model
{
    //第三方包
    use CanBeFollowed;

    /**
     * 关注问题下的问题
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * 判断当前登陆的用户是否关注了该收藏
     * @return bool
     */
    public function isFollow()
    {
        $user = Auth::user();
        return $this->isFollowedBy($user);
    }

    public function mostThumbQuestion()
    {
        return $this->hasMany('App\Question')
                    ->get()
                    ->sortByDesc(function ($question, $key) {
                        return $question->countVote();
                    });
    }
    public function countFollow()
    {
        return $this->followers()->count();
    }
}
