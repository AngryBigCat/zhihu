@extends('home.layouts.default')

@section('title', $question->title)

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

        #toolbar .w-e-droplist {
            z-index: 2;
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
            color: #bbb;
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

        .about-author-btn > a.following {
            background-color: #c3ccd9;
            border: 1px solid #c3ccd9;
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
            @include('home.question._question-top')
            @include('home.question._question-bottom')
        </div>
    </div>
@endsection
{{-- End --}}

{{-- 问题页正文部分 --}}
@section('content')
<div class="row">
    <div class="col-md-8">
        @yield('topAnswer')
        <div class="panel panel-default">
            <div class="panel-body">
                {{-- 回答item --}}
                @if($question->answers->isEmpty())
                    @include('home.question._empty-status')
                @else
                    @include('home.question._answer-top')
                    @include('home.question._answer')
                @endif
            </div>
        </div>
        <span id="postAnswerAAA"></span>
        @if(Auth::user())
            @if(!$question->isSubscribe() && !$myAnswer)
                @include('home.question._postAnswer')
            @else
                @if($myAnswer->trashed())
                    @include('home.question._restoreAnswer')
                @else
                    @include('home.question._updateAnswer')
                @endif
            @endif
        @else
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    请<a href="{{ route('login') }}">登录</a>后在回答
                </div>
            </div>
        @endif
    </div>
    {{-- 问题页面右半部份 --}}
    <div class="col-md-4">
        @yield('topAuthor')
        @include('home.question._aboutAnswer')
    </div>
</div>
@endsection
{{-- End --}}

@section('script')
    <script>
        var editor2 = new E('#toolbar', '#editor2');
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
        editor2.customConfig.zIndex = 1;
        editor2.customConfig.uploadImgServer = '/upload';
        editor2.customConfig.uploadImgParams = {
            _token: `{{ csrf_token() }}`
        };
        editor2.customConfig.uploadFileName = 'answer_img';
        editor2.create();


        /*
         提交问题
         */
        $('.addAnswer').on('click', function (event) {
            event.preventDefault();
            axios.post(this.href, {
                question_id: `{{ $question->id }}`,
                content: editor2.txt.html()
            }).then(function (res) {
                if (res.status === 200) {
                    $('.alert-info-box').addClass('alert-success').html('回答问题成功！' + '，请稍等...').show('fast');
                    window.location.reload();
                }
            });
        });

        /**pp
         * 更新回答
         */
        $('.updateAnswer').on('click', function (event) {
            event.preventDefault();
            axios.put(this.href, {
                content: editor2.txt.html()
            }).then(function (res) {
                if (res.status === 200) {
                    $('.alert-info-box').addClass('alert-success').html('回答更新成功！' + '，请稍等...').show('fast');
                    window.location.reload();
                }
            });
        });

        /*
         点赞、取消点赞
         */
        $('.vote').on('click', function (event) {
            var url = event.currentTarget.dataset.href;
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

        /*
         关注、取消关注问题
         */
        $('.toggleFollow').click(function (event) {
            event.preventDefault();
            var _this = this,
                count = $('.count-follow').text();
            axios.post(this.href).then(function (res) {
                if (!_.isEmpty(res.data.attached)) {
                    $(_this).html('正在关注').addClass('following');
                    $('.count-follow').html(parseInt(count) + 1);
                } else {
                    $(_this).html('关注问题').removeClass('following');
                    $('.count-follow').html(parseInt(count) - 1);
                }
            });
        });

        /**
         * 关注回答的用户
         */
        $('.toggle-follow').click(function (event) {
            event.preventDefault();
            var id = event.currentTarget.dataset.id,
                url = '/user/' + id + '/toggleFollow',
                count = $('.follower-count').text(),
                _this = this;
            axios.post(url).then(function (res) {
                if (!_.isEmpty(res.data.attached)) {
                    $(_this).html('取消关注').addClass('following');
                    $('.follower-count').html(parseInt(count) + 1);
                } else {
                    $(_this).html("<span class='fa fa-plus'><span>" + ' 关注TA').removeClass('following');
                    $('.follower-count').html(parseInt(count) - 1);
                }
            });
        });

        /**
         * 删除问题、回答
         */
        $('.remove').click(function (event) {
            var id = event.target.dataset.id,
                module = event.target.dataset.module,
                url = `/${module}/${id}`;
            axios.interceptors.request.use((config) => {
                $(this).find('a').hide();
                $(this).find('span').show();
                return config;
            });
            axios.delete(url).then(function (res) {
                if (res.status == 200) {
                    $('.alert-info-box').addClass('alert-success').html(res.data.msg).show('fast');
                    if (res.data.from === 'question') {
                        window.location.href = '/';
                    } else if (res.data.from === 'answer') {
                        window.location.reload();
                    }
                }
            });
        });

        /**
         * 撤销删除问题
         */
        $('.restoreAnswer').click(function (event) {
            var id = event.target.dataset.id,
                url = '/answer/' + id + '/restore';
            axios.interceptors.request.use((config) => {
                $(this).find('a').hide();
                $(this).find('span').show();
                return config;
            });
            axios.patch(url).then(function (res) {
                if (res.status == 200) {
                    $('.alert-info-box').addClass('alert-success').html(res.data.msg).show('fast');
                    window.location.reload();
                }
            });
        });
    </script>
@endsection
