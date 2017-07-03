@extends('home.layouts.default')

@section('style')
	@include('home.found.style')
@stop

@section('content')

<div class="container">
	{{-- 发现页面左半部分 --}}
	<div class="col-md-8">
		<div id="tuijian" class="">
			<div class="pull-left">
			<i class="fa fa-outdent" aria-hidden="true"></i>
			<span>编辑推荐</span>
			</div>
			<div class="pull-right">
			<a href="{{route('found/more')}}">更多推荐<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
		</div>
		{{-- 发现页面标题部分 --}}

		<div id="wenda" class="clearfix">
			@foreach($questions as $v)
			<div>
				<a href="#"><h5>{{$v->title}}</h5></a>
				<div class="media">
				  <div class="media-left">
				    <a href="#">
				      <img class="media-object" src="{{$v->headpic}}" alt="..." width="40px">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><a href="">{{$v->name}}，</a><span>{{$v->job}}，{{$v->introduction}}</span></h4>
				    <div>
					    <a href="#" class="pull-left">
					      <img class="media-object" src="{{$v->qs_img}}" alt="..." width="200px">
					    </a>
						<span class="pull-right">
							{{$v->content}}
						</span>
				    </div>
				  </div>
				</div>							
			</div>
			@endforeach
			@foreach($titles as $v)
			<div>
				<a href="#"><h5>{{$v->title}}</h5></a>
			</div>
			@endforeach
		</div>
		{{-- 发现页面热推部分 --}}
		
		@include('home.found._retui')
	</div>
	{{-- 发现页面右半部分 --}}
		@include('home.found._right')
</div>
<ul class="ul_tan" style="display: none">
	<li class="tan">
		<div class="pull-left">
			<img src="/img/avatar2.png" alt="" width="30px" height="30px">
		</div>
		<div class="pull-right">
			<div><a href="#">山之阳</a></div>
			<div>有理有据，令人信服</div>
			<div class="ca">
				<div class="pull-left" >
					<span> 10小时前 </span>
					<div class="tan_hide">
						<a><i class="fa fa-reply" aria-hidden="true"></i> 回复 </a>
						<a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 赞 </a>
						<a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 踩 </a>
						<a><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 举报 </a>
					</div>
				</div>
				<div class="pull-right" data-toggle="tooltip" data-placement="bottom" title="29人觉得这个很赞">29 赞</div>
			</div>
		</div>
	</li>
</ul>

@stop
@section('js')
	<script>
		$('#myModal').on('shown.bs.modal', function () {
		  	$('#myInput').focus()
		})
		{{-- 热推下的内容的字数限制 --}}
	    //限制字符个数
	    $("p").each(function(){
	        var maxwidth=180;
	        if($(this).text().length>maxwidth){
	            $(this).text($(this).text().substring(0,maxwidth));
	            $(this).html($(this).html()+'......');
	        }
	    });

		{{-- 热推下的操作栏 --}}
		$('.lizi').each(function () {
			var th = $(this);
			$(this).hover(
				function () {	
					th.find('.lizi_hide').css('display','inline-block');
				}, 
				function () {
					th.find('.lizi_hide').css('display','none');
				}
			);
		});
		
		{{-- 热推下的操作拦下的感谢 --}}
		$('.thank').each(function () {
			var xin = $(this).find('i');
			$(this).hover(
				function () {
					xin.removeClass("fa-heart-o");
					xin.addClass("fa-heart");
				},
				function(){
					xin.removeClass("fa-heart");
					xin.addClass("fa-heart-o");
				});
		});

		{{-- 热推下的操作拦下的关注 --}}
		$('.attent').each(function(){
			var qu = $(this);
			qu.hover(
				function () {
					qu.html('取消关注');
				},
				function () {
					qu.html('<i class="fa fa-plus" aria-hidden="true"></i> 关注问题');
				});
		});

		{{-- 热推下的操作拦下的无帮助 --}}
		$('.no_help').each(function () {
			var no = $(this);
			no.click(function () {
				if (no.text() == '没有帮助') {
					no.text('取消没有帮助');
				}else{
				  	no.text('没有帮助');
				}
				// alert(no.text());
			});
		});

		{{-- 热推下的评论下的弹框 --}}
		$('.comment').each(function () {
			var com = $(this);
			com.click(function () {
				com.popover({
					html:true,
					placement:"bottom",
					content:'<ul class="ul_tan"> <li class="tan"> <div class="pull-left"> <img src="/img/avatar2.png" alt="" width="30px" height="30px"> </div> <div class="pull-right"> <div><a href="#">山之阳</a></div> <div>有理有据，令人信服</div> <div class="ca"> <div class="pull-left" > <span> 10小时前 </span> <div class="tan_hide"> <a><i class="fa fa-reply" aria-hidden="true"></i> 回复 </a> <a><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 赞 </a> <a><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 踩 </a> <a><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 举报 </a> </div> </div> <div class="pull-right" data-toggle="tooltip" data-placement="bottom" title="29人觉得这个很赞">29 赞</div> </div> </div> </li> </ul>',
				});
			});
		});
		$('.popover').css('width','500px');
		$('.tan').each(function (){
			var tan = $(this).find('.tan_hide');
			$(this).hover(
				function () {
					tan.css('display','inline-block');
				},
				function () {
					tan.css('display','none');
				});
		});
	</script>
		
@endsection	