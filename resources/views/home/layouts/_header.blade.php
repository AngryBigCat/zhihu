<header>
    <nav class="header navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">首页<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">发现</a></li>
                    <li><a href="/topic/{{$id or 1}}">话题</a></li>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索你感兴趣的内容。。。">
                        </div>
                        <button type="submit" class="btn btn-default">提问</button>
                    </form>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">登陆</a></li>
                        <li><a href="{{ route('register') }}">注册</a></li>
                    @else
                        <li><a href="#"><span class="fa fa-flag"></span> 通知</a></li>
                        <li><a href="#"><span class="fa fa-comments"></span> 消息</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                我的
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('people.act') }}"><span class="fa fa-user"></span> 我的主页</a></li>
                                <li><a href="#"><span class="fa fa-cog"></span> 设置</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="fa fa-power-off"></span> 退出
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <!-- 快闪提示框 -->
        <!-- <div class="alert-info-box alert"></div> -->
    </nav>
    @yield('question-head')
</header>