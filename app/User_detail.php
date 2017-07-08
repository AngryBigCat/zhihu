<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_detail extends Model
{

    // 设置用户信息表的主键
    public $primaryKey = 'user_id';

    public $incrementing = false;

    public $fillable = ['user_id'];
}
