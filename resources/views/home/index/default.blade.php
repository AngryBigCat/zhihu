@extends('home.layouts.default')

@section('title', '首页')

@section('style')
    <style>
        #toolbar {
            background: #f7f8fa;
            border: 1px solid #e7eaf1;
        }

        #toolbar .w-e-droplist {
            z-index: 2;
        }

        #editor {
            border-right: 1px solid #e7eaf1;
            border-left: 1px solid #e7eaf1;
            border-bottom: 1px solid #e7eaf1;
        }

        #editor .w-e-text {
            min-height: 150px;
            overflow-y: hidden;
        }

        .from-topic {
            color: #ccc;
        }

        .index-entry {
            display: flex;
            margin-bottom: 20px;
        }

        .index-entry-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 4px;
        }

        .index-entry-box {
            margin-left: 20px;
            background: #f6f6f6;
            display: flex;
            justify-content: space-between;
            width: 100%;
            height: 50px;
            border-radius: 4px;
            border: 1px solid #dedede;
            position: relative;
        }

        .entry-box-arrow {
            width: 0;
            height: 0;
            border-top: 10px solid #f6f6f6;
            border-left: 10px solid transparent;
            position: absolute;
            left: 66px;
            top: 15px;
            z-index: 1;
        }

        .entry-box-arrow-border {
            width: 0;
            height: 0;
            border-top: 15px solid #dedede;
            border-left: 15px solid transparent;
            position: absolute;
            left: 64px;
            top: 14px;
        }

        .entry-box-list {
            height: 50px;
            line-height: 50px;
            padding: 0;
            list-style: none;
            display: flex;
            color: #ddd;
        }

        .entry-box-list > li {
            margin: 0 30px;
        }

        .entry-box-list > li > a, .entry-box-after > a {
            color: #6c829f;
        }

        .entry-box-list > li > a:hover, .entry-box-after > a {
            text-decoration: none;
            color: #259;
        }

        .entry-box-list > li:after {
            content: '|';
            position: relative;
            left: 30px;
        }

        .entry-box-list > li:last-child:after {
            content: normal;
        }

        .entry-box-after {
            height: 50px;
            line-height: 50px;
            margin-right: 30px;
        }

        .recent-new-title {
            margin-bottom: 10px;
        }

        .recent-new-title h4 {
            margin: 0;
        }

        .recent-new-item {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }

        .index-topic-from {
            margin-bottom: 3px;
        }

        .index-topic-from, .index-topic-from > span > a {
            color: #bbb;
        }

        .index-topic-title, .index-topic-title > a {
            font-size: 16px;
            font-weight: bold;
            padding: 0;
        }

        .index-topic-author {
            margin-bottom: 3px;
        }

        .index-topic-content {
            margin-bottom: 5px;
        }

        .author-name > a {
            color: #666;
            font-weight: bold;
        }

        .author-name > a:hover {
            text-decoration: none;
        }

        .author-intro {
            color: #bbb;
        }

        .topic-vote {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .topic-vote-up, .topic-vote-down {
            text-align: center;
            background: #eff6fa;
            color: #698ebf;
            padding: 3px 0;
            border-radius: 4px;
            text-decoration: none;
        }

        .topic-vote-up {
            display: flex;
            flex-direction: column;
            margin-bottom: 5px;
        }

        .topic-vote-up:hover, .topic-vote-down:hover {
            background: #698ebf;
            text-decoration: none;
            color: #eff6fa;
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

        /* 提问框 */
        .modal-title {
            text-align: center;
            padding: 20px 0 10px;
            font-size: 25px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-title small {
            color: #bbb;
            font-size: 16px;
        }

        .border-normal {
            resize: none;
            border: 1px solid #eee;
            border-radius: 4px;
            box-shadow: none;
            padding: 5px 10px;
        }

        .postQuestion-descripe {
            border-radius: 4px;
            padding: 5px;
            margin-top: 50px;
        }

        .border-normal:empty:before {
            content: attr(placeholder);
            color: #bbb;
        }

        .border-normal:focus:before {
            content: none;
        }

        .model-question-descripe-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 0 10px;
        }

        .model-question-descripe-head .right button {
            margin-left: 20px;
        }

        .model-question-descripe-input {
            min-height: 100px;
        }

        .postQuestion-title {
            min-height: 58px;
        }

        .tags-list {
            margin-bottom: 5px;
        }

        .tags-list > li {
            cursor: pointer;
            font-size: 16px;
        }

        .topicList {
            list-style: none;
            border: 1px solid #ddd;
            border-top: none;
            max-height: 150px;
            overflow-y: scroll;
            margin: 0;
        }

        .topicList > li {
            padding: 10px;
        }

        .topicList > li:hover {
            background: #eee;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('home.index._dashboard')
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="recent-new-title">
                        <h4><span class="fa fa-list-alt"></span> 最新动态</h4>
                    </div>
                    <div class="recent-new-box">
                        @include('home.index._recentAnswer')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <a href="{{route('collect.collections')}}" class="list-group-item"><span class="fa fa-folder-o"></span>
                    我的收藏</a>
                <a href="{{route('collect.following')}}" class="list-group-item"><span
                            class="fa fa-check-square-o"></span> 我关注的问题</a>
                <a href="#" class="list-group-item"><span class="fa fa-file-o"></span> 邀请我回答的问题</a>
            </ul>
            <ul class="list-group">
                <li class="list-group-item"><span class="fa fa-list-ul"></span> 公共编辑动态</li>
                <li class="list-group-item"><span class="fa fa-home"></span> 社区服务中心</li>
                <li class="list-group-item"><span class="fa fa-copyright"></span> 版权服务中心</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">知乎专栏</h3>
                </div>
                <ul class="list-group">
                    <a href="#" class="list-group-item">专栏・发现</a>
                </ul>
            </div>
        </div>
        @include('home.component._model')
    </div>
@endsection

@section('script')
    <script>
        let editor = new E('#toolbar', '#editor');
        //配置编辑区域的 z-index
        editor.customConfig.zIndex = 1;
        // 自定义菜单配置
        editor.customConfig.menus = [
            'bold',  // 粗体
            'italic',  // 斜体
            'head',  // 标题
            'quote',  //  引用
            'code',  // 插入代码
            'list',  // 列表
            'emoticon',  // 表情
            'image',  // 插入图片
            'video',  // 插入视频
        ];
        editor.customConfig.uploadImgServer = '/upload';
        editor.customConfig.uploadImgParams = {
            _token: `{{ csrf_token() }}`
        };
        editor.customConfig.uploadFileName = 'question_img';
        editor.create();
    </script>
@endsection

