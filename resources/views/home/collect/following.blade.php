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
<<<<<<< HEAD
	@include('home.layouts._foot_style')
=======
>>>>>>> gaoju
@endsection

@section('content')
	<div class="col-md-8 font-s">
		 <!-- 标题 start -->
		 <div class="section-title">
		 	我关注的问题
		 	<span>（3）</span>
		 </div>
		 <!-- 标题 END -->
		<div class="section-item">
		 	<!-- 浏览数 start -->
		 	<span class="section-brower">
		 		<div class="font-weight">777K</div>
		 		<div class="">浏览</div>
		 	</span>
		 	<!-- 浏览数 end -->
			<div class="section-main">
				<span class="font-weight"><a href="">苏联解体的时候，为什么不发射所有的核弹？</a></span>
				<div class="section-gongneng">
					  <a href="#" name="focus" class="" id="">取消关注</a>
					  <span class="#">•</span>
                        <a class="#" href="#">182 人回答</a>


                        <span class="zg-bull">•</span>

                        <span>581人关注</span>
				</div>
			</div>
		</div>
		<div class="section-item">
		 	<!-- 浏览数 start -->
		 	<span class="section-brower">
		 		<div class="font-weight">777K</div>
		 		<div class="">浏览</div>
		 	</span>
		 	<!-- 浏览数 end -->
			<div class="section-main">
				<span class="font-weight"><a href="">苏联解体的时候，为什么不发射所有的核弹？</a></span>
				<div class="section-gongneng">
					  <a href="#" name="focus" class="" id="">取消关注</a>
					  <span class="#">•</span>
                        <a class="#" href="#">182 人回答</a>


                        <span class="zg-bull">•</span>

                        <span>581人关注</span>
				</div>
			</div>
		</div>
	</div>
	@include('home.collect._rightTool')
<<<<<<< HEAD
	@include('home.layouts._footer')
=======
>>>>>>> gaoju
@endsection