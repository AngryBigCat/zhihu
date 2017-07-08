<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jcc\LaravelVote\Vote;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, Vote, CanFollow, SoftDeletes;

    protected $dates = ['deleted_at']; 

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
     * 关系一对一 用户信息表
     */
    public function user_details()
    {
        return $this->hasOne('\App\User_detail','user_id');
    }
}
