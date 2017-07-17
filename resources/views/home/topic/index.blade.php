@extends('home.layouts.default')

@section('title')
    话题广场
@endsection

@section('style')
<style>
    .topic-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .topic-item {
        width: 50%;
        margin-bottom: 20px;
    }
    .topic-item:nth-of-type(odd) {
        padding-right: 5px;
    }
    .topic-item:nth-of-type(even) {
        padding-left: 5px;
    }
    .topic-item:nth-last-child(1), .topic-item:nth-last-child(2)  {
        margin-bottom: 0;
    }
    .topic-item-img {
        height: 60px;
        width: 60px;
    }
    .topic-item-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0
    }
    .topic-item-title {
        font-weight: bold;
        color: #259;
    }
    .topic-item-describe {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-paper-plane-o"></i> 话题广场</h4>
                </div>
                <div class="panel-body">
                    @include('home.topic._topic-list')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            asd
        </div>
    </div>
@endsection


