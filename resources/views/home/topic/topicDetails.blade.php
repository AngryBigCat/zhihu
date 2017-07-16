@extends('home.layouts.default')
@section('style')
  <style>
      .foot{
        color:#bbb;
        padding-top:30px;

      }
      .foot a{
        color:#bbb;
      }
      .foot>ul{
        list-style: none;
        font-size: 12px;
      }
      .foot li{
        float: left;
        margin:0 10px;
      }
    .zm-topic-cat-main li {
      float: left;
      margin: 0 10px 10px 0;
      list-style: none;
    }
    li {
      display: list-item;
      text-align: -webkit-match-parent;
    }
    .zm-topic-cat-main .zm-topic-cat-item{
      display: block;
      padding: 0 10px;
      border-radius: 30px;
      text-decoration: none;
      border: 1px solid #daecf5;
      /*background:white;*/
      color:#259;

    }
     body {
      font-size:15px;
        background:#FFFFFF;
      }
      .huati-topic {
        width:960px;
        margin:0 auto;
      }
        .huati-content {
          width:631px;
          height:500px; 
          /*background:red;*/
          float:left;
          margin-top:10px;
        }
        .huati-guangchang {
          width:270px; 
          height:500px;     
          float:right;
          /*background:pink;*/
        }
        .huati-biaoti {
          width:631px;
          height:65px;
          border-bottom:1px solid #CCCCCC;
          /*background:red;*/
        }
        
        .huati-biaoti-zuo {
          margin-top:-5px;
          float:left;
        }
        .huati-biaoti-you {
          margin-left:10px;
          float:left;
          
        }
        .huati-biaoti-you h4 {
          color:#222222;
          font-weight:bold;
        }
        .huati-yinzi-title {
          margin-top:-10px;
        }
        .huati-yinzi-title a {

          font-size:15px;
          text-decoration:none;
        }
        .huati-fenxiang {
          float:right;
          margin-top:30px;
        }
        .huati-fenxiang a {
          color:#999999;
        }
        .biaoti-yangshi {
          float:left;
        }
        .huati-shuliang {
          float:right;
          width:90px;
        }
        .huati-shula {
           color:#999999;
           font-size:12px;
        }
        .huati-anniu {
          width:631px;
          height:61px;
      border-bottom:1px solid #EEEEEE;

        }
        .huati-ul {
          list-style-type:none;
        }
        .huati-li {

          height:24px;
      border-radius:35px;
      float:left;
      text-align:center;
      line-height:24px;
      border:1px solid #DAECF5;

        }
        .huati-li a {
          font-size:;
          color:#225599;
          text-decoration:none;
        }
        .huati-paixu {
          width:631px;
          height:10px;
          
        }
        
        
        .huati-bb {
          float:right;
          line-height:60px;
        }
        .huati-bb span {
          font-size:12px;
          color:#999999;
        }
        .huati-bb a {
          font-size:12px;
          color:#225599;
        }
        .huati-neirong {
          width:631px;
          height:216px;
          margin-top:0px;
          border-bottom:1px solid #EEEEEE;
        }
        .huati-content-a {
          font-size:15px;
          color:#225599;
          font-weight:bold;
        }
        .huati-content-b {
          font-size:13px;
          color:#225599;
          text-decoration:none;
        }
        .huati-content-c {
          ont-size:13px;
          text-decoration:none;
          color:#222222;
          font-weight:bold;
        }
        .huati-content-d {
          ont-size:13px;
          color:#B29999;
          text-decoration:none;
        }
        .huati-wenzahng {
          width:584px;
          height:120px;
          float:right;
          
        }
        .huati-wenzahng-a {
          width:377px;
          height:120px;
          float:right;
        }
        .huati-wenzahng-a p {
          color:#222222;
        }
        .huati-wenzahng-a p a {
          font-size:12px;
          color:#225599;
        }
        .huati-wenzhang-lianjie {
          width:584px;
          height:32px;
          float:right;
          line-height:32px;
          margin-top:10px;
        }
        .huati-wenzhang-lianjie a {
          color:#999999;
        }
        /*.huati-wenzhang-lianjie a span {
          font-weight:bold;
        }*/
        
        i[class^=z-icon-], i[class*=" z-icon-"] {
      display: inline-block;
      line-height: 10px;
      vertical-align: 0;
      background-image:url(/img/sprites.png);
      background-repeat: no-repeat;
      margin-right: 5px;
    }
    .z-icon-comment {
      width: 9px;
      height: 10px;
      background-position: -28px -22px;
    }
    .z-icon-follow {
      width: 8px;
      height: 9px;
      background-position: -97px -23px;
    }
    .zg-bull {
      padding: 0 3px;
      color: #BBB;
      font-family: Arial;
    }
    .zg-icon-feedlist {
      width: 16px;
      height: 16px;
      vertical-align: -4px;
      margin-right: 5px;
      background-position: -71px -88px;
    }
    .zg-icon{
    width: 16px;
      height: 16px;
      background-image: url(/img/sprites.png);
      background-repeat: no-repeat;
      display: inline-block;
      vertical-align: middle;
    }
    .z-icon-thank {
      width: 10px;
      height: 10px;
      background-position: -41px -22px;
    }
    i[class^=z-icon-], i[class*=" z-icon-"] {
      display: inline-block;
      line-height: 10px;
      vertical-align: 0;
      background-image: url(/img/sprites.png);
      background-repeat: no-repeat;
      margin-right: 5px;
    }
    .z-icon-share {
      width: 11px;
      height: 10px;
      background-position: -67px -22px;
    }
    .z-icon-collect {
      width: 7px;
      height: 10px;
      background-position: -56px -22px;
    }
    .bg-blue{
      background: #259;
    }
    .font-colorW{
      color: #fff;
    }
    .zm-topic-cat-item a{
      text-decoration: none;
      color:#259;
    }
        .Hidelink {
              display:none;
        }
        .guangchang-title {
          width:270px;
          height:80px;
          border-bottom:1px solid #EEEEEE;
        }
        .guangchang-guanli {
          width:270px;
          height:20px;
          margin-top:10px;
        }  
        .guangchang-guanli a {
          font-size:15px;
        }
        .gunagchang-miaoshu {
          width:270px;
          height:140px;
          
          border-bottom:1px solid #EEEEEE;
        }
        .gunagchang-miaoshu h4{
          color:#222222;
          font-weight:bold;
        }
        .gunagchang-miaoshu span{
          color:#222222;
          font-weight:bold;
        }
        .gunagchang-miaoshu p{
          color:#222222;
        }
        .gunagchang-miaoshu p{
          color:#222222;
          
        }
        .xiugai{
          color:#999999;
          font-size:12px;
        }
        .fahuati {
          width:270px;
          height:80px;
          border-bottom:1px solid #EEEEEE;
        }
        .fuhuati-title {
          margin-top:15px;
        }
        .fuhuati-title span {
          font-size:15px;
          color:#222222;
          font-weight:bold;
        }
        .fuhuati-content {
          margin-top:10px;
        }
        .zihuati-title {
          width:270px;
          height:195px;
          border-bottom:1px solid #EEEEEE;
        }
        .zihuati-title {
          margin-top:15px;
        }
        .zihuati-title span {
          font-size:15px;
          color:#222222;
          font-weight:bold;
        }
        .zihuati-content {
          width:270px;
          height:110px;
          
          margin-top:-165px;
        }
        .zihuati-lianjie {
          margin-top:10px;
        }
        .zihuati-lianjie a {
          font-size:12px;
        }
  </style>
