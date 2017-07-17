@extends('admin.index')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('container')
<div class="row">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
        <div class="widget am-cf">
            <div class="widget-head am-cf">
                <div class="widget-title am-fl">修改收藏夹</div>
                <div class="widget-function am-fr">
                    <a href="javascript:;" class="am-icon-cog"></a>
                </div>
            </div>
            <div class="widget-body am-fr">
                <form id="photoForm" class="am-form tpl-form-border-form tpl-form-border-br" action="{{route('colEdit')}}" method="post" enctype="multipart/form-data">
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
                        <label for="user-name" class="am-u-sm-3 am-form-label">收藏夹名字 <span class="tpl-form-line-small-title">name</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="tpl-form-input"  name="name" value="{{$res->name}}" placeholder="请输入收藏夹名字">
                            <small>请填写10-20字左右文字。</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-email" class="am-u-sm-3 am-form-label">发布时间 <span class="tpl-form-line-small-title">Time</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-form-field tpl-form-no-bg" name="created_at" value="{{$res->created_at}}" placeholder="发布时间" data-am-datepicker="" readonly="">
                            <small>发布时间为必填</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">创建者 <span class="tpl-form-line-small-title">Author</span></label>
                        <div class="am-u-sm-9">
                            <input type="text" class="am-form-field" name="username" value="{{DB::table('users')->where('id',$res->user_id)->first()->name}}" placeholder=""  readonly="">
                            <small>提问者为必填</small>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">收藏夹描述</label>
                        <div class="am-u-sm-9">
                            <textarea class="" name="describe" rows="10" id="user-intro" placeholder="这个人太懒了，什么都么写"> @if(empty($v->intro)) 这个人太懒了，神马都么写 @else {{$v->intro}} @endif </textarea>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$res->id}}">
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
    // $.ajaxSetup({
    //     headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    // });
    // function doUpload() {
    //     var formData = new FormData($("#photoForm")[0]);
    //     // console.log(formData);
    //     $.ajax({
    //         url: "/admin/found/ajax",
    //         type: 'POST',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function (returndata) {
    //             $("#avatar_url").attr('src',returndata);
    //             // console.log(returndata);
    //         },
    //         error: function (returndata) {
    //             alert('上传失败');
    //         }
    //     });
    // }
        $('#home_page').find('a').removeAttr('class');
        $('#collect a:eq(0)').attr('class','active');
        $('#collect').find('ul').attr('style','display:block');
        $('#listCollect').find('a').attr('class','sub-active');
    </script>
@stop