<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Tag extends Model
{
    // 第三方包
    use CanBeFollowed;

    public function question()
    {
    	return $this->belongsToMany('\App\Question','question_tag','tag_id','question_id');
    }
}

