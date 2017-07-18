@extends('admin.index')

@section('title', '发现列表')

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
                        <form action="{{route('listFound')}}">
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
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
                                        <th width="400px">问题标题</th>
                                        <th>提问者</th>
                                        <th>浏览量</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $v)
                                    <tr class="gradeX">
                                        <td>{{$v->title}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->visit_count}}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <!-- <a href="javascript:;">
                                                    <i class="am-icon-chevron-circle-up"></i> 加精
                                                </a>
                                                <a href="javascript:;" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-arrow-circle-up"></i> 置顶
                                                </a> -->
                                                <a href="/admin/edit/{{$v->id}}/fon">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="/admin/del/{{$v->id}}/fon" class="tpl-table-black-operation-del" onClick="delcfm()" type="submit">
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
    // {{-- ajax更新页面显示数据 --}}
    //  $.ajaxSetup({
    //     headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    // });

    // $('#select').change(function(){
    //     var num = $(this).children('option:selected').val();
    //     console.log(num);
    //     $.ajax({
    //         url: "/amin/listAjax",
    //         type: 'GET',
    //         data:{'num':num},
    //         // dataType:'json',
    //         success: function (data) {
    //             console.log(data);
    //         },
    //         error: function (data) {
    //             alert(data);
    //         }
    //     });
    // });

    {{-- 删除按钮弹框 --}}
    function delcfm() { 
        if (!confirm("确认要删除？")) { 
            window.event.returnValue = false; 
        } 
    } 

    {{-- 左侧导航栏选中 --}}
    $('#home_page').find('a').removeAttr('class');
    $('#found a:eq(0)').attr('class','active');
    $('#found').find('ul').attr('style','display:block');
    $('#listFound').find('a').attr('class','sub-active');
    
    $('#info').fadeOut(3000);
    </script>
@stop