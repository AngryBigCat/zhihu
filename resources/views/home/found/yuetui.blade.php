@extends('home.found.found')
@section('tou')
<li role="presentation" ><a href="/found/ritui" >今日最热</a></li>
<li role="presentation" class="active"><a href="/found/yuetui" >本月最热</a></li>
@stop
@section('record')
@foreach ($monthHot as $v)
<div class="lizi">
	<a href="#" >
		<h5>{{$v->title}}</h5>
	</a>
	<div >
		<a href="#" class="pull-left"><span class="badge" count="{{ \App\Question::find($v->id)->followers()->count() }}">{{ \App\Question::find($v->id)->followers()->count() }}</span></a>
		<div class="pull-left">
			<a id="name" href="/people/answer/{{$v->user_id}}">{{$v->name}}</a>
			<span class="aria-hidden">{{$v->intro}}</span>
			<p class="aria-hidden ">
				{{$v->describe}}

				作者：{{$v->name}}
				来源：知乎
				著作权归作者所有，转载请联系作者获得授权。
			</p>
			<div class="list_retui">
				<a class="attent" qus_id="{{$v->id}}"> 
					@if(in_array($v->id,$question_ids))
					取消关注
					@else
					<i class="fa fa-plus" aria-hidden="true"></i>关注问题
					@endif
				 </a>
				<span> . </span>
				<a class="comment" rel="popover"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
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
				<a class="collect" data-toggle="modal" data-target="#collect" qus_id="{{$v->id}}"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
				<span> . </span>
				<a class="no_help"> 没有帮助 </a>
				</div>
				<span> . </span>
				<a href="/deal"> 作者保留权利 </a>
			</div>
			
		</div>
	</div>
</div>
@endforeach
{{ $monthHot->links() }}
@stop