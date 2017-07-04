<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>与世界分享你的知识、经验和见解</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/ban.js"></script>
    @yield('style')
    <style type="text/css">
        canvas{
            position:absolute;
            z-index:-1;
        }
    .login{
    	/* border:1px solid red; */
    	width:300px;
    	text-align: center;
        margin:60px auto;
    }
    h1{
    	font-size: 80px;
    	font-family: 微软雅黑;
    }
    form{
    	margin-top: 30px;
    }
    .error li{
        list-style: none;
    }
    </style>
</head>
<body>
    <canvas></canvas>
	<div class="login">
		<h1 class="text-primary">知乎</h1>
		<h4>与世界分享你的知识、经验和见解</h4>
		<br>
        @if (!empty(Session::get('info')))
            <div class="alert {{Session::get('info')=='success'? 'alert-success' : 'alert-danger'}} alert-dismissible error" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{Session::get('info')=='success' ? "恭喜您，注册成功，请登录！！" : Session::get('info')}}
        </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible error" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
		<big>
            <a href="{{ route('register') }}">注册</a>　
    		<a href="{{ route('login') }}">登录</a>
		</big>
        <br>
		 @yield('form')
	</div>
    <script src="/js/app.js"></script>
</body>
</html>