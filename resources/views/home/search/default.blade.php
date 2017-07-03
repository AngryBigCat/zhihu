@php
    $tab = [
        'tab' => [
            'one' => '内容',
            'two' => '用户',
            'three' => '话题',
        ]
    ]
@endphp

@extends('home.layouts.default')

@section('style')
    <style>
        body {
            background: #fff;
        }
        .topic-info-img {
            height: 60px;
            width: 60px;
            border-radius: 5px;
        }
        .topic-info-title {
            font-size: 14px;
        }
        .topic-counts {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }
        .counts-left {
            display: flex;
        }
        .counts-left a {
            display: flex;
            flex-direction: column;
            padding: 0 20px;
            text-align: center;
            border-right: 1px solid #ddd;
        }
        .counts-left a:hover {
            text-decoration: none;
        }
        .counts-left a:last-child {
            border-right: none;
        }
        .counts-left a span:first-child {
            color: #666;
            font-weight: bold;
        }
        .counts-left a span:last-child {
            color: #aaa;
        }
        .counts-left a:hover span {
            color: #259;
        }

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <search-view></search-view>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="topic-info">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object topic-info-img" src="img/avatar04.png">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading topic-info-title"><a href="#">互联网</a></h3>
                                <div>
                                    中国最大的互联网综合服务提供公司，主营以腾讯网、QQ、微信、腾讯微博、等为代表通过电子，无线和光纤网络技术等等一系列广泛的技术联系在一起.这种将计算机网…
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topic-counts">
                        <div class="counts-left">
                            <a href="#">
                                <span>18k</span>
                                <span>问题</span>
                            </a>
                            <a href="#">
                                <span>1000</span>
                                <span>精华</span>
                            </a>
                            <a href="#">
                                <span>1000</span>
                                <span>关注者</span>
                            </a>
                        </div>
                        <div class="counts-right">
                            <a href="#" class="btn btn-primary btn-sm">关注</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection