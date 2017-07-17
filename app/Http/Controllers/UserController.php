<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 切换关注用户
     * @param $id
     * @return mixed
     */
    public function toggleFollow($id)
    {
        $user = Auth::user();
        $target = User::find($id);
        return $user->toggleFollow($target);
    }

    /**
     * 获取用户粉丝
     * @param $id
     * @return array
     */
    public function getFollowersByAuthorID($id)
    {
        $user = User::find($id);
        if (!$user) {
            return [
                'msg' => $id.'此用户不存在'
            ];
        }
        return User::formatFollower($user->followers);
    }
}
