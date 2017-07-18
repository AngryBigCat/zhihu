@extends('home.layouts.default')

@section('style')
<style>
    body {
        background: #f7f8fa;
        padding-top: 50px;
    }
    h1 {
        padding: 0;
        margin: 0;
    }
    #toolbar {
        background: #f7f8fa;
        border-bottom: 1px solid #e7eaf1;
        border-top: 1px solid #e7eaf1;
    }
    #editor2 {
        margin-bottom: 10px;
    }
    #editor2 .w-e-text {
        min-height: 150px;
        overflow-y: hidden;
    }
    #editor2 .w-e-text:empty:before {
        content: '|';
        color:#bbb;
    }
    .navbar, .navbar-default {
        margin-bottom: 0;
    }
    .question-header {
        background-color: #fff;
        margin-bottom: 20px;
        padding: 15px 0;
    }
    .question-top {
        margin-bottom: 15px;
    }
    .question-head-tag {
        margin-bottom: 15px;
    }
    .question-head-h1 {
        font-size: 22px;
        margin-bottom: 15px;
    }
    .question-head-des {

    }
    .question-head-counts {
        display: flex;
        justify-content: flex-end;
    }
    .question-head-counts > a {
        display: flex;
        flex-direction: column;
        padding: 0 20px;
        text-align: center;
        border-right: 1px solid #eee;
        text-decoration: none;
    }
    .question-head-counts > a:last-child {
        border-right: none;
    }
    .question-head-btn {
        display: flex;
        justify-content: flex-end;
    }
    .question-head-btn > a {
        width: 100px;
        margin-left: 10px;
    }
    .question-head-btn > a.following {
        background-color: #c3ccd9;
        border: 1px solid #c3ccd9;
    }
    .question-head-btn > a.following:active {
        background-color: #c3ccd9;
        border: 1px solid #c3ccd9;
    }
    .question-answer-top {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    .question-answer-top .btn-group.open .dropdown-toggle {
        box-shadow: none;
    }
      .sort-toggle {
        box-shadow: none;
        cursor: pointer;
    }
    .question-answer-item {
        padding: 15px 0;
        border-top: 1px solid #eee;
    }
    .question-answer-item:last-child {
        padding-bottom: 0;
    }
    .item-box {
        margin-bottom: 10px;
    }
    .author-info {
        display: flex;
        height: 50px;
    }
    .author-info-dec {
        margin-left: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }
    .author-info-name {
        font-weight: bold;
        font-size: 16px;
    }
    .answer-thumbs-counts {
        margin-bottom: 10px;
    }
    .answer-thumbs-counts > span {
        color: #aaa;
    }
    .answer-main-box {
        margin-bottom: 10px;
    }
    .item-footer {
        display: flex;
        align-items: center;
        margin-bottom: 0;
    }
    .item-footer > li {
        margin-right: 20px;
        color: #aaa;
    }
    .vote-button > button {
        background: #ebf3fb;
        color: #2d84cc;
        border: none;
        border-radius: 4px;
        margin-right: 5px;
        padding: 5px 10px;
    }
    .vote-button > .vote-active {
        background-color: #2d84cc;
        color: #eef3f7;
    }
    .vote-button > .vote-active:hover {
        background-color: #1c73bb;
        color: #eef3f7;
    }
    .vote-button > button:hover {
        background: #e4ebf3;
        color: #2d84cc;
    }
    .about-author-head {
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }
    .about-author-bottom {
        padding-top: 15px;
    }
    .about-author-counts {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    .counts-item {
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        font-size: 16px;
    }
    .about-author-btn {
        display: flex;
        justify-content: space-around;
    }
    .about-author-btn > a {
        width: 120px;
    }
    .answeradd-header {
        padding: 16px 20px;
    }
    .editable-box {
        padding: 15px 20px;
    }
    .editable-box-btn {
        display: flex;
        justify-content: flex-end;
    }
</style>
@endsection

{{-- 问题页面标题部分 --}}
@section('question-head')
<div class="question-header">
    <div class="container">
        <div class="row question-top">
            <div class="col-md-8">
                <div class="question-head-tag">
                    <ul class="list-unstyled list-inline">
                        <li><a href="#">汽车</a></li>
                        <li><a href="#">汽车</a></li>
                        <li><a href="#">汽车</a></li>
                        <li><a href="#">汽车</a></li>
                        <li><a href="#">汽车</a></li>
                    </ul>
                </div>
                <h1 class="question-head-h1">{{ $question->title }}</h1>
                <div class="question-head-des">
                    {{ $question->describe }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="question-head-counts">
                    <a href="#">
                        <span>关注者</span>
                        <span>{{ $question->countFollow() }}</span>
                    </a>
                    <a href="#">
                        <span>被浏览</span>
                        <span>{{ $question->visit_count }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row question-bottom">
            <div class="col-md-8">
                @component('home.component._footerCon')
                @endcomponent
            </div>
            <div class="col-md-4">
                <div class="question-head-btn">
                    <a href="{{ url("question/$question->id/toggleFollow") }}"
                       class="btn btn-primary toggleFollow {{ $question->isFollow() ? 'following' : '' }}">
                        {{ $question->isFollow() ? '正在关注' : '关注问题' }}
                    </a>
                    <a href="#" class="btn btn-default"><span class="fa fa-pencil"></span> 写回答</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- End --}}

{{-- 问题页正文部分 --}}
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="question-answer-top">
                    <span>{{ $question->answers()->count() }} 个回答</span>
                    <div class="btn-group pull-right">
                        <span href="#" class="dropdown-toggle sort-toggle" data-toggle="dropdown">
                            {{ $sort['selection'] }} <span class="fa fa-sort"></span>
                        </span>
                        <ul class="dropdown-menu ">
                            @foreach($sort['options'] as $key => $value)
                            <li><a href="{{ url("question/$question->id/$key") }}">{{ $value }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{-- 回答item --}}
                @foreach($answers as $answer)
                <div class="question-answer-item">
                    <div class="item-box">
                        @include('home.question._author', ['user' => $answer->user])
                    </div>
                    <div class="answer-thumbs-counts">
                        <span class="text-count">{{ $answer->countVote() }}</span>
                        <span>人赞同了该回答</span>
                    </div>
                    <div class="answer-main-box">
                        <div class="answer-main-content">{!! $answer->content !!}</div>
                    </div>
                        @component('home.component._footerCon')
                        <li class="vote-button">
                            <button class="vote {{ $answer->isVote() ? 'vote-active' : ''}}"
                                    data-href="{{ $answer->isVote() ? url("answer/$answer->id/upVote") : url("answer/$answer->id/cancelVote") }}">
                                <span class="num">{{ $answer->countVote() }}</span> <span class="fa fa-caret-up"></span>
                            </button>
                            <button><span class="fa fa-caret-down"></span></button>
                        </li>
                        @endcomponent
                </div>
                @endforeach
            </div>
        </div>
        @if(Auth::user())
        <div class="panel panel-default answeradd">
            <div class="answeradd-header">
                @include('home.question._author', ['user' => Auth::user()])
            </div>
            <div id="toolbar"></div>
            <div class="editable-box">
                <div id="editor2"></div>
                <div class="editable-box-btn">
                    <a href="{{ route('answer.store') }}" class="btn btn-primary addAnswer">提交回答</a>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- 问题页面右半部份 --}}
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">关于作者</h3>
            </div>
            <div class="panel-body" class="about-author">
                <div class="about-author-head">
                    {{--@include('home.question._author')--}}
                </div>
                <div class="about-author-bottom">
                    <div class="about-author-counts">
                        <div class="counts-item">
                            <span>回答</span>
                            <span>20</span>
                        </div>
                        <div class="counts-item">
                            <span>文章</span>
                            <span>20</span>
                        </div>
                        <div class="counts-item">
                            <span>关注者</span>
                            <span>20</span>
                        </div>
                    </div>
                    <div class="about-author-btn">
                        <a class="btn btn-primary"><span class="fa fa-plus"></span> 关注她</a>
                        <a class="btn btn-default"><span class="fa fa-comments"></span> 发私信</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">相关问题</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item">关于王家卫有哪些有趣的故事？ 91 个回答</li>
                <li class="list-group-item">《云图》讲的是什么？ 137 个回答</li>
                <li class="list-group-item">如何评价电影《后会无期》？ 2263 个回答</li>
                <li class="list-group-item">中外有哪些优质的、设计感强的抽象风电影海报？ 28 个回答</li>
                <li class="list-group-item">如何评价《喜剧之王》这部电影？ 289 个回答</li>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">相关 Live 推荐</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <img src="/img/avatar04.png" alt="" width="40" height="40">
                    <span>运营拆解怎么做“电影营销”</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
{{-- End --}}

