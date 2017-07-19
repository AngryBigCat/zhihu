@extends('home.people.default')

@section('daohang')
<div role="tabpanel" class="tab-pane" id="huida">
	<div class="dongtai-dongtai">
	<span>{{$count['sex']}}的回答</span>
	</div>
	@foreach($info as $key => $val)
	<div class="dongtai-content">
		<div class="dongtai-content-title">
			<a href="/question/{{ $val->id }}" target="_blank">{{ $val->title }}</a>
		</div>
		<div class="dongtai-content-info col-md-12">
			<div class="dongtai-content-img pull-left"><a target="_blank" href="/people/activitie/{{ $val->uid }}"><img style="width:50px;height:50px" src="/uploads/headPic/{{ $val->headpic }}"></a></div>
			<div class="dongtai-content-name">
	    		<div class="col-md-12">
					<a target="_blank" href="/people/activitie/{{ $val->uid }}">{{ $val->name }}</a>
	    		</div>
	    		<div class="col-md-12">
	    			<span>{{ $val->a_word }}</span>
	    		</div>	
			</div>
		</div>

		@if(\App\Answer::find($val->ans_id)->countVoters() > 0)
		<div class="col-md-12 dongtai-content-zan" >
			<a href=""><span>{{ \App\Answer::find($val->ans_id)->countVoters() }} </span> 人赞同了该回答</a>
		</div>
		@endif
		
		<div class="dongtai-content-con">	
			<div class="col-md-12">
				{{ $val->content }}
			</div>
		</div>
		<div class="dongtai-content-gongneng">
		
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn-zan btn btn-info active">
			    <input type="radio" name="options" id="option1" autocomplete="off" checked>▲{{ \App\Answer::find($val->ans_id)->countUpVoters() }}
			  </label>
			  <label class="btn-buzan btn btn-info">
			    <input type="radio" name="options" id="option2" autocomplete="off">▼
			  </label>
			</div>
			<button v-on:click="onToggleComment({{ $key }})"  class="dongtai-content-link"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>  {{ \App\Answer::find($val->ans_id)->comments->count() }}条评论</button>
			<button class="dongtai-content-link"><span class="fa fa-share-alt"></span> 分享</button>
	
			<button class="dongtai-content-link thanks"><span class="fa fa-heart "></span> 感谢</button>
		</div>
		<comment-list parent-id="{{ $val->ans_id }}" ref="{{ $key }}"></comment-list>
	</div>
	@endforeach
</div>
@endsection