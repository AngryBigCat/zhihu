@extends('admin.index')

@section('title', '收藏列表')

@section('style')
<style>
    #info{
        width:200px;
        background-color: #5EB95E;
        text-align: center;
        border-radius: 5px;
    }
</style>
@stop

@section('content')
	<div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">推荐列表</div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div id="info">
                                {{Session::get('info')}}
                                </div>
                            </div>
                        </div>
                        <form action="{{route('listCollect')}}">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                            <div  class="am-form-group tpl-table-list-select">
                                <select id="select" size="1" name="num" data-am-selected="{btnSize: 'sm'}">
                                    <option value="10" @if(!empty($data['num']) && $data['num'] == 10) selected @endif >10 条数据</option>
                                    <option value="9" @if(!empty($data['num']) && $data['num'] == 9) selected @endif>9 条数据</option>
                                    <option value="8" @if(!empty($data['num']) && $data['num'] == 8) selected @endif>8 条数据</option>
                                    <option value="6" @if(!empty($data['num']) && $data['num'] == 6) selected @endif>6 条数据</option>
                                </select>
                            </div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                        
                            <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                <input type="text" name="keywords" class="am-form-field" value="{{$data['keywords'] or ''}}" placeholder="问题查询">
                                <span class="am-input-group-btn"> <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit"></button> </span>
                            </div>
                        </form>
                        </div>
                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="">
                                <thead>
                                    <tr>
                                        <th width="100px">收藏夹ID</th>
                                        <th>收藏夹</th>
                                        <th>创建者</th>
                                        <th>收藏夹描述</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $v)
                                    <tr class="gradeX">
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{DB::table('users')->where('id',$v->user_id)->first()->name}}</td>
                                        <td>@if(empty($v->intro))
                                                这个人太懒了，神马都么写
                                            @else
                                                {{$v->intro}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <!-- <a href="javascript:;">
                                                    <i class="am-icon-chevron-circle-up"></i> 加精
                                                </a>
                                                <a href="javascript:;" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-arrow-circle-up"></i> 置顶
                                                </a> -->
                                                <a href="/admin/colEdit/{{$v->id}}">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="/admin/colDel/{{$v->id}}" class="tpl-table-black-operation-del" onClick="delcfm()" type="submit">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                    <!-- more data -->
                                </tbody>
                            </table>
                        </div>
                        <div class="am-u-lg-12 am-cf">
                            <div class="am-fr" id="page">
                                {!! $res->appends($data)->render() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    {{-- 删除按钮弹框 --}}
    function delcfm() { 
        if (!confirm("确认要删除？")) { 
            window.event.returnValue = false; 
        } 
    } 

    {{-- 左侧导航栏选中 --}}
    $('#home_page').find('a').removeAttr('class');
    $('#collect a:eq(0)').attr('class','active');
    $('#collect').find('ul').attr('style','display:block');
    $('#listCollect').find('a').attr('class','sub-active');
    
    $('#info').fadeOut(3000);
    </script>
@stop