@extends('layouts.default')

@section('style')
<style>
    .from-topic {
        color: #ccc;
    }
</style>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>最新动态</h4>
                <hr>
                <div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/avatar04.png" width="50" height="50">
                            </a>
                        </div>
                        <div class="media-body">
                            <span>来自话题：电影</span>
                            <h4 class="media-heading">怎样看待冯小刚吐槽现在的年轻演员娘？</h4>
                            <span>匿名用户, 左卵子里装着理性，右卵子里是客观，中间…</span>
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
                            <div>关注问题 65 条评论 感谢 分享 收藏 • 没有帮助 • 举报 • 作者保留权利</div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/avatar04.png" width="50" height="50">
                            </a>
                        </div>
                        <div class="media-body">
                            <span>来自话题：电影</span>
                            <h4 class="media-heading">怎样看待冯小刚吐槽现在的年轻演员娘？</h4>
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
                            <div>关注问题 65 条评论 感谢 分享 收藏 • 没有帮助 • 举报 • 作者保留权利</div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/avatar04.png" width="50" height="50">
                            </a>
                        </div>
                        <div class="media-body">
                            <span>来自话题：电影</span>
                            <h4 class="media-heading">怎样看待冯小刚吐槽现在的年轻演员娘？</h4>
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
                            <div>关注问题 65 条评论 感谢 分享 收藏 • 没有帮助 • 举报 • 作者保留权利</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <ul class="list-group">
            <a href="#" class="list-group-item">我的收藏</a>
            <a href="#" class="list-group-item">我关注的问题</a>
            <a href="#" class="list-group-item">邀请我回答的问题</a>
        </ul>
        <ul class="list-group">
            <li class="list-group-item">公共编辑动态</li>
            <li class="list-group-item">社区服务中心</li>
            <li class="list-group-item">版权服务中心</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">知乎专栏</h3>
            </div>
            <ul class="list-group">
                <a href="./user-Column" class="list-group-item">专栏・发现</a>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">知乎 Live</h3>
            </div>
            <ul class="list-group">
                <a href="#" class="list-group-item">如何恰当地给出自己的意见</a>
                <a href="#" class="list-group-item">如何恰当地给出自己的意见</a>
                <a href="#" class="list-group-item">如何恰当地给出自己的意见</a>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">知乎圆桌</h3>
            </div>
            <ul class="list-group">
                <a href="#" class="list-group-item">科学健身入门</a>
                <a href="#" class="list-group-item">科学健身入门</a>
                <a href="#" class="list-group-item">科学健身入门</a>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">知乎圆桌</h3>
            </div>
            <ul class="list-group">
                <a href="#" class="list-group-item">烘焙的美好时光</a>
                <a href="#" class="list-group-item">烘焙的美好时光</a>
                <a href="#" class="list-group-item">烘焙的美好时光</a>
            </ul>
        </div>
    </div>
</div>
@stop