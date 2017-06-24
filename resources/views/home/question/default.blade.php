@extends('home.layouts.default')

@section('style')
<style>
    .navbar, .navbar-default {
        margin-bottom: 0;
    }
    .question-head {
        background-color: #fff;
        min-height: 230px;
        margin-bottom: 22px;
        overflow: hidden;
    }
    .question-head-tag {
        margin: 20px 0 15px 0;
    }
    .tag-list {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .tag-list > li {
        margin-right: 10px;
        font-size: 14px;
        height: 30px;
        line-height: 25px;
        font-weight: normal;
        border-radius: 20px;
        background: #eef4fa;
        color: #3e7ac2;
    }
    .question-head-h1 {
        font-size: 22px;
        margin: 0 0 10px 0;
    }
    .question-head-des {
        height: 87px;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .question-board {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;
        height: 230px;
        padding: 18px;
    }
    .question-board-counts {
        display: flex;
    }
    .question-board-counts > div {
        display: flex;
        text-align: center;
        flex-direction: column;
        width: 100px;
        font-size: 16px;
    }
    .question-board-btn > a {
        width: 100px;
        margin-left: 10px;
    }
    .question-answer-top {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
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
    .vote-button > a {
        background: #ebf3fb;
        color: #2d84cc;
        border: none;
        padding: 10px;
        border-radius: 4px;
        text-decoration: none;
        margin-right: 5px;
    }
    .vote-button > a:hover {
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
    .editable-toolbar {
        padding: 6px 12px;
        background: #eee;
        border-bottom: 1px solid #ddd;
        border-top: 1px solid #ddd;
    }
    .editable-box {
        padding: 15px 20px;
    }
    .answeradd-textarea {
        min-height: 100px;
        resize: none;
        outline: 0;
        margin-bottom: 15px;
    }
    .answeradd-textarea:empty:before{
        content: attr(placeholder);
        color:#bbb;
    }
    .answeradd-textarea:focus:before{
        content:none;
    }
    .editable-box-btn {
        display: flex;
        justify-content: flex-end;
    }
</style>
@endsection

{{-- 问题页面标题部分 --}}
@section('question-head')
<div class="question-head">
    <div class="container">
        <div class="col-md-8">
            {{-- 标题左半部分 --}}
            <div class="question-head-tag">
                <ul class="tag-list">
                    <li class="label label-info"><a href="">电影</a></li>
                    <li class="label label-info"><a href="">演员</a></li>
                    <li class="label label-info"><a href="">Angelababy（杨颖）</a></li>
                    <li class="label label-info"><a href="">如何评价 X 的演技</a></li>
                    <li class="label label-info"><a href="">林依晨</a></li>
                </ul>
            </div>
            <h1 class="question-head-h1">Angelababy和林依晨之间差了什么?</h1>
            <div class="question-head-des">
                差的是演技吧，当然还有为人处世上的区别，林依晨为人特别低调，baby正好相反！baby在这条路上要有的路还远，而依晨已经走出适合自己且无法被取代的令人仰望的路了！依晨属于永远永远不会被过誉，不论是作为演员还是个人！我特别特别的喜欢她，不论是就她的作品，还是在作品之外表现出来的人品，都让我佩服不已。如果说，我这一生有想成为的人，林依晨肯定算其中一个。她太厉害了，我觉得自己终其一生估计都难以望其项背。 首先我们可以来讨论一下她的作品，就我个人拙见，我觉得，她的作品都很有自己的特色，不会被经典的光芒所掩盖。就拿她的《射雕英雄传》来说，我们大家公认的经典的是翁美玲那个版本的，但是谁也不能否认林依晨演的黄蓉完全没有自己的特色吧。她在剧中所表现出来的机灵调皮可爱，与翁美玲演的黄蓉相比，各有千秋，同样让人印象深刻。

                作者：七七
                链接：https://www.zhihu.com/question/58815400/answer/186466400
                来源：知乎
                著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
            </div>
            <div class="question-head-footer">
                @component('home.component._footerCon')
                @endcomponent
            </div>
        </div>
        <div class="col-md-4">
            {{-- 标题右半部分 --}}
            <div class="question-board">
                <div class="question-board-counts">
                    <div>
                        <span>关注者</span>
                        <span>15191</span>
                    </div>
                    <div>
                        <span>被浏览</span>
                        <span>12062984</span>
                    </div>
                </div>
                <div class="question-board-btn">
                    <a class="btn btn-primary">关注问题</a>
                    <a class="btn btn-default"><span class="fa fa-pencil"></span> 写回答</a>
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
                    <span>116 个回答</span>
                    <span class="pull-right">默认排序 <span class="fa fa-sort"></span></span>
                </div>
                {{-- 回答item --}}
                <div class="question-answer-item">
                    <div class="item-box">
                        @include('home.question._author')
                    </div>
                    <div class="answer-thumbs-counts">
                        <span>1733 人赞同了该回答</span>
                    </div>
                    <div class="answer-main-box">
                        <div class="answer-main-content"></div>
                        差的是演技吧，当然还有为人处世上的区别，林依晨为人特别低调，baby正好相反！baby在这条路上要有的路还远，而依晨已经走出适合自己且无法被取代的令人仰望的路了！依晨属于永远永远不会被过誉，不论是作为演员还是个人！我特别特别的喜欢她，不论是就她的作品，还是在作品之外表现出来的人品，都让我佩服不已。如果说，我这一生有想成为的人，林依晨肯定算其中一个。她太厉害了，我觉得自己终其一生估计都难以望其项背。 首先我们可以来讨论一下她的作品，就我个人拙见，我觉得，她的作品都很有自己的特色，不会被经典的光芒所掩盖。就拿她的《射雕英雄传》来说，我们大家公认的经典的是翁美玲那个版本的，但是谁也不能否认林依晨演的黄蓉完全没有自己的特色吧。她在剧中所表现出来的机灵调皮可爱，与翁美玲演的黄蓉相比，各有千秋，同样让人印象深刻。
                        作者：七七
                        链接：https://www.zhihu.com/question/58815400/answer/186466400
                        来源：知乎
                        著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
                    </div>
                        @component('home.component._footerCon')
                        <li class="vote-button">
                            <a href="#">2014 <span class="fa fa-caret-up"></span></a>
                            <a href="#"><span class="fa fa-caret-down"></span></a>
                        </li>
                        @endcomponent
                </div>
            </div>
        </div>
        <div class="panel panel-default answeradd">
            <div class="answeradd-header">
                @include('home.question._author')
            </div>
            <div class="editable-toolbar">
                    <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-bold"></span></button>
                    <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-italic"></span></button>
                    <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-header"></span></button>
                    <button class="btn btn-default btn-sm"><span class="fa fa-quote-left"></span></button>
                    <button class="btn btn-default btn-sm"><span class="fa fa-code"></span></button>
                    <button class="btn btn-default btn-sm"><span class="fa fa-list-ol"></span></button>
                    <button class="btn btn-default btn-sm"><span class="fa fa-list-ul"></span></button>
                    <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-picture"></span></button>
                    <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-film"></span></button>
                    <button class="btn btn-default btn-sm"><span class="fa fa-superscript"></span></button>
        </div>
            <div class="editable-box">
                <div contenteditable="true" placeholder="写回答..." class="answeradd-textarea"></div>
                <div class="editable-box-btn">
                    <button class="btn btn-primary">提交回答</button>
                </div>
            </div>
        </div>
    </div>

    {{-- 问题页面右半部份 --}}
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">关于作者</h3>
            </div>
            <div class="panel-body" class="about-author">
                <div class="about-author-head">
                    @include('home.question._author')
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
                    <img src="img/avatar04.png" alt="" width="40" height="40">
                    <span>运营拆解怎么做“电影营销”</span>
                </li>
                <li class="list-group-item">
                    <img src="img/avatar04.png" alt="" width="40" height="40">
                    <span>不该被遗忘：22 位慰安妇老人的人生故事</span>
                </li>
                <li class="list-group-item">
                    <img src="img/avatar04.png" alt="" width="40" height="40">
                    <span>如何成为自由职业译员？</span>
                </li>
                <li class="list-group-item">
                    <img src="img/avatar04.png" alt="" width="40" height="40">
                    <span>编剧：从创意到剧本全攻略</span>
                </li>
                <li class="list-group-item">
                    <img src="img/avatar04.png" alt="" width="40" height="40">
                    <span>阿甘与郭靖的人生通关密码</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
{{-- End --}}