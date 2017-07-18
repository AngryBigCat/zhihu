<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Collect extends Model
{
    // 第三方包
    use CanBeFollowed;

    /**
     * 多对多  收藏夹下的问题
     */
    public function questions()
    {
        return $this->belongsToMany('\App\Question' ,'question_collect', 'collect_id', 'question_id');
    }
}
