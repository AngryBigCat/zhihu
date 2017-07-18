<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台登录</title>
    <meta name="description" content="这是一个 index 页面" /> 
    <meta name="keywords" content="index" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <meta name="renderer" content="webkit" /> 
    <meta http-equiv="Cache-Control" content="no-siteapp" /> 
    <link rel="icon" type="image/png" href="/admins/i/favicon.png" /> 
    <link rel="apple-touch-icon-precomposed" href="/admins/i/app-icon72x72@2x.png" /> 
    <meta name="apple-mobile-web-app-title" content="Amaze UI" /> 
    <script src="/admins/js/echarts.min.js"></script> 
    <link rel="stylesheet" href="/admins/css/amazeui.min.css" /> 
    <link rel="stylesheet" href="/admins/css/amazeui.datatables.min.css" /> 
    <link rel="stylesheet" href="/admins/css/app.css" /> 
    <script src="/admins/js/jquery.min.js"></script> 
    <style type="text/css">
        .help-block strong{
            color: #4B5357;
        }
    </style>
</head>

<body data-type="login">
    <script src="/admins/js/theme.js"></script> 
    <div class="am-g tpl-g">
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-logo">
                </div>
                <form class="am-form tpl-form-line-form" action="{{ route('admin.dologin') }}" method="POST">
                    {{ csrf_field() }}
                    <span class="help-block ">
                        <strong>{{ Session::get('info') }}</strong>
                    </span>
                    <div class="am-form-group">
                        <input type="text" value="{{ old('email') }}" name="email" class="tpl-form-input" id="user-name" placeholder="请输入邮箱">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        
                    </div>
                    <div class="am-form-group">
                        <input type="password" name="password" class="tpl-form-input" id="user-name" placeholder="请输入密码">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" name="" type="checkbox">
                        <label for="remember-me">
                            记住密码
                        </label>
                    </div>
                    <div class="am-form-group">
                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/admins/js/amazeui.min.js"></script> 
    <script src="/admins/js/app.js"></script>  
</body>

</html>