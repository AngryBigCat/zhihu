@extends('home.layouts.default')
@section('style')
    <style>
        body {
            background-color: #FFFFFF;
        }

        .user-topic {
            height: 200px;
            border-bottom: 1px solid #EEEEEE;
        }

        a {
            font-size: 16px;
            color: #225599;
        }

        span {
            font-weight: bold;
            font-size: 16px;
            color: #222222;
        }

        p {
            font-size: 16px;
            color: #999999;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <!--选项-->
        @include('home.settings._toggle')

        <!--屏蔽话题设置-->
        <div class="user-topic">
            <br><span>屏蔽话题设置</span><br><br>
            <p>在个人首页动态中屏蔽来自特定话题的内容</p><br>
            <div class="form-group" style="width:200px">
                <input type="text" class="form-control" placeholder="搜索话题"/>
            </div>

        </div>
        <div class="clearfix"></div>

        <!--受限设置-->
        <div class="user-topic">
            <br><span>受限设置</span><br><br>
            <p>除非主动关注，来自以下话题和它们的部分子话题的内容不会出现在你的首页动态中。</p>
            <p>详情参见
                <a href="" style="font-size:14px">知乎上的哪些内容需要主动关注才会出现在首页动态中？</a>
            </p>
            <div>
                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                        data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    知乎社区
                </button>&nbsp;

                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                        data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    成人内容
                </button>&nbsp;

                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                        data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    个人咨询
                </button>&nbsp;

                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                        data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    感情
                </button>&nbsp;

                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                        data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    调查类问题
                </button>&nbsp;

                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover"
                        data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                    钓鱼岛(广义的)
                </button>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="user-topic">
            <br><span>屏蔽专栏设置</span><br><br>
            <p>在个人首页动态中屏蔽来自特定用户的内容</p><br>
            <div><span style="font-weight:normal">还没有没屏蔽的专栏</span></div>
        </div>
        <div class="clearfix"></div>

        <div class="user-topic">
            <br><span>屏蔽用户设置</span><br><br>
            <p>在个人首页动态中屏蔽来自特定用户的内容</p><br>
            <div><span style="font-weight:normal">请在用户个人页面将其添加到屏蔽列表。</span></div>
        </div>
        <div class="clearfix"></div>

    </div>

@endsection