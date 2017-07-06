<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    //获取发现页面中的热门问题
    public function getQus()
    {
    	return $this->hasMany('App\Model\questions');
    }
}
