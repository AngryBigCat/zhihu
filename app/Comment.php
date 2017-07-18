<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'content'];

    /**
     * 关联用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 创建回答下的评论
     * @param $data
     * @param $id
     * @return mixed
     */
    public static function createComment($input, $id, $type)
    {
        $data = $input;
        $data['commentable_id'] = $id;
        $data['commentable_type'] = $type;
        $data['user_id'] = Auth::user()->id;
        return self::create($data);
    }

    /**
     * @param $comment
     * @return array
     */
    public static function formatData($comment)
    {
        $data = [
            'id' => $comment->id,
            'user_id' => $comment->user->id,
            'name' => $comment->user->name,
            'content' => $comment->content,
            'time' => $comment->created_at->diffForHumans(),
        ];
        return $data;
    }

    /**
     * 过滤返回评论的数据
     * @param $comments
     * @return mixed
     */
    public static function filterData($comments)
    {
        $filtered = $comments->map(function ($comment) {
            return [
                'id' => $comment->id,
                'content' => $comment->content,
                'time' => $comment->created_at->diffForHumans(),
                'name' => $comment->user->name,
                'user_id' => $comment->user->id
            ];
        });
        return $filtered;
    }
}