@endsection
@section('content')
  <div class="huati-topic">
      <div class="huati-content" >
        <div class="huati-biaoti">
          <!-- <img src="holder.js/16x16" class="biaoti-yangshi"> -->
          <div class="huati-tubiao">
            <div class="huati-biaoti-zuo"><img src="{{$img}}" style="width:53px;height:60px"></div>
            <div class="huati-biaoti-you">
              <h4>{{$tag_name}}</h4><br>
              <div class="huati-yinzi-title">
                <a href="/topicDetails/{{$ids}}">动态</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="/topicRefined/{{$ids}}">精华</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="">等待回答</a>
              </div>
            </div>
            <div class="huati-fenxiang">
            <a href="./img/2017-07-11_092004.png"><img src="">分享</a>
            </div>
          </div>    
        </div>
        <div class="tab-content">
        
            <div class="huati-paixu">
                
                <div class="huati-bb">
                  <a href="/topicDetails/{{$ids}}">热门排序</a><span>&nbsp;|&nbsp;</span><a href="/topicTime/{{$ids}}">时间排序</a>
                </div>
              </div>

            <div class="clearfix"></div>
                <!-- 内容 -->
            <div class="tab-content">               
                 @foreach($res as $value)
                  <div class="huati-neirong">
                        <a href="" class="huati-content-a">{{$value->title}}</a><br>
                        <a href="" class="huati-content-b">{{$data[$value->id]['vote_count']}}</a>&nbsp;
                        <a href="" class="huati-content-c topicname">{{$data[$value->id]['name']}}</a>&nbsp;&nbsp;
                        <span class="huati-content-d">{{$data[$value->id]['a_word']}}</span>

                        <div class="huati-wenzahng">
                              <img src="{{$data[$value->id]['img']}}" style="width:120px">
                              <div class="huati-wenzahng-a">
                                    <p>{{$data[$value->id]['content']}}<a href="">显示全部</a></p>
                              </div>
                        </div>
                        <div class="huati-wenzhang-lianjie">
                              <a style="cursor:pointer">
                                  <i class="z-icon-follow"></i>
                                  <span class="follow_que" que_id="{{$value->id}}">
                                       @if(in_array($value->id, $question_ids))
                                        取消关注
                                        @else
                                        关注
                                        @endif
                                  </span>
                                  
                              </a>&nbsp;
                              <a href="">
                                    <i class="z-icon-comment"></i>
                                    <span>666条评论</span>
                                    <span></span>
                              </a>&nbsp;
                              <a href="" class="Hidelink">
                                    <i class="z-icon-thank"></i>
                                    <span>感谢</span>
                                    <span></span>
                              </a>&nbsp;
                              <a href="" class="Hidelink">
                                    <i class="z-icon-share"></i>
                                    <span>分享</span>
                                    <span></span>
                              </a>&nbsp;
                              <a href="" class="Hidelink">
                                    <i class="z-icon-collect"></i>
                                    <span>收藏</span>
                                    <span></span>
                              </a>
                              <a href="" class="Hidelink">
                                    <span class="zg-bull">•&nbsp;</span>
                                    <span>举报</span>
                                    <span></span>
                              </a>
                              <a href="">
                                    <span class="zg-bull">•&nbsp;</span>
                                    <span>禁止转载</span>
                                    <span></span>
                              </a>
                        </div>
                  </div>
                  @endforeach           
              </div>
          </div>

        </div>

      <div class="huati-guangchang">
          <div class="guangchang-title">
            <button type="button" class="btn btn-success" tag_id="{{$ids}}" >
            @if(in_array($ids, $tag_ids))
                  取消关注
                  @else
                  关注
                  @endif
            </button>&nbsp;&nbsp;
            <a href="">{{\App\Tag::find($ids)->followers()->count()}}</a><span>人关注了该话题</span>
            <div class="guangchang-guanli">
            <span>组织</span>&nbsp;&nbsp;·&nbsp;&nbsp;<span>管理</span>&nbsp;&nbsp;·&nbsp;&nbsp;<span>日志</span>
            </div>
          </div>

          <div class="gunagchang-miaoshu">
            <br><h4>描述</h4><br>
            <p>{{$description}}</p>
          </div>
          <!-- 父话题 -->
          <div class="fahuati">
            <div class="fuhuati-title"><span>父话题</span></div>
            <div class="fuhuati-content">
              <div class="qiao">
                <ul class="zm-topic-cat-main js-topic-cat-main clearfix">
                     
                  <li class="zm-topic-cat-item"><a href="/topicSquare/hot/">{{getTagNameByIds($pid)}}</a></li>
                       
                </ul>
              </div>
            </div>
          </div>
          <!-- 子话题 -->
          <div class="zihuati">
          <div class="zihuati-title"><span>子话题</span></div>
            <div class="zihuati-content">
              <div class="qiao">
                <ul class="zm-topic-cat-main js-topic-cat-main clearfix">
                  @foreach($sonTag as $v)    
                  <li class="zm-topic-cat-item"><a href="/topicSquare/hot/{{$v->id}}">{{ $v->tag_name }}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="zihuati-lianjie"><span>在这个话题下面共有{{$numsonTag}}个子话题</span></div>
          </div>
          <div>
           @include('home.layouts._footer')
          </div>
      </div>
  </div>
