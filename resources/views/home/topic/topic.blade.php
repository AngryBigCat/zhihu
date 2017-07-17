@extends('home.layouts.default')
@section('style')
	<style>
             .foot{
                color:#bbb;
                margin:100px 40px 0;
                border-top:1px solid #ccc;
                padding:20px 10px 80px;
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
      		height:32px;
      		/*border-bottom:1px solid #CCCCCC;*/
      		/*background:red;*/
      	}
      	.huati-tubiao {
      		float:left;
      		width:180px;
      	}
      	.huati-tubiao span {
      		font-size:15px;
      		color:#666666;
      		font-weight:bold;
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
      		height:60px;
      		
      	}
      	.huati-aa {
      		line-height:60px;
      		float:left;
      	}
      	.huati-aa a {
      		font-weight:bold;
      		color:#555555;
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
      		margin-top:20px;
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
      	.huati-Topicplaza {
      		width:270px;
      		height:144px;
      		border-radius:5px;
      		background:#EFF6FA;
      		text-align:center;
      		border:1px solid #CCE1EF;

      	}
      	.huati-tijiao {
      		margin-top:35px;
      	}
      	.huati-faxian {
      		margin-top:20px;
      	}
      	.huati-huanyihuan {
      		width:270px;
      		border-top:1px solid #DDDDDD;
      		margin-top:25px;
      	}
      	.huati-guanzhu {
      		width:270px;
      		height:22px;
      		margin-top:15px;
      	}
      	.huati-guanzhu-zuo {
      		float:left;
      		
      	}
      	.huati-guanzhu-zuo span {
      		font-size:14px;
      		color:#666666;
      		font-weight:bold;
      	}
      	.huati-guanzhu-you {
      		float:right;
      		
      	}
      	.huati-guanzhuneirong {
      		width:270px;
      		height:50px;
      		margin-top:5px;
      		line-height:50px;
      	}
      	.huati-guanzhuneirong-zuo {
      		float:left;
      	}
      	.huati-guanzhuneirong-zuo a {
      		color:#225599;
      		font-weight:bold;
      	}
      	.huati-guanzhuneirong-you {
      		float:right;
      	}
      	.huati-guanzhuneirong-you span {
      		font-weight:bold;
      	}
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
            .content{
                  width:380px;
            }
            .con-top{
                  padding:15px;
                  height:50px;
                  margin-bottom: 30px;
            }
            .con-img{
                  float:left;
            }
            .con-img img{
                  border-radius: 5px;
                  width:50px;
                  height:50px;
            }
            .con-name{
                  width:200px;
                  float:left;
                  margin-left:20px;
                  height:50px;
            }
            .con-name-info{
                  margin-top:5px;
            }
            .con-down{
                  height:75px;
                  padding:10px;
                  background: #fafafa;
            }
            .con-down-item{
                  text-decoration: none;
                  float: left;
                  padding: 0 16px;
                  border-right: 1px solid #eee;
            }
            .con-down-count a{
                  text-decoration: none;
            }
            .con-down-value{
                  display: block;
                  font-weight: bold;
                  text-align: center;
            }
            .con-down-key{
                  font-size: 14px;
                  color: #999;
            }
            .btn-follow{
                 margin-left:30px;
                 margin-top:7px;
            }
            .page{
                  margin-left:130px;
            }
            .biaoyanse{
                  color:red;
            }
	</style>
@endsection
@section('content')

	<div class="huati-topic">
            <div class="huati-content" >
                  <div class="huati-biaoti">
                        <!-- <img src="holder.js/16x16" class="biaoti-yangshi"> -->
                        <div class="huati-tubiao">
                              <i class="zg-icon zg-icon-feedlist"></i>
                              <span>已关注的话题动态</span>
                        </div>
                        <div class="huati-shuliang">
                              <a href="" class="huati-shula">共关注{{$count}}个话题</a>
                        </div>
                  </div>
                  <hr>
                  <!-- <br> -->
                  <div class="qiao">
                        <ul class="zm-topic-cat-main js-topic-cat-main clearfix" style="border-bottom:1px solid #CCCCCC;">
                              @foreach($tags as $value)
                              <li class="zm-topic-cat-item"><a href="/topic/{{$value->id}}">{{$value->tag_name}}</a></li>
                              @endforeach
                        </ul>
                  </div>
                  <!-- <hr> -->
                  <div class="tab-content">
                        <div class="tab-pane active" id="商业">
                              <div class="huati-paixu">
                                    <div class="huati-aa">
                                          <a href="/topicDetails/{{$id}}"  target="_blank"><img src="{{$img}}" style="width:50px;height:50px"></a>&nbsp;&nbsp;&nbsp;<a href="/topicDetails/{{$id}}"  target="_blank" >{{$tag_name}}</a>
                                    </div>
                                    <div class="huati-bb">
                                          <a href="/topic/{{$id}}"><span class="topicDetails">热门排序</span></a><span>&nbsp;|&nbsp;</span><a href="/topicTimeTag/{{$id}}"  class="topicTime">时间排序</a>
                                    </div>
                              </div>

                              <div class="clearfix"></div>
                                          <!-- 内容 -->
                              <div class="tab-content">
                                    <!-- <div role="tabpanel" class="tab-pane active" id="商业"> -->
                                    <!-- 内容 -->
                                     @foreach($res as $value)
                                          <div class="huati-neirong">
                                                <a href="" class="huati-content-a"  target="_blank">{{$value->title}}</a><br>
                                                <a href="" class="huati-content-b">
                                                {{$data[$value->id]['vote_count']}}
                                                </a>&nbsp;
                                                <a href="" class="huati-content-c"  target="_blank">{{$data[$value->id]['name']}}</a>&nbsp;&nbsp;
                                                <span class="huati-content-d">{{$data[$value->id]['a_word']}}</span>

                                                <div class="huati-wenzahng">
                                                      <img src="{{$data[$value->id]['img']}}" style="width:120px">
                                                      <div class="huati-wenzahng-a">
                                                      {{$data[$value->id]['content']}}
                                                            <p>&nbsp;&nbsp;<a href="">显示全部</a></p>
                                                      </div>
                                                </div>
                                                <div class="huati-wenzhang-lianjie">
                                                     <a style="cursor:pointer" class="Attention" >
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
                                    <!-- </div> -->
                              </div>
                        </div>
                  </div>
            </div>
      
            <div class="huati-guangchang">
                  <div class="huati-Topicplaza">
                        <a  href="/topicSquare/1" class="btn btn-primary huati-tijiao"  target="_blank">进入话题广场</a>
                        <div class="huati-faxian"><a href="/topicSquare/1"  target="_blank" >来这里发现更多的话题</a></div>
                  </div>
                  <div class="huati-huanyihuan">
                        <div class="huati-guanzhu">
                              <div class="huati-guanzhu-zuo"><span>其他人关注的话题</span></div>
                              <div class="huati-guanzhu-you"><a href=""></a></div>
                        </div>
                        <!-- 内容 -->
                        @foreach($huati as $v)
                        <div class="huati-guanzhuneirong">
                              <div class="huati-guanzhuneirong-zuo"><a href="/topicDetails/{{$v->id}}"  target="_blank" ><img src="{{$v->img}}" style="width:40px;height:40px"></a>&nbsp;&nbsp;&nbsp;<a href="/topicDetails/{{$v->id}}"  target="_blank" >{{$v->tag_name}}</a></div>
                              <div class="huati-guanzhuneirong-you"><a href=""><i class="z-icon-follow"></i><span class="topic-guanzhu" tag_id="{{$v->id}}">
                                     @if(in_array($v->id, $tag_ids))
                                    取消关注
                                    @else
                                    关注
                                    @endif
                              </span></a></div>
                        </div>
                         @endforeach
                  </div>
                  <div class="page">
                  {!!$huati->links() !!}
                  </div>
            </div>
      </div>



<div id="tan" class="content" style="display:none">
      <div class="con-top">
            <div class="con-img">
                  <a href=""><img src="/uploads/headPic/1499096092.png"></a>
            </div>
            <div class="con-name">
                  <a href="">名字</a>
                  <div class="con-name-info"><span>哈哈哈</span> | <span>嘻嘻嘻</span> </div>
            </div>
      </div>
      <div class="con-down">
            <div class="con-down-count">
                  <a class="con-down-item" href="">
                        <span class="con-down-value">34</span>
                        <span class="con-down-key">回答</span>
                  </a>
                  <a class="con-down-item" href="">
                        <span class="con-down-value">34</span>
                        <span class="con-down-key">文章</span>
                  </a>
                  <a class="con-down-item" href="">
                        <span class="con-down-value">34K</span>
                        <span class="con-down-key">关注者</span>
                  </a>
            </div>
            <div class="">
                  <button class="btn-follow btn btn-success">关注他</button>
            </div>
      </div>
</div>

@stop
@section('script')
	<script type="text/javascript">
            // $('.huati-content-c').mouseover(function() {
                 var con = $('#tan').clone(true).css('display','block');
                 $('.huati-content-c').pinwheel({content: con});
                 $.get('/');
            // });      
                 

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
            //关注问题
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

            //关注话题
            $('.topic-guanzhu').click(function() {

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

            $('.topicTime').click(function(){
                $(this).css('color','red');
            });
            $('.topicDetails').click(function(){
              $(this).css('color','red');
            });
	</script>
@endsection