@extends('admin.index')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('container')
<div class="row">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
        <div class="widget am-cf">
            <div class="widget-head am-cf">
                <div class="widget-title am-fl"><i class="am-icon-plus sidebar-nav-link-logo"></i>广告添加</div>
                <div class="widget-function am-fr">
                    <a href="javascript:;" class="am-icon-cog"></a>
                </div>
            </div>
            <div class="widget-body am-fr">
                <form id="photoForm" class="am-form tpl-form-border-form tpl-form-border-br" action="{{route('doAdd')}}" method="post" enctype="multipart/form-data">
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
                        <label for="user-name" class="am-u-sm-3 am-form-label">广告标题 <span class="tpl-form-line-small-title">Title</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="tpl-form-input" id="ad_name" name="title" value="" placeholder="请输入广告文字">
                            <small>请填写标题文字不得多于20字左右。</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">广告地址 <span class="tpl-form-line-small-title">url</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-form-input" name="url" value="" placeholder="广告地址" >
                            <small>广告地址为必填</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">广告图<span class="tpl-form-line-small-title">Images</span></label>
                        <div class="am-u-sm-9">
                                <input  type="file" class="am-form-file" name="img">
                        </div>
                    </div>
                    {{csrf_field()}}
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
    
        $('#home_page').find('a').removeAttr('class');
        $('#AD a:eq(0)').attr('class','active');
        $('#AD').find('ul').attr('style','display:block');
        $('#adAdd').find('a').attr('class','sub-active');
    </script>
@stop