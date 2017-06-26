<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">知乎</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">首页<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">发现</a></li>
                    <li><a href="#">话题</a></li>
                    <form class="navbar-form navbar-left" style=" width:600px;">
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" style="width:350px" placeholder="搜索你感兴趣的内容。。。">
                    </div>
                    <button type="submit" class="btn btn-default btn-info">提问</button>
                </form>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="fa fa-flag"></span> 通知</a></li>
                    <li><a href="#"><span class="fa fa-comments"></span> 消息</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            我的
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/user"><span class="fa fa-user"></span> 我的主页</a></li>
                            <li><a href="#"><span class="fa fa-cog"></span> 设置</a></li>
                            <li><a href="#"><span class="fa fa-power-off"></span> 退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    @yield('question-head')
</header>