@extends('home.layouts.default')
@section('style')
    <style>
        .foot {
            color: #bbb;
            margin: 100px 40px 0;
            border-top: 1px solid #ccc;
            padding: 20px 10px 80px;
        }

        .foot a {
            color: #bbb;
        }

        .foot > ul {
            list-style: none;
            font-size: 12px;
        }

        .foot li {
            float: left;
            margin: 0 10px;
        }

        body {
            font-size: 15px;
            background: #FFFFFF;
        }

        .huati-topic {
            width: 960px;
            margin: 0 auto;
        }

        .huati-content {
            width: 631px;
            /*height:500px; */
            /*background:red;*/
            float: left;
            margin-top: 0px;
        }

        .huati-guangchang {
            width: 270px;
            height: 500px;
            float: right;
            /*background:pink;*/
        }

        .huati-biaoti {
            width: 631px;
            height: 32px;
            border-bottom: 1px solid #CCCCCC;
            /*background:red;*/
        }

        .huati-tubiao {
            float: left;
            width: 180px;
        }

        .huati-tubiao span {
            font-size: 14px;
            color: #666666;
            font-weight: bold;
        }

        .huati-lianjie {
            width: 631px;
            height: 185px;
            position: relative;

        }

        .huati-lianjie-a {
            position: absolute;
            width: 260px;
            height: 35px;
            margin-left: 185px;
            margin-top: 75px;
            line-height: 35px;
            text-align: center;
            border-radius: 5px;
            background: #EFF6FA;
            /*border:1px solid red;*/
        }

        .huati-lianjie-a a {
        }

        .huati-neirong {
            width: 631px;
            height: 900px;
            border-radius: 5px;
            border: 1px solid #DDDDDD;
            /*background:pink;*/
        }

        .huati-yinzi {
            width: 631px;
            height: 37px;
            line-height: 37px;
            /*background:yellow;*/
            border-bottom: 1px solid #DDDDDD;

        }

        .huati-yinzi span {
            font-size: 14px;
            font-weight: bold;
            color: #666666;

        }

        .huati-guanzhu {
            width: 602px;
            height: 135px;
            margin: 0 auto;
            margin-top: 10px;
            /*background:blue;*/
        }

        .huati-guanzhu-a {
            float: left;
        }

        .huati-guanzhu-wenzi {
            width: 538px;
            height: 140px;
            float: left;
            margin-left: 10px;
        }

        .huati-guanzhu-wenzi span {
            font-size: 14px;
            color: #222222;
            font-weight: bold;

        }

        .huati-guanzhu-b {
            height: 23px;
            float: left;
        }

        .huati-guanzhu-c {
            height: 23px;
            float: right;
        }

        .huati-dianji {
            width: 78px;
            line-height: 18px;
            font-size: 10px;
            height: 23px;
        }

        .btn-success {
            width: 77px;
            height: 21px;

        }

        .huati-guanzhu-d {
            margin-top: 7px;
            float: left;
            width: 538px;
            height: 22px;
        }

        .huati-guanzhu-d a {
            font-size: 14px;
            color: #225599;

        }

        .huati-Topicplaza {
            width: 270px;
            height: 140px;
            border-radius: 5px;
            background: #EFF6FA;
            text-align: center;
        }

        .huati-guangc {
            margin-top: 35px;

        }

        .huati-faxian {
            margin-top: 20px;

        }

        .newtag {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="huati-topic">
        <div class="huati-content">
            <!-- 头部 -->
            <div class="huati-biaoti">
                <!-- <img src="holder.js/16x16" class="biaoti-yangshi"> -->
                <div class="huati-tubiao">
                    <i class="zg-icon zg-icon-feedlist"></i>
                    <span>已关注的话题动态</span>
                </div>
            </div>
            <div class="huati-lianjie">
                <div class="huati-lianjie-a newtag">
                    <a href="">您有<span class="count">{{$count}}</span>新话题,请点击查看</a>
                </div>
            </div>
            <!-- 内容 -->
            <div class="huati-neirong">
                <div class="huati-yinzi"><span>&nbsp;&nbsp;&nbsp;其他人关注的话题</span></div>
                @foreach($tags as $k=>$v)
                    <div class="huati-guanzhu">
                        <div class="huati-guanzhu-a"><a href="/topicDetails/{{$v->id}}" target="_blank"><img
                                        src="{{$v->img}}" style="width:50px;height:50px"></a></div>
                        <div class="huati-guanzhu-wenzi">
                            <div class="huati-guanzhu-b"><span><a href="/topicDetails/{{$v->id}}"
                                                                  target="_blank">{{$v->tag_name}}</a></span></div>
                            <div class="huati-guanzhu-c">
                                <a href="#" class="btn btn-primary btn-xs huati-dianji" tag_id="{{$v->id}}">
                                    @if(in_array($v->id,$tag_ids))
                                        取消关注
                                    @else
                                        关注
                                    @endif
                                </a>
                            </div>
                            @for ($i = 0; $i < 3; $i++)
                                <div class="huati-guanzhu-d">
                                    <a href="" target="_blank">{{$v->question[$i]->title}}</a>
                                </div>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="huati-guangchang">
            <div class="huati-Topicplaza">
                <a href="/topicSquare/1" class="btn btn-primary huati-guangc" target="_blank">进入话题广场</a>
                <div class="huati-faxian"><a href="/topicSquare/1" target="_blank">来这里发现更多的话题</a></div>
            </div>
        </div>
    </div>
    @include('home.layouts._footer')
@stop
@section('script')
    <script type="text/javascript">
        //关注话题
        $('.huati-dianji').click(function () {

            var tag_id = $(this).attr('tag_id');
            var th = $(this);
            $.ajax({
                url: "/ajaxd",
                type: 'GET',
                data: {date: tag_id},
                dataType: 'json',
                success: function (data) {

                    th.html(data.msg);
                    var newtag = $('.newtag');
                    var count = $('.count');
                    var tt = parseInt($('.count').html());
                    if (data.status == '1') {
                        count.html(tt + 1);
                        if (count.html() > '0') {
                            newtag.css('display', 'block');
                        }
                    } else {
                        count.html(tt - 1);
                        if (count.html() == '0') {
                            newtag.css('display', 'none');
                        }
                    }

                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    </script>
@endsection