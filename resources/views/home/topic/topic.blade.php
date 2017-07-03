@extends('home.layouts.default')
@section('style')
	<style>
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
	</style>
@endsection
@section('content')
	<div class="col-md-8" >
		<div class="huati-biaoti">
			<!-- <img src="holder.js/16x16" class="biaoti-yangshi"> -->
			<div class="huati-tubiao">
				<i class="zg-icon zg-icon-feedlist"></i>
				<span>已关注的话题动态</span>
			</div>
			<div class="huati-shuliang">
				<a href="" class="huati-shula">共关注6个话题</a>
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
			  			<img src="{{$qiao}}" style="width:50px">&nbsp;&nbsp;&nbsp;<a href="">{{$jin}}</a>
			  		</div>
			  		<div class="huati-bb">
			  			<span>热门排序&nbsp;|&nbsp;</span><a href="">时间排序</a>
			  		</div>
			  	</div>

				<div class="clearfix"></div>
						<!-- 内容 -->
				<div class="tab-content">
                              <!-- <div role="tabpanel" class="tab-pane active" id="商业"> -->
                              <!-- 内容 -->
                               @foreach($question as $value)
                                    <div class="huati-neirong">
                                          <a href="" class="huati-content-a">{{$value->title}}</a><br>
                                          <a href="" class="huati-content-b">{{$value->count}}</a>&nbsp;
                                          <a href="" class="huati-content-c">Monsieur</a>&nbsp;&nbsp;
                                          <span class="huati-content-d">法国攻城师/VBA/Exec:poisonxiu</span>

                                          <div class="huati-wenzahng">
                                                <img src="{{$value->qs_img}}" style="width:120px">
                                                <div class="huati-wenzahng-a">
                                                      <p>{{$value->content}}<a href="">显示全部</a></p>
                                                </div>
                                          </div>
                                          <div class="huati-wenzhang-lianjie">
                                                <a href="">
                                                      <i class="z-icon-follow"></i>
                                                      <span>关注问题</span>
                                                      <span></span>
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
	<div class="col-md-4">
		<div class="huati-guangchang">
			<div class="huati-Topicplaza">
				<button class="btn btn-primary huati-tijiao">进入话题广场</button>
				<div class="huati-faxian"><a href="">来这里发现更多的话题</a></div>
			</div>
			<div class="huati-huanyihuan">
				<div class="huati-guanzhu">
					<div class="huati-guanzhu-zuo"><span>其他人关注的话题</span></div>
					<div class="huati-guanzhu-you"><a href="">换一换</a></div>
				</div>
				<!-- 内容 -->
				<div class="huati-guanzhuneirong">
					<div class="huati-guanzhuneirong-zuo"><img src="holder.js/40x40">&nbsp;&nbsp;&nbsp;<a href="">略读</a></div>
					<div class="huati-guanzhuneirong-you"><a href=""><i class="z-icon-follow"></i><span>关注</span></a></div>
				</div>
				<div class="huati-guanzhuneirong">
					<div class="huati-guanzhuneirong-zuo"><img src="holder.js/40x40">&nbsp;&nbsp;&nbsp;<a href="">略读</a></div>
					<div class="huati-guanzhuneirong-you"><a href=""><i class="z-icon-follow"></i><span>关注</span></a></div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('js')
	<script type="text/javascript">
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

	</script>
@endsection