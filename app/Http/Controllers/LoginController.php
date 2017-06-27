<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Users;
use Hash;

class LoginController extends Controller
{
	public function login()
	{
		return view('home.session.login');
	}

	public function doLogin(LoginRequest $request)
	{

		//获取用户名
        $email = $request->email;
        //读取数据库
        $user = Users::where('email',$email)->first();
        //判断
        if(empty($user)) {
            return back()->with('info','用户邮箱不存在');
        }
        //检测密码
        if(Hash::check($request->password, $user->password)) {
            //写入session
            session(['id' => $user->id]);

            return redirect('/')->with('info','登陆成功');
        }else{
            return back()->with('info','密码错误');
        }
	}
}
