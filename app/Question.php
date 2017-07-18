<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
use Overtrue\LaravelFollow\Traits\CanBeSubscribed;

class Question extends Model
{
    //第三方包
    use CanBeFollowed, CanBeSubscribed;

    //可写入的字段
    protected $fillable = ['user_id', 'title', 'describe'];

    /**
     * 问题关联的评论
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * 问题和话题的多对多关系
     */
    public function question()
    {
        return $this->belongsToMany('\App\Question','question_tag','tag_id','question_id');
    }

    /**
     * 关联问题下的回答
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    /**
     * 多对多  当前问题都在哪些收藏夹里
     */
    public function collects()
    {
        return $this->belongsToMany('\App\Collect', 'question_collect', 'question_id', 'collect_id');
    }

    
    /**
     * 问题关联的话题
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     *
     */
    public function saveToTag($topic_ids)
    {
        return $this->tags()->attach($topic_ids);
    }

    /**
     * 返回已登陆用户自己的回答
     * @param $answers
     * @param $id
     * @return mixed
     */
    public function filterAppointAnswers($answers, $id)
    {
        return $answers->filter(function ($item, $key) use ($id){
            return $item->id != $id;
        });
    }

    /**
     * 获取已登陆对该问题的回答，如果没有就返回false
     * @param $answers
     * @return bool|mixed
     */
    public function getLoggedAnswer($answers)
    {
        $user = Auth::user();
        if ($this->isSubscribedBy($user)) {
            return $this->getAnswer($answers, $user->id, 'User');
        }
        return false;
    }

    /**
     * 获取问题下的某个回答
     * @param $answers
     * @param string $id
     * @param string $type
     * @return mixed
     */
    public function getAnswer($answers, $id = '', $type = 'Answer')
    {
        return $answers->first(function ($item, $key) use ($id, $type) {
            if ($type == 'User') {
                return $item->user->id == $id;
            } else if ($type == 'Answer') {
                return $item->id == $id;
            }
        });
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

    /**
     * 判断当前登陆的用户是否回答了该问题
     * @return bool
     */
    public function isSubscribe()
    {
        $user = Auth::user();
        return $this->isSubscribedBy($user);
    }

    /**
     * 按点赞最多的回答排序，返回合集Collection
     * @return mixed
     */
    public function mostThumbAnswer()
    {
        return $this->hasMany('App\Answer')
                    ->get()
                    ->sortByDesc(function ($answer, $key) {
                        return $answer->countVote();
                    });
    }

    /**
     * 按评论最多的回答排序，返回合集Collection
     */
    public function mostCommentAnswer()
    {

    }

    /**
     * 按最新的时间排序回答，返回合集Collection
     * @return mixed
     */
    public function latestAnswer()
    {
        return $this->hasMany('App\Answer')->latest()->get();
    }

    /**
     * 按最早的时间排序回答，返回合集Collection
     * @return mixed Collection
     */
    public function oldestAnswer()
    {
        return $this->hasMany('App\Answer')->oldest()->get();
    }

    /**
     * 统计该问题总共的关注者
     * @return mixed
     */
    public function countFollow()
    {
        return $this->followers()->count();
    }

    /**
     * 统计该问题总共的回答数 
     */
    public function countAnswer()
    {
        return $this->answers()->count();
    }

    /**
     * 问题浏览量自增+1
     * @param $id
     * @return mixed 返回Quetion的实例
     */
    public static function findAndIncre($id)
    {
        $question = self::find($id);
        $question->visit_count += 1;
        $question->save();
        return $question;
    }
    
}
