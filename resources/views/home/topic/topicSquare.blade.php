@extends('home.layouts.default')

@section('style')
	<style type="text/css">
	body {
		background:#FFFFFF;
	}
	.guangchang {
		width:960px;
		margin:0 auto;
	}
	.guangchang-zuo {
		
		width:630px;
		float:left;
	}
	.guangchang-you {
		width:270px;
		height:500px;
	
		float:right;
	}
	.guangchang-title {
		width:630px;
		height:50px;
		padding:10px;
		
		border-bottom:1px solid #CCCCCC;
	}
	.guangchang-title-zuo {
		float:left;
	}
	
	.guangchang-size {
		color:#666666;
		font-size: 15px;
		font-weight:bold;
	}

	.guangchang-title-you {
		float:right;
	}
	.guangchang-title-you a {
		font-size:12px;
		color:#999999;
	}
	.guangchang-fenlei {
		width:630px;
		border-bottom:1px solid #EEEEEE;
	}
	.zm-topic-cat-main li {
		  float: left;
		  margin: 15px 10px 15px 0;
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
		.zm-topic-cat-main a {
			font-size:15px;
			color:#225599;
			text-decoration:none;
		}
		.guangchang-neirong {
			width:630px;
			height:196px;
		}
		.guangchang-neirong-zuo {
			width:315px;
			height:104px;
		
			float:left;
		}
		.guangchang-neirong-you {
			width:315px;
			height:104px;
			
			float:right;
		}
		.guangchang-content-zuo {
			width:300px;
			height:65px;
			
			margin-top:20px;
		}
		.guangchang-content-you {
			float:right;
			width:300px;
			height:64px;
			
			margin-top:20px;
		}
		.guangchang-img {
			width:50px;
			height:50px;
			float:left;
		}
		.guabgchang-wenzi {
			width:240px;
			height:64px;
			/*background:blue;*/
			float:right;
		}
		.guangchang-content-a {
			float:left;
		}
		.guangchang-content-b {
			float:right;
		}
		.guangchang-content-a a {
			font-size:14px;
			font-weight: 700;
			color:#225599;
		}
		.guangchang-content-b a {
			font-size:14px;
			color:#698EBF;
		}
		.guangchang-content-wenzi {
			width:240px;
			height:40px;
			margin-top:26px;
			
		}
		.guangchang-content-wenzi p {
			font-size:13px;
		}
		.guangchang-you-title {
			width:270px;
			height:40px;
			
			margin-top:10px;
			
		}
		.guangchang-you-title span {
			font-size:15px;
			font-weight: 700;
			color:#666666;
		}
		.guangchang-you-neirong {
			width:270px;
			height:105px;
			border-bottom:1px solid #EEEEEE;
		}
		.guangchang-you-img {
			float:left;
		}
		.guangchang-you-biaoti {
			width:150px;
			height:20px;
			padding-left:10px;
			float:left;
		}
		.guangchang-you-biaoti a{
			
			font-size:14px;
			color:#225599;
		}
		.guangchang-you-shuliang {
			width:100px;
			height:20px;
			padding-left:15px;
			width:100px;
			float:left;
		}
		.guangchang-you-shuliang span {
			font-size:14px;
			color:#999999;
		}
		.guangchang-you-miaoshu {
			float:left;
			width:270px;
			height:50px;
			margin-top:5px;
			
		}
		.guangchang-you-miaoshu a {
			font-size:14px;
			color:#225599;
		}
		i[class^=z-icon-], i[class*=" z-icon-"] {
		  display: inline-block;
		  line-height: 10px;
		  vertical-align: 0;
		  background-image:url(/img/sprites.png);
		  background-repeat: no-repeat;
		  margin-right: 5px;
		}
		
		.z-icon-follow {
		  width: 8px;
		  height: 9px;
		  background-position: -97px -23px;
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
		.zg-icon-topic-square {
		  background-position: -50px -88px;
		}
		.follow_tag{
			cursor: pointer;
		}
	</style>
@endsection

@section('content')
		<div class="guangchang">
			<div class="guangchang-zuo">
				<div class="guangchang-title">
					<div class="guangchang-title-zuo">
						<i class="zg-icon zg-icon-topic-square"></i>
						<span class="guangchang-size">话题广场</span>
					</div>
					<div class="guangchang-title-you">
					<a href="" class="guangchang-shula">已关注{{$count}}个话题</a>
					</div>
				</div>

				<div class="guangchang-fenlei">
					<ul class="zm-topic-cat-main js-topic-cat-main clearfix" >
                    @foreach($tag as $key=>$value)
						<li class="zm-topic-cat-item">
							<a href="/topicSquare/{{$value->id}}">{{$value->tag_name}}</a>
						</li> 
					@endforeach      
					</ul>
				</div>
				<!-- 内容 -->
				<div class="guangchang-neirong">
					<!-- 父话题 -->
					@foreach($ids as $k=>$v)
					<div class="guangchang-neirong-zuo">
						<div class="guangchang-content-zuo">
							<div class="guangchang-img"><a href="/topicDetails/{{$v->id}}"  target="_blank" ><img src="{{$v->img}}" style="width:50px;height:50px"></a></div>
							<div class="guabgchang-wenzi">
								<div class="guangchang-content-a"><a href="/topicDetails/{{$v->id}}"  target="_blank" >{{$v->tag_name}}</a></div>
								<div class="guangchang-content-b"><i class="z-icon-follow"></i><span class="follow_tag" tag_id="{{$v->id}}" >
									@if(in_array($v->id, $tag_ids))
									取消关注
									@else
									关注
									@endif
								</span></div>
								<div class="guangchang-content-wenzi"><p>{{$v->description}}</p></div>
							</div>
						</div>
					</div>
					@endforeach 

					<!-- 子话题 -->
					@foreach($sonTag as $k=>$v)
					<div class="guangchang-neirong-zuo">
						<div class="guangchang-content-zuo">
							<div class="guangchang-img"><a href="/topicDetails/{{$v->id}}"  target="_blank" ><img src="{{$v->img}}" style="width:50px;height:50px"></a></div>
							<div class="guabgchang-wenzi">
								<div class="guangchang-content-a"><a href="/topicDetails/{{$v->id}}"  target="_blank" >{{$v->tag_name}}</a></div>
								<div class="guangchang-content-b"><i class="z-icon-follow"></i><span class="follow_tag" tag_id="{{$v->id}}" >
									@if(in_array($v->id, $tag_ids))
									取消关注
									@else
									关注
									@endif
								</span></div>
								<div class="guangchang-content-wenzi"><p>{{$v->description}}</p></div>
							</div>
						</div>
					</div>
					@endforeach 
				</div>
			</div>
			<div class="guangchang-you">
				<div class="guangchang-you-title"><span>热门话题</span></div>
				<!-- 内容 -->
				@foreach($hotTopic1 as $k=>$v)
				<div class="guangchang-you-neirong">
					<div class="">
						<div class="guangchang-you-img"><a href="/topicDetails/{{$v->id}}" target="_blank"><img src="{{$v->img}}" style="border-radius:5px;width:50px; height:50px"></a></div><div class="guangchang-you-biaoti"><a href="/topicDetails/{{$v->id}}" target="_blank">{{$v->tag_name}}</a></div>
						<div class="guangchang-you-shuliang"><span>{{\App\Tag::find($v->id)->followers()->count()}}人关注</span></div>
					</div>
				<div class="guangchang-you-miaoshu"><a href="" target="_blank">{{$v->question->first()->title }}</a></div>
				</div>
				<br>
				@endforeach 
			</div>
		</div>
@stop
@section('script')
	<script type="text/javascript">
		$('.zm-topic-cat-main li').click(function () {
			$(this).siblings().find('a').css('color','#259');
			$(this).siblings().css('background','#fff');
			$(this).css('background','#259');
			$(this).find('a').css('color','#fff');

		});

		$.ajaxSetup({
       		 headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    	});
		{{-- 关注 --}}
		$('.follow_tag').click(function() {

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
	</script>
@endsection