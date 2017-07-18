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
					      <img class="media-object" src="/{{$v->qs_img}}" alt="..." width="200px">
					    </a>
						<span class="pull-right">
							{{$v->describe}}
						</span>
				    </div>
				  </div>
				</div>							
			</div>
			@endforeach
		</div>
	</div>
	{{-- 发现页面右半部分 --}}
		@include('home.found._right')
</div>