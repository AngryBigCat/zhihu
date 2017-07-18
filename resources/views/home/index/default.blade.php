@extends('home.layouts.default')
@section('style')
<style>
    #toolbar {
        background: #f7f8fa;
        border: 1px solid #e7eaf1;
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
    }.modal-footer {
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
    .border-normal:empty:before{
        content: attr(placeholder);
        color:#bbb;
    }
    .border-normal:focus:before{
        content:none;
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
        <div class="index-entry">
            <div class="index-entry-avatar">
                <img src="img/avatar04.png">
            </div>
            <span class="entry-box-arrow"></span>
            <span class="entry-box-arrow-border"></span>
            <div class="index-entry-box">
                <ul class="entry-box-list">
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="fa fa-question-circle-o"></span> 提问</a></li>
                    <li><a href="#"><span class="fa fa-file-text-o"></span> 回答</a></li>
                    <li><a href="#"><span class="fa fa-pencil-square-o"></span> 写文章</a></li>
                </ul>
                <div class="entry-box-after">
                    <a href="#">草稿(2)</a>
                </div>
            </div>
    </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="recent-new-title">
                    <h4><span class="fa fa-list-alt"></span> 最新动态</h4>
                </div>
                <div class="recent-new-box">
                    <div class="media recent-new-item">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/avatar04.png" width="50" height="50">
                            </a>
                            <div class="topic-vote">
                                <a href="#" class="topic-vote-up">
                                    <span class="fa fa-caret-up"></span>
                                    <span class="topic-vote-up-counts">2014</span>
                                </a>
                                <a href="#" class="topic-vote-down"><span class="fa fa-caret-down"></span></a>
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="index-topic-from">
                                <span>来自话题：<a href="#">电影</a></span>
                            </div>
                            <div class="media-heading index-topic-title">
                                <a href="#">怎样看待冯小刚吐槽现在的年轻演员娘？</a>
                            </div>
                            <div class="index-topic-author">
                                <span class="author-name"><a href="#">匿名用户，</a></span>
                                <span class="author-intro">我是一直生气的大脸猫</span>
                            </div>
                            <div class="index-topic-content">
                                <div>
                                    喂喂，你先想一想电影里异形为什么那么厉害?
                                    异形在飞船，里，啊!
                                    你想想一只老虎跑进坦克里，坦克里能活下来几个人?
                                    那么问题来了，老虎能打过坦克么？
                                    最后，对于甲壳类，我是向来支持清蒸的，看它头那么长蟹黄一定很多吧?

                                    喝核子可乐品初秋异形赏白矮星是所有未来垃圾王的浪漫!
                                    嗯。。。老虎在坦克里可能施展不开，那毒蛇和蝎子什么的差不多吧。
                                    我都想开异形饲料厂了，诚邀合作伙伴。

                                    作者：清心寡欲长信侯
                                    链接：https://www.zhihu.com/question/61254082/answer/186969108
                                    来源：知乎
                                    著作权归作者所有，转载请联系作者获得授权。
                                </div>
                            </div>
                            <div class="index-topic-footer">
                                {{--@component('home.component._footerCon', ['key' => 1])--}}
                                    {{--<li><span class="fa fa-plus"></span> 关注问题</li>--}}
                                {{--@endcomponent--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <ul class="list-group">
            <a href="#" class="list-group-item"><span class="fa fa-folder-o"></span> 我的收藏</a>
            <a href="#" class="list-group-item"><span class="fa fa-check-square-o"></span> 我关注的问题</a>
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
        function Base() {
            this.editor = new E('#toolbar', '#editor');
        }

        /*
        页面初始化加载
        */
        Base.prototype._initLoad = function () {
            this.editorLoad();
        };
        /*
        编辑器加载
        */
        Base.prototype.editorLoad = function () {
            var menuParamter = [
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
            //配置编辑区域的 z-index
            this.editor.customConfig.zIndex = 0;
            // 自定义菜单配置
            this.editor.customConfig.menus = menuParamter;
            this.editor.create();
        };



        var base = new Base();
        base._initLoad();
    </script>
@endsection
