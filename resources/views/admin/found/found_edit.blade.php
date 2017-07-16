@extends('admin.index')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('container')
<div class="row">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
        <div class="widget am-cf">
            <div class="widget-head am-cf">
                <div class="widget-title am-fl">修改问题</div>
                <div class="widget-function am-fr">
                    <a href="javascript:;" class="am-icon-cog"></a>
                </div>
            </div>
            <div class="widget-body am-fr">
                <form id="photoForm" class="am-form tpl-form-border-form tpl-form-border-br" action="{{route('edit')}}" method="post" enctype="multipart/form-data">
	                @if (count($errors) > 0)
					    <div class="am-alert am-form-message am-error am-bg-danger">
							出错啦!!
				            <ul>
				            	@foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
				            </ul>
				        </div>
					@endif
					<ul>

                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">问题标题 <span class="tpl-form-line-small-title">Title</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="tpl-form-input" id="user-name" name="title" value="{{$res[0]->title}}" placeholder="请输入问题文字">
                            <small>请填写标题文字10-20字左右。</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">发布时间 <span class="tpl-form-line-small-title">Time</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-form-field tpl-form-no-bg" name="created_at" value="{{$res[0]->created_at}}" placeholder="发布时间" data-am-datepicker="" readonly="">
                            <small>发布时间为必填</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">提问者 <span class="tpl-form-line-small-title">Author</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-form-field" name="name" value="{{$res[0]->name}}" placeholder="发布时间"  readonly="">
                            <small>提问者为必填</small>
                        </div>
                    </div>
                    @if(!empty($res[0]->qs_img))
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">问题插图<span class="tpl-form-line-small-title">Images</span></label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                    <img id="avatar_url" src="{{ltrim($res[0]->qs_img,'.')}}" alt="" width="300px">
                                </div>
                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i> 修改问题插图</button>
                                <input  type="file" onchange="doUpload()"  id="doc-form-file" name="qs_img">

                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">添加分类 <span class="tpl-form-line-small-title">Type</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" name="topic" id="user-weibo" value="{{$res[0]->topic}}" placeholder="请添加分类用英文逗号隔开">
                            <div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">隐藏文章</label>
                        <div class="am-u-sm-9">
                            <div class="tpl-switch">
                                <input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" checked="">
                                <div class="tpl-switch-btn-view">
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">文章内容</label>
                        <div class="am-u-sm-9">
                            <textarea class="" name="describe" rows="10" id="user-intro" placeholder="请输入文章内容"> {{$res[0]->describe}} </textarea>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$res[0]->id}}">
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

	<script type="text/javascript">
    // alert($);
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    });
    function doUpload() {
        var formData = new FormData($("#photoForm")[0]);
        // console.log(formData);
        $.ajax({
            url: "/admin/found/ajax",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (returndata) {
                $("#avatar_url").attr('src',returndata);
                // console.log(returndata);
            },
            error: function (returndata) {
                alert(returndata);
            }
        });
    }
        $('#home_page').find('a').removeAttr('class');
        $('#found a:eq(0)').attr('class','active');
        $('#found').find('ul').attr('style','display:block');
        $('#listFound').find('a').attr('class','sub-active');
    </script>
@stop