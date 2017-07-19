@extends('home.people.default')

@section('daohang')
<div role="tabpanel" class="tab-pane" id="shoucang">
    <div class="dongtai-dongtai">
    <span>{{$count['sex']}}的收藏</span>
    </div>
    @foreach($info as $val)
    <div class="dongtai-content">
        <div class="dongtai-content-title">
            <a href="/collect/colQus/{{ $val->id }}">{{ $val->name }}</a>
        </div>

        <div>
            <time>{{ date('Y-m-d', strtotime($val->updated_at)) }}</time> 更新 • <span> {{ \App\Collect::find($val->id)->question()->count() }} </span>条内容 • 
            <span> {{ \App\Collect::find($val->id)->followers()->count() }} </span>个关注
        </div>
    </div>
    @endforeach
</div>
@endsection