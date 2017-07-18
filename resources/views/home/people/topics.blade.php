@extends('home.people.default')


@section('daohang')
<div role="tabpanel" class="tab-pane" id="zhuanlan">
    <div class="dongtai-dongtai">
    <span>{{$count['sex']}}关注的话题</span>
    </div>
    @foreach($info as $val)
    <div class="zhuan-item">
        <div class="zhuan-left pull-left">
            <a href="/topic/{{$val->id}}"><img style="width:70px;height:70px" src="{{ $val->img }}"></a>
        </div>
        <div class="zhuan-right">
            <h4><a href="/topic/{{$val->id}}">{{ $val->tag_name }}</a></h4>
            <a class="zhuan-desc" href=""><span>{{ \App\Tag::find($val->id)->question->count() }}</span> 个问题</a>
        </div>
    </div>
    @endforeach
</div>
@endsection