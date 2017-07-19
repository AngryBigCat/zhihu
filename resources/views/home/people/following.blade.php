@extends('home.people.default')


@section('daohang')
<div role="tabpanel" class="tab-pane" id="zhuanlan">
    <div class="dongtai-dongtai">
    <span>{{$count['sex']}}关注的人</span>
    </div>
    @foreach($followings as $val)
    <div class="zhuan-item" >
        <div class="zhuan-left pull-left" >
            <a href="/people/answer/{{ $val->id }}"><img style="width:70px;height:70px;" src="/uploads/headPic/{{ $val->headpic }}"></a>
        </div>
        <div class="zhuan-right" >
            <h4><a href="/people/answer/{{ $val->id }}">{{ $val->name }}</a>
            @if(\App\User::find($_SESSION['id'])->isFollowing(\App\User::find($val->id)) && \App\User::find($_SESSION['id'])->isFollowedBy(\App\User::find($val->id)))
            <span class="xianghu">相互关注</span>
            @endif

            </h4>
            <span class="zhuan-desc">{{ $val->a_word }}</span>
            <div class="zhuan-bottom"> 
            <span>{{ \App\User::find($val->id)->answers->count() }}</span> 回答 • 共 <span>{{ \App\User::find($val->id)->questions->count() }} </span>
            提问 • <span> {{ \App\User::find($val->id)->followers()->count() }} </span>关注者
            </div>
        </div>

        @if (Auth::id() != $val->id) 
        <div class="pull-right tgge-follow" uid="{{ $val->id }}">
            <a class="toggle-follow btn btn-guanzhu {{ Auth::user()->isFollowing(\App\User::find($val->id)) ? 'btn-info' : 'btn-primary' }}">
            @if(Auth::user()->isFollowing(\App\User::find($val->id)))
                已关注
            @else
                <span class="glyphicon glyphicon-plus"></span> 关注Ta
            @endif
            </a>
        </div>
        @endif

    </div>
    @endforeach
</div>
@endsection

