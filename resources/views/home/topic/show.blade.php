@extends('home.layouts.default')

@section('title')

@section('style')
<style>
    .topic-img {
        width: 80px;
        height: 80px;
    }
    .topic-body {
        height: 80px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object topic-img img-rounded" src="/img/avatar04.png">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="topic-body">
                                <h3>游戏</h3>
                                <div>
                                    <a href="#">等待回答</a> |
                                    <a href="#">精华</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
@endsection