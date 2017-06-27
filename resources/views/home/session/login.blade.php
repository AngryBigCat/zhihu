@extends('home.layouts.session')

@section('style')
<style>
    #left {
    	float:left;
    }
    #right {
    	float: right;
    }
</style>
@stop

@section('form')
<form class="form-horizontal" method="post" action="doLogin">
	<input type="text" name="email" class="form-control" placeholder="手机号或邮箱" required>
	<input type="password" name="password" class="form-control" placeholder="密码" required>
	{{csrf_field()}}
	<br>
	<button class="form-control btn btn-primary">登录知乎</button>
</form>
<br><br>
<a href="" class="text-left" id="left">手机验证码登录</a>
<span class="text-right" href="#" id="right">无法登录？</span>
<br><br>
<span class="btn ">社交帐号登录</span>
	<span id="hzy_fast_login"><a href="http://open.51094.com/user/hezuo/1.html?appid=1545454173a186&amp;token=f135e629656417fe159e0de2f8c430a9" class="open_login_1" style="margin: 9px 3px;"><img src="http://open.51094.com/Public/img/hezuo/hz_1_48.jpg" style="max-width: 40px; max-height: 40px; border-radius: 8px;"></a><a href="http://open.51094.com/user/hezuo/8.html?appid=1545454173a186&amp;token=f135e629656417fe159e0de2f8c430a9" class="open_login_8" style="margin: 9px 3px;"><img src="http://open.51094.com/Public/img/hezuo/hz_8_48.jpg" style="max-width: 40px; max-height: 40px; border-radius: 8px;"></a><a href="http://open.51094.com/user/hezuo/9.html?appid=1545454173a186&amp;token=f135e629656417fe159e0de2f8c430a9" class="open_login_9" style="margin: 9px 3px;"><img src="http://open.51094.com/Public/img/hezuo/hz_9_48.jpg" style="max-width: 40px; max-height: 40px; border-radius: 8px;"></a><a href="http://open.51094.com/user/hezuo/2.html?appid=1545454173a186&amp;token=f135e629656417fe159e0de2f8c430a9" class="open_login_2" style="margin: 9px 3px;"><img src="http://open.51094.com/Public/img/hezuo/hz_2_48.jpg" style="max-width: 40px; max-height: 40px; border-radius: 8px;"></a></span>
	<!-- <script src="http://open.51094.com/user/myscript/1545454173a186.html"></script> -->
@stop
