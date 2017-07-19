@extends('home.layouts.default')

@section('style')
	<style>
	.back{
		color: #3097D1;
		font-size: 14px;
	}
	.back a{
		color: #3097D1;
	}
	.qus{
		border-top:1px solid #bbb;
		margin-top:20px;
		padding-top: 10px;

	}
	.describe{
		padding:10px 0 0 30px;
		font-size: 12px;
		color: #999;
		/*border:1px solid red;*/
	}
	h1{
		font-size: 30px;
		padding:5px;
		font-weight: bold;
	}
	h5{
		padding:8px 0;
		color:#225599;
		font-weight: bold;
	}
	.lizi{
		/*border:1px solid red;*/
		margin-top: 20px;
		font-size: 12px;
		height:198px;
	}
	.lizi a{
		cursor: pointer;
	}
	.lizi>div{
		border-bottom:1px solid #ddd;
		height: 150px

	}
	.lizi>div>a{
		/*display: block;*/
		padding:3px 20px;
		width:10%;
	}
	.lizi>div>div{
		width:90%;
	}
	.lizi p{
		padding:12px 5px;
		height: 5.6em;
		line-height:1.4em;
		overflow: hidden;
	}
	.lizi_hide{
		display: inline-block;
		display:none;
	}
	/*.list_retui{
		border:1px solid red;
	}*/
	</style>
@stop

@include('home.layouts._foot_style') 

@section('content')
<div class="row" id="content">
    <div class="col-md-8">
        <!-- Nav tabs -->
        <div class="back"><i class="fa fa-angle-double-left" aria-hidden="true"></i><a href="{{route('collect.collections')}}"> 返回{{DB::table('users')->where('id',$collect->user_id)->first()->name}}的收藏 </a></div>
        <div>
        <div style="height:50px;overflow: hidden;">
        	<h1 class="pull-left">{{$collect->name}}</h1>
    		<div class="pull-right">
        		<button class="btn btn-info follow" col_id="{{$collect->id}}" style="margin: 5px 20px 0 0">
					@if(\App\Collect::find($collect->id)->isFollowedBy(\App\User::find(Auth::id())))
					取消关注
					@else
					<i class="fa fa-plus" aria-hidden="true"></i> 关注
					@endif
        		</button>
        	</div>
        </div>	
        	<div class="describe">
        		@if(empty($collect->intro))
				收藏夹的主人太懒了，什么都没写^~^
				@else
				{{$collect->intro}}
				@endif
        	</div>
        </div>
        <div class="qus">
        @foreach($res as $key => $v)
        	<div class="lizi">
				<a href="{{route('question.show',$v->id)}}" >
					<h5>{{$v->title}}</h5>
				</a>
				<div >
					<a href="#" class="pull-left"><span class="badge" count="{{ \App\Question::find($v->id)->followers()->count() }}">{{ \App\Question::find($v->id)->followers()->count() }}</span></a>
					<div class="pull-left">
						<a id="name" href="/people/answer/{{$v->user_id}}">{{$v->name}}</a>
						<span class="aria-hidden">{{$v->introduction}}</span>
						<p class="aria-hidden ">
							{{$v->describe}}

							作者：{{$v->name}}
							链接：https://www.zhihu.com/question/55370905/answer/189293359
							来源：知乎
							著作权归作者所有，转载请联系作者获得授权。
						</p>
						<div class="list_retui" >
							<a class="attent" qus_id="{{$v->id}}"> 
								@if(in_array($v->id,$collect_ids))
								取消关注
								@else
								<i class="fa fa-plus" aria-hidden="true"></i>关注问题
								@endif
							 </a>
							<span> . </span>
							<a class="comment" rel="popover"  v-on:click="onToggleComment({{ $key }}, 'question')"><i class="fa fa-commenting-o" aria-hidden="true"></i> 评论 </a>
							<span> . </span>

							<div class="lizi_hide">
							<a class="thank" ><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
							<span> . </span>
							<div style="display: inline;" class="dropdown">
								<a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-share" aria-hidden="true"></i> 
									分享 
								</a>
								<div class="dropdown-menu qrcode" aria-labelledby="dLabel" qrcode="{{$v->describe}}" style="padding:10px"></div>
							</div>
							<span> . </span>
							<a class="no_help"> 没有帮助 </a>
							</div>
							<span> . </span>
							<a href="/deal"> 作者保留权利 </a>
						</div>
						
					</div>
				</div>
			</div>
			<!-- 评论 start -->
			<comment-list parent-id="{{ $v->id }}" ref="{{ $key }}"></comment-list>
			<!-- 评论 end -->
			@endforeach
        </div>
        
        
    </div>
    @include('home.collect._rightTool')
    <hr>
    <hr>
</div>
    @include('home.layouts._footer')
@stop
@section('script')
	<script type="text/javascript" src="http://cdn.staticfile.org/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>

	<script>
		// 二维码生成器
		$('.qrcode').each(function(){
			var qrcode = $(this).attr('qrcode');
			// console.log(qrcode);
			$(this).qrcode({
			    render: "canvas", //也可以替换为table
			    foreground: "#3097D1",
			    background: "#eee",
			    width:150,
			    height:150,
			    text: qrcode
			});
		})
		//检测变量
		$('#myModal').on('shown.bs.modal', function () {
		  	$('#myInput').focus()
		})

		// 关注收藏夹
		$('.follow').click(function() {
		    var col_id = $(this).attr('col_id');
		    var col = $(this);
		    $.ajax({
		        url: "/collect/followAjax",
		        type: 'GET',
		        data: { data :col_id },
		        dataType: 'json',
		        success: function (data) {
		            if (data.status==0) {
		                col.html('<i class="fa fa-plus" aria-hidden="true"></i> 关注');
		            }else{
		                col.html('取消关注');
		            }
		            // console.log(data);
		        },
		        error: function (data) {
		            console.log(data);
		        }
		    });
		    return false;
		}); 	

		{{-- 热推下的内容的字数限制 --}}
	    //限制字符个数
	    $("p").each(function(){
	        var maxwidth=150;
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

		{{-- 收藏 --}}
		$('.collect').click(function(){
			var qus_id = $(this).attr('qus_id');
			$('.qus').attr('value',qus_id);
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
		$('.attent').click(function() {
			var qus_id = $(this).attr('qus_id');
			var qus = $(this);
			var badge = $(this).parents('.lizi').find('.badge');
			var count = badge.attr('count');
			$.ajax({
	            url: "/found/follow",
	            type: 'GET',
	            data: { date :qus_id },
	            dataType: 'json',
	            success: function (data) {
	            	if (data.status==0) {
	            		badge.html(count);
	            		qus.html('<i class="fa fa-plus" aria-hidden="true"></i> 关注问题');
	            	}else{
	            		qus.html('取消关注');
	            		badge.html(+count+1);
	            	}
	                // console.log(data);
	            },
	            error: function (data) {
	                console.log(data);
	            }
        	});
        	return false;
		});	


		{{-- 热推下的操作拦下的无帮助 --}}
		
			$('.no_help').click(function () {
				no=$(this);
				if (no.html() == '没有帮助') {
					no.html('取消没有帮助');
				}else{
				  	no.html('没有帮助');
				}
			});
	</script>
@endsection