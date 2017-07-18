<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\User;
use App\User_detail;
use Hash;

class LoginController extends Controller
{
    /**
     * 后台首页
     */
    public function index()
    {
 
        return view('admin.index');
    }
    /**
     * 后台登录页面
     */
    public function login()
    {
        return view('admin.login.login');
    }

    /**
     * 后台登录检测
     */
    public function doLogin(AdminLoginRequest $request)
    {
        // 邮箱
        $email = $request->email;
        $user = User::where([
                ['email',$email],
                ['auth','1']
            ])->first();
        // 判断邮箱是否存在于数据库
        if (empty($user)) {
            return back()->with('info','用户不存在');
        }

        if (Hash::check($request->password, $user->password)) {
            Session(['uid' => $user->id]);
            return redirect('/admin');
        } else {
            return back()->with('info', '密码错误');
        }
    }

    // 注销登录
    public function logout(Request $request)
    {
        $request->session()->forget('uid');
        return redirect('admin/login');
    }

}
