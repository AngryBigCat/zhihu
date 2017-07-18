@extends('home.people.default')


@section('daohang')
<div role="tabpanel" class="tab-pane" id="zhuanlan">
    <div class="dongtai-dongtai">
    <span>{{$count['sex']}}关注的问题</span>
    </div>
    @foreach($que as $val)
        <div class="dongtai-content">
            <div class="dongtai-content-title">
                <a href="/question/{{ $val->id }}">{{ $val->title }}</a>
            </div>
            <div>
                <time>{{ date('Y-m-d',strtotime($val->created_at)) }}</time> • <span> {{ \App\Question::find($val->id)->answers->count() }} </span>个回答 • 
                <span>{{ \App\Question::find($val->id)->followers->count() }} </span>个关注
            </div>
        </div>
    @endforeach

</div>
@endsection