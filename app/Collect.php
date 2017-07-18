<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Collect extends Model
{
    //第三方包
    use CanBeFollowed;

    public function question()
    {
    	return $this->belongsToMany('\App\Question','question_collects','collect_id','question_id');
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
