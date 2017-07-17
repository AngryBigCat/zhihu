<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Tag extends Model
{
    //第三方包
    use CanBeFollowed, Searchable;

    protected $fillable=['pid','path','img','tag_name','description'];
    /**
     * 问题和话题的多对多关系
     */
    public function question()
    {
    	return $this->belongsToMany('\App\Question','question_tag','tag_id','question_id');
    }

    public function searchableAs()
    {
        return 'tag_index';
    }
}

