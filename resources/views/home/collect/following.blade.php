@extends('home.layouts.default')

@section('style')
	<style>
		.font-s{
			font-size:13px;
		}
		.section-title{
			height:40px;
			border-bottom:1px solid #CCCCCC;
			font-size:14px;
			font-weight: bold;
		}
		.section-item{
			margin:10px 0px;
		}
		.font-weight{
			font-weight: bold;
			color:#225599;
			font-size:16px;
		}
		.font-weight a{
			font-size:14px;
			text-decoration: none;
		}
		.section-brower{
			float: left;
		    padding: 2px;
		    color: #259;
		    height: 38px;
		    width: 46px;
		    line-height: 20px;
		    text-align: center;
		    border-radius: 4px;
		    background: #eff6fa;
		}
		a{
			color: #259;
		}
		.section-main{
			margin-left:60px;
		}
		.section-gongneng a{
			color:#999;
		}
		.right-tool{
        	font-size:13px;
   		}
	</style>
	@include('home.layouts._foot_style')
@endsection

@section('content')
	<div class="col-md-8 font-s">
		 <!-- 标题 start -->
		 <div class="section-title">
		 	我关注的问题
		 	<span>（3）</span>
		 </div>
		 <!-- 标题 END -->
		@foreach($qus as $v)
		<div class="section-item">
		 	<!-- 浏览数 start -->
		 	<span class="section-brower">
		 		<div class="font-weight">{{$v->visit_count}}</div>
		 		<div class="">浏览</div>
		 	</span>
		 	<!-- 浏览数 end -->
			<div class="section-main">
				<span class="font-weight"><a href="">{{$v->title}}</a></span>
				<div class="section-gongneng">
					  <a href="#" name="focus" class="attent" qus_id="{{$v->id}}">取消关注</a>
					  <span class="#">•</span>
                        <span class="#">182 人回答</span>


                        <span class="zg-bull">•</span>

                        <span>{{ \App\Question::find($v->id)->followers()->count() }}人关注</span>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@include('home.collect._rightTool')
	@include('home.layouts._footer')
@endsection
@section('script')
	<script>
		$('.attent').click(function() {
			var qus_id = $(this).attr('qus_id');
			var qus = $(this);
			console.log(qus_id);
			$.ajax({
	            url: "/found/follow",
	            type: 'GET',
	            data: { date :qus_id },
	            dataType: 'json',
	            success: function (data) {
	            	if (data.status==0) {
	            		qus.html('<i class="fa fa-plus" aria-hidden="true"></i> 关注问题');
	            	}else{
	            		qus.html('取消关注');
	            	}
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