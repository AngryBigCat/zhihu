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
		<div class="dongtai col-md-12">
				<ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
				    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
				    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
			    </ul>
			<div>
				@include('home.user.dongtai')
			</div>
		</div>
	</div>
	<!-- 右侧 start-->
	@include('home.user.youce')
	<!-- 右侧 end-->
@endsection
