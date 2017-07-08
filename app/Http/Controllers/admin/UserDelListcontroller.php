<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\User_detail;

class UserDelListcontroller extends Controller
{
    /**
     * 软删除列表
     */
    public function delList(Request $request)
    {
        $keywords = $request->keywords;
        $users =User::onlyTrashed()
        ->where(function($query)use($keywords){
            if (!empty($keywords)) {
                    $query->where('name','like','%'.$keywords.'%');
                }
            })
        ->paginate($request->input('num',10));
        return view('admin.user.deletelist', ['users'=>$users, 'data'=>$request->all()]);
    }

    /**
     * 恢复软删除数据
     */
    public function reUser($id)
    {
        $user =User::onlyTrashed()->where('id', $id)->first();
        if ($user->restore()) {
            return back()->with('info','恢复成功');
        } else {
            return back()->with('info','恢复失败');
        }
    }

    /**
     * 永久删除模型数据
     */
    public function delUser($id)
    {   
        $user =User::onlyTrashed()->where('id', $id)->first();
        if ($user->forceDelete()) {
            return back()->with('info','删除成功');
        } else {
            return back()->with('info','删除失败');
        }
    }

}
