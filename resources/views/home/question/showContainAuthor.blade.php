@extends('home.question.default')

@section('question-answer-top')
    更多回答
@endsection

@section('topAnswer')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="question-answer-item" style="border-top: none;padding-top: 0;">
            <div class="item-box">
                @include('home.question._author', ['user' => $topAnswer->user])
            </div>
            <div class="answer-thumbs-counts">
                <span class="text-count">{{ $topAnswer->countVote() }}</span>
                <span>人赞同了该回答</span>
            </div>
            <div class="answer-main-box">
                <div class="answer-main-content">{!! $topAnswer->content !!}</div>
            </div>
            @component('home.component._footerCon')
                <li class="vote-button">
                    <button class="vote {{ $topAnswer->isVote() ? 'vote-active' : ''}}"
                            data-href="{{ $topAnswer->isVote() ? url("answer/$topAnswer->id/upVote") : url("answer/$topAnswer->id/cancelVote") }}">
                        <span class="num">{{ $topAnswer->countVote() }}</span> <span class="fa fa-caret-up"></span>
                    </button>
                    <button><span class="fa fa-caret-down"></span></button>
                </li>
                <li v-on:click="onToggleComment('topAnswer')">
                    <a href="javascript:void(0);">
                        <span class="fa fa-comment"></span>
                        {{ $topAnswer->comments()->count() ? $topAnswer->comments()->count().'条评论' : '添加评论' }}
                    </a>
                </li>
                @slot('delete')
                    @can('delete', $topAnswer)
                        <li class="remove">
                            @include('home.question._toggleLink', [
                                     'text' => '删除',
                                     'module' => 'answer',
                                     'id' => $topAnswer->id,
                                     'faIcon' => 'fa fa-remove'
                                    ])
                        </li>
                    @else
                        <li><a href="#"><span class="fa fa-heart"></span> 感谢</a></li>
                    @endcan
                @endslot
            @endcomponent
        </div>
        <comment-list parent-id="{{ $topAnswer->id }}" ref="topAnswer"></comment-list>
    </div>
</div>
@endsection

@section('topAuthor')
<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">关于作者</h3>
        </div>
        <div class="panel-body" class="about-author">
            <div class="about-author-head">
                @include('home.question._author', ['user' => $topAnswer->user])
            </div>
            <div class="about-author-bottom">
                <div class="about-author-counts">
                    <a href="/people/answer/{{ $topAnswer->id }}" class="counts-item">
                        <span>回答</span>
                        <span>{{ $topAnswer->user->answers()->count() }}</span>
                    </a>
                    <a href="{{ url("/people/answer/$topAnswer->id") }}" class="counts-item">
                        <span>问题</span>
                        <span>{{ $topAnswer->user->questions()->count() }}</span>
                    </a>
                    <a href="javascript:void(0);"
                       class="counts-item"
                       v-on:click="onGetFollower('author')"
                       data-toggle="modal"
                       data-target="#author-follower">
                        <span>关注者</span>
                        <span class="follower-count">{{ $topAnswer->user->followers()->count() }}</span>
                    </a>
                    <div class="modal fade" id="author-follower">
                        <div class="modal-dialog">
                            <follower-list my-id="{{ Auth::user()->id }}" parent-id="{{ $topAnswer->user->id }}" ref="authorFollower"></follower-list>
                        </div>
                    </div>
                </div>
                @if ($topAnswer->user->id !== Auth::user()->id)
                    <div class="about-author-btn">
                        <a class="btn btn-primary toggle-follow {{ $topAnswer->user->isFollowedBy(Auth::user()) ? 'following' : '' }}"
                           data-id="{{ $topAnswer->user->id }}">
                            @if($topAnswer->user->isFollowedBy(Auth::user()))
                                取消关注
                            @else
                                <span class="fa fa-plus"></span> 关注TA
                            @endif
                        </a>
                        <a class="btn btn-default"><span class="fa fa-comments"></span> 发私信</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection