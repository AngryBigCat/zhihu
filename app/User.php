<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Jcc\LaravelVote\Vote;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanSubscribe;

class User extends Authenticatable
{
    use Notifiable, Vote, CanFollow, CanSubscribe, CanBeFollowed;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户关联的问题
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * 用户一对多关联问题
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * 格式化用户的粉丝信息
     * @param $my
     * @param $user
     * @return array
     */
    public static function formatFollower($otherFollowers)
    {
        $tmp = [];
        foreach ($otherFollowers as $index => $other) {
            $tmp[$index]['id'] = $other->id;
            $tmp[$index]['name'] = $other->name;
            $tmp[$index]['followers'] = $other->followers()->count();
            $tmp[$index]['questions'] = $other->questions()->count();
            $tmp[$index]['answers'] = $other->answers()->count();
            $tmp[$index]['isFollow'] = self::isMyFollowed($other->id);
        }
        return $tmp;
    }

    /**
     * 判断已登录的用户是否关注了用户
     * @param $oID
     * @return bool
     */
    public static function isMyFollowed($oID)
    {
        $myFollowers = Auth::user()->followings;
        foreach ($myFollowers as $my) {
            if ($my->id == $oID) {
                return true;
            }
        }
        return false;
    }
}
