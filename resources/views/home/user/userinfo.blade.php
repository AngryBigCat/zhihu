@extends('home.layouts.default')
		
@section('style')
	@include('home.user.style')
@endsection

@section('content')
	<!-- 显示封面 start-->
	@include('home.user.header')
	<!-- 显示封面  end -->
	<!-- 导航 start -->
 	<div class="col-md-8">
		<div class="user-dongtai contaier" >
			<div class="dongtai col-md-12">
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#dongtai" aria-controls="home" role="tab" data-toggle="tab">动态</a></li>
					    <li role="presentation"><a href="#huida" aria-controls="profile" role="tab" data-toggle="tab">回答 <span> 0 </span> </a></li>
					    <li role="presentation"><a href="#tiwen" aria-controls="messages" role="tab" data-toggle="tab">提问 <span> 0 </span> </a></li>
					    <li role="presentation"><a href="#zhuanlan" aria-controls="settings" role="tab" data-toggle="tab">专栏 <span> 0 </span> </a></li>
					    <li role="presentation"><a href="#shoucang" aria-controls="settings" role="tab" data-toggle="tab">收藏 <span> 0 </span> </a></li>
				  </ul>
				  <!-- Tab panes -->
			    <div class="tab-content col-md-12">
				    <!-- 动态 start -->
				   	@include('home.user.dongtai')
				    <!-- 动态 end -->
					<div class="clearfix"></div>
				 	<!-- 回答start -->
				   	@include('home.user.huida')
				    <!-- 回答 end -->
					<div class="clearfix"></div>
					<!-- 提问start -->
				   	@include('home.user.tiwen')
				   	
					<!-- 提问end -->
					<!-- 专栏 start -->
				   	@include('home.user.zhuanlan')
				    <!-- 专栏end -->
				    <!-- 收藏 start -->
				   	@include('home.user.shoucang')
				    <!-- 收藏 end -->
					</div>
			</div>
		</div>
	</div>
	<!-- 右侧 start-->
	@include('home.user.youce')
	<!-- 右侧 end-->
@endsection
