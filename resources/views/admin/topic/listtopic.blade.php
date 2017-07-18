@extends('admin.index')

@section('title', '话题列表')

@section('container')
		<html>
 <head></head>
 <body>
  <div class="row"> 
   <div class="am-u-sm-12 am-u-md-12 am-u-lg-12"> 
    <div class="widget am-cf" > 
     <div class="widget-head am-cf"> 
      <div class="widget-title am-fl">
       话题管理
      </div> 
      <div class="widget-function am-fr"> 
       <a href="javascript:;" class="am-icon-cog"></a> 
      </div> 
     </div> 
     <div class="widget-body  widget-body-lg am-fr"> 
      <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r"> 
       <thead> 
        <tr> 
         <th>话题名称</th> 
         <th>话题描述</th> 
         <th>话题图像</th> 
         <th>时间</th> 
         <th>操作</th> 
        </tr> 
       </thead> 
       <tbody> 
        <tr class="gradeX"> 
         <td>Amaze UI 模式窗口</td> 
         <td>张鹏飞</td> 
         <td>2016-09-26</td> 
         <td>2016-09-26</td> 
         <td> 
          <div class="tpl-table-black-operation"> 
           <a href="javascript:;"> <i class="am-icon-pencil"></i> 编辑 </a> 
           <a href="javascript:;" class="tpl-table-black-operation-del"> <i class="am-icon-trash"></i> 删除 </a> 
          </div> </td> 
        </tr> 
        
       
        <!-- more data --> 
       </tbody> 
      </table> 
     </div> 
    </div> 
   </div> 
  </div> 
 </body>
</html>
@endsection