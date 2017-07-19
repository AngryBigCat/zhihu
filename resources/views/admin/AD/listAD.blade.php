@extends('admin.index')

@section('title', '广告列表')

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
                        <div class="widget-title  am-cf">广告列表</div>
                    </div>
                    <div class="widget-body  am-fr">
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div id="info">
                                {{Session::get('info')}}
                                </div>
                            </div>
                        </div>
                        <form action="{{route('listAD')}}">
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
                                        <th width="100px">广告ID</th>
                                        <th>广告名</th>
                                        <th>广告地址</th>
                                        <th>广告图</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($res as $v)
                                    <tr class="gradeX">
                                        <td style="height:225px;line-height: 225px">{{$v->id}}</td>
                                        <td style="height:225px;line-height: 225px">{{$v->ad_name}}</td>
                                        <td style="height:225px;line-height: 225px" class="address" url="{{$v->url}}">
                                            <span>{{$v->url}}</span>
                                            <input type="text" class="dbl" value="{{$v->url}}" ad_id="{{$v->id}}" name="url" style="width: 90%; padding: 6px 12px; line-height: 1.42857; background-color: #fff; background-image: none; background: 0 0; text-indent: .5em; border: 1px solid rgba(255, 255, 255, 0.2); -o-border-radius: 0; border-radius: 0; color: #fff; box-shadow: none; padding-left: 0; padding-right: 0; font-size: 14px; margin-top: 95px; display: none;">
                                        </td>
                                        <td style="height:225px;line-height: 225px"><form action="" id="photoForm">
                                        <div class="am-form-group am-form-file" style="cursor: pointer">
                                            <img class="ad" src="{{ltrim($v->img,'.')}}" alt="广告图" width="270px" height="225px">
                                            <input  type="file" onchange="doUpload()"  id="doc-form-file" name="img">
                                            <input type="hidden" name="id" value="{{$v->id}}">
                                        </div>
                                        </form>
                                        </td>
                                        <td style="height:225px;line-height: 225px">
                                            <div class="tpl-table-black-operation">
                                                <!-- <a href="javascript:;">
                                                    <i class="am-icon-chevron-circle-up"></i> 加精
                                                </a>
                                                <a href="javascript:;" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-arrow-circle-up"></i> 置顶
                                                </a> -->
                                                <!-- <a href="/admin/colEdit/{{$v->id}}">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a> -->
                                                <a href="/admin/adDel/{{$v->id}}" class="tpl-table-black-operation-del" onClick="delcfm()" type="submit">
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
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    });

    {{-- 删除按钮弹框 --}}
    function delcfm() { 
        if (!confirm("确认要删除？")) { 
            window.event.returnValue = false; 
        } 
    }

    {{-- 双击事件 --}}
    $('.address').dblclick(function(){
        $(this).find('span').css('display','none');
        $(this).find('input[name="url"]').css('display','block');
        $(this).find('input[name="url"]').focus();
    })
    $('.dbl').blur(function(){
        var id = $(this).attr('ad_id');
        var val = $(this).val();
        var _this = $(this);
        $.ajax({
                url : '/admin/AD',
                type: 'post',
                data: {
                    'url' : val,
                    'id' : id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == '0') {
                        _this.css('display','none');
                        _this.prev('span').css('display','block');
                        _this.prev('span').html(val);
                        $('#info').html(data.msg).fadeIn(1500).fadeOut(1500);
                    } else {
                        _this.css('display','none');
                        _this.prev('span').css('display','block');
                        _this.prev('span').html(val);
                        $('#info').html(data.msg).addClass('color','red').fadeIn(1500).fadeOut(1500);
                    } 
                console.log(data);
                }

            });
        // alert(id);
    });
    {{-- ajax更新图片 --}}
     function doUpload() {
        var formData = new FormData($("#photoForm")[0]);
        $.ajax({
            url: "/admin/ad/ajax",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (returndata) {
                // $('.ad').attr('src',returndata);
                // location.reload()
                console.log(returndata);
            }
            // error: function (returndata) {
            //     alert('上传失败');
            // }
        });
    }

   

    {{-- 左侧导航栏选中 --}}
    $('#home_page').find('a').removeAttr('class');
    $('#AD a:eq(0)').attr('class','active');
    $('#AD').find('ul').attr('style','display:block');
    $('#listAD').find('a').attr('class','sub-active');
    
    $('#info').fadeOut(3000);
    </script>
@stop