@section('script')
<script>
        var editor2 = new E('#toolbar', '#editor2');

        /*
         富文本工具条配置与创建
         */
        (function () {
            editor2.customConfig.menus = [
                'bold',  // 粗体
                'italic',  // 斜体
                'head',  // 标题
                'quote',  // 引用
                'code',  // 插入代码
                'list',  // 列表
                'emoticon',  // 表情
                'image',  // 插入图片
                'video',  // 插入视频
            ];
            editor2.create();
        })();

        /*
         提交问题
         */
        (function () {
            $('.addAnswer').on('click', function (event) {
                event.preventDefault();
                axios.post(this.href, {
                    question_id: {{ $question->id }},
                    content: editor2.txt.text()
                }).then(function (res) {
                    window.location.reload();
                }).catch(function (err) {
                    console.log(err);
                });
            });
        })();

        /*
         点赞、取消点赞
         */
        (function () {
            $('.vote').on('click', function (event) {
                var url = event.currentTarget.dataset.href;
                console.log(url);
                var curl = url.split('/');
                if (curl[curl.length - 1] === 'upVote') {
                    curl.splice(-1, 1, 'cancelVote');
                } else if (curl[curl.length - 1] === 'cancelVote') {
                    curl.splice(-1, 1, 'upVote');
                }
                $(this).attr('data-href', curl.join('/'));
                url = curl.join('/');
                var _this = this;
                axios.post(url).then(function (res) {
                    var old = $(_this).find('.num').text();
                    if (res.data === 'up') {
                        var add = parseInt(old) + 1;
                        $(_this).addClass('vote-active');
                        $(_this).find('.num').text(add);
                        $(_this).parent().parent().parent().find('.text-count').text(add);
                    } else if (res.data === 'cancel') {
                        var sub = parseInt(old) - 1;
                        $(_this).removeClass('vote-active');
                        $(_this).find('.num').text(sub);
                        $(_this).parent().parent().parent().find('.text-count').text(sub);
                    }
                });
            });
        })();

        /*
        关注、取消关注问题
         */
        (function () {
            $('.toggleFollow').click(function (event) {
                event.preventDefault();
                var _this = this;
                axios.post(this.href).then(function (res) {
                    if (!_.isEmpty(res.data.attached)) {
                        $(_this).html('正在关注').addClass('following');
                    } else {
                        $(_).html('关注问题').removeClass('following');
                    }
                });
            });
        })();
</script>
@endsection
