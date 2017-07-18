@extends('home.people.default')

@section('daohang')
	 <div role="tabpanel" class="tab-pane" id="tiwen">
		<div class="dongtai-dongtai">
		<span>{{$count['sex']}}的提问</span>
	    </div>
	    @foreach($info as $val)
		<div class="dongtai-content">
	    	<div class="dongtai-content-title">
	    		<a href="/question/{{ $val->id }}" target="_blank">{{ $val->title }}</a>
	    	</div>
	    	<div>
	    		<time>{{ date('Y-m-d',strtotime($val['created_at'])) }}</time> • <span>{{ \App\Question::find($val->id)->countAnswer() }}</span>个回答 • 
	    		<span>{{ \App\Question::find($val->id)->countFollow() }}</span>个关注
	    	</div>
		</div>
		@endforeach
	</div>
@endsection
