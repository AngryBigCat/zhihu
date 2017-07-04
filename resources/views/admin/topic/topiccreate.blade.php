@extends('admin.index')

@section('title', '话题增加')

@section('container')
<html>
 <head></head>
 <body>
  <div class="row"> 
   	<div class="am-u-sm-12 am-u-md-12 am-u-lg-12"> 
    	<div class="widget am-cf"> 
     		<div class="widget-head am-cf"> 
      			<div class="widget-title am-fl"> 话题增加 </div> 
			      <div class="widget-function am-fr"> 
			       <a href="javascript:;" class="am-icon-cog"></a> 
			      </div> 								
     		</div> 
     		<div class="widget-body am-fr"> 
     			 <form class="am-form tpl-form-line-form"> 

				       <div class="am-form-group"> 
				        <label for="user-name" class="am-u-sm-3 am-form-label">话题名称 <span class="tpl-form-line-small-title">Title</span></label> 
				        <div class="am-u-sm-9"> 
				         <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入标题文字" /> 
				         <small>请填写标题文字10-20字左右。</small> 
				        </div> 
				       </div> 

				       <div class="am-form-group"> 
				        <label for="user-email" class="am-u-sm-3 am-form-label">发布时间 <span class="tpl-form-line-small-title">Time</span></label> 
				        <div class="am-u-sm-9"> 
				         <input type="text" class="am-form-field tpl-form-no-bg" placeholder="发布时间" data-am-datepicker="" readonly="" /> 
				         <small>发布时间为必填</small> 
				        </div> 
				       </div> 
       
				       <div class="am-form-group"> 
				        <label class="am-u-sm-3 am-form-label">话题描述 <span class="tpl-form-line-small-title">SEO</span></label> 
				        <div class="am-u-sm-9"> 
				         <input type="text" placeholder="输入话题描述" /> 
				        </div> 
				       </div> 

				       <div class="am-form-group"> 
				        <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label> 
				        <div class="am-u-sm-9"> 
				         <div class="am-form-group am-form-file"> 
				          <div class="tpl-form-file-img"> 
				           <img src="assets/img/a5.png" alt="" /> 
				          </div> 
				          <button type="button" class="am-btn am-btn-danger am-btn-sm"> <i class="am-icon-cloud-upload"></i> 添加封面图片</button> 
				          <input id="doc-form-file" type="file" multiple="" /> 
				         </div> 
				        </div> 
				       </div> 
       
				       <div class="am-form-group"> 
				        <div class="am-u-sm-9 am-u-sm-push-3"> 
				         <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button> 
				        </div> 
				       </div> 
      				</form> 
			     </div> 
			    </div> 
			   </div> 
			  </div>
			 </body>
			</html>
@endsection