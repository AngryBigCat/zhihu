@extends('admin.index')

@section('title', '话题修改')

@section('content')
<div class="container-fluid am-cf">
    <div class="row"> 
   	    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12"> 
    	    <div class="widget am-cf"> 
	     		<div class="widget-head am-cf"> 
	      			<div class="widget-title am-fl">话题修改</div> 
			        <div class="widget-function am-fr"> 
			        <a href="javascript:;" class="am-icon-cog"></a> 
			        </div> 								
	     		</div> 

     			<div class="widget-body am-fr"> 
		        	<form class="am-form tpl-form-line-form" action="/admin/topicupdate" method="post" enctype="multipart/form-data">
	                    <div class="am-form-group">
	                        <label for="user-name" class="am-u-sm-3 am-form-label">话题名称</label>
	                        <div class="am-u-sm-9">
	                            <input type="text" class="tpl-form-input" id="user-name" name="tag_name" value="{{$info->tag_name}}">
	                        </div>
	                    </div>

	                    <div class="am-form-group">
	                        <label for="user-phone" class="am-u-sm-3 am-form-label">父级分类</label>
	                        <div class="am-u-sm-9">
	                            <select data-am-selected="{searchBox: 1}" style="display: none;" name="pid">
	                            	  <option value="0">请选择</option>
	                            	  @foreach($tags as $k=>$v)
											<option value="{{$v->id}}" @if($info->pid == $v->id) selected @endif >{{$v->tag_name}}</option>
									  @endforeach
								</select>
	                        </div>
	                    </div>

	                    <div class="am-form-group">
	                        <label for="user-weibo" class="am-u-sm-3 am-form-label">话题缩略图</label>
	                        <div class="am-u-sm-9">
	                            <div class="am-form-group am-form-file">
	                                <div class="tpl-form-file-img">
	                                    <img src="{{$info->img}}" style="width:100px" alt="">
	                                </div>
	                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
											 <i class="am-icon-cloud-upload"></i> 添加话题缩略图</button>
	                                <input id="doc-form-file" type="file" multiple="" name="img">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="am-form-group">
	                        <label for="user-intro" class="am-u-sm-3 am-form-label">话题描述</label>
	                        <div class="am-u-sm-9">
	                            <textarea class="" rows="10" id="user-intro" placeholder="请输入话题描述" name="description" ></textarea>
	                        </div>
	                    </div>

	                    <div class="am-form-group">
	                        <div class="am-u-sm-9 am-u-sm-push-3">
	                           <!--  <button type="submit" value="登入" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button> -->
	                           {{csrf_field()}}
	                           <input type="hidden" name="id" value="{{$info->id}}">
	                           <input type="submit" value="更新" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
	                        </div>
	                    </div>
	                </form>
			     </div> 
			</div>
		</div> 
	</div> 
</div>
@endsection