@stop
@section('script')
  <script type="text/javascript">
            $('.huati-tijiao').click(function(){
                 console.log(222);
            });
            $('.huati-neirong').each(function() {
                  var th = $(this);
                  $(this).hover(
                        function () {
                              th.find('.Hidelink').css('display','inline-block');
                        },
                        function () {
                              th.find('.Hidelink').css('display','none');
                        }
                  );

            });
          $('.zm-topic-cat-main li').click(function () {
            $(this).siblings().find('a').css('color','#259');
            $(this).siblings().css('background','#fff');
            $(this).css('background','#259');
            $(this).find('a').css('color','#fff');

          });

          $.ajaxSetup({
             headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
          });
          //关注话题
          $('.btn-success').click(function() {

            var tag_id = $(this).attr('tag_id');
            var th = $(this);
            $.ajax({
                    url: "/ajaxd",
                    type: 'GET',
                    data: { date :tag_id },
                    dataType: 'json',
                    success: function (data) {
                        th.html(data.msg);
                        // console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
                return false;
          }); 
          // 关注问题
          $('.follow_que').click(function() {
                  // alert($);ss
                  var que_id = $(this).attr('que_id');

                  var th = $(this);
                  $.ajax({
                        url: "/ajaxs",
                        type: 'POST',
                        data: { data :que_id, '_token':'{{ csrf_token() }}' },
                        dataType: 'json',
                        success: function (data) {
                            th.html(data.msg);
                        },
                        error: function (data) {
                            alert('error');
                        }
                  });
            });
  </script>
@endsection