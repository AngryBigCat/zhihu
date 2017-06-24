
   @extends('layouts.default')
   @section('style') 
 <style>
     body{
     	background-color:#FFFFFF;
     }
    .userseting-name {
    	float:left;
    	
    	padding-top:30px;
    }

    .userseting-domain {
    	float:left;
    	
    	padding-top:30px;
    	
    }
    .userseting-yinsi {
    	float:left;
    	
    	padding-top:30px;
    	
    }
    .userseting-button {
    	float:left;
    	
    	padding-top:50px;
    	
    }
    
    span{
    	font-size:16px;
    	color:#222222;
    }
    a{
    	font-size:16px;
    	color:#225599;
    }
    
</style>
 @stop @section('content') 

  <div class="container"> 
   <!--选项--> 
   <div class="daohang"> 
    <ul class="nav nav-tabs"> 
     <li role="presentation" class="active"><a href="./user-Settings">基本资料</a></li> 
     <li role="presentation"><a href="./user-account">账户和密码</a></li> 
     <li role="presentation"><a href="./user-Messages">消息和邮件</a></li> 
     <li role="presentation"><a href="./user-shield">屏蔽</a></li> 
    </ul> 
   </div> 

   <!--修改姓名--> 
   <div class="userseting-name"> 
    <form action="" method="POST"> 
     <div class="navbar-form navbar-left" role="search"> 
      <span>姓名:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <div class="form-group"> 
       <span>我想睡觉</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div> 
      <a class="btn btn-link" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size:10px;color:#999999;"> 修改 </a> 
      <div class="collapse" id="collapseExample"> 
       <div class="well">
         ... 
       </div> 
      </div> 
     </div> 
   </div> 
   <div class="clearfix"></div> 

   <!--修改域名--> 
   <div class="userseting-domain"> 
    <div class="navbar-form navbar-left" role="search"> 
     <span>个性域名:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
     <div class="form-group"> 
      <input type="text" class="form-control" placeholder="Search" /> 
     </div> &nbsp;&nbsp;
     <span style="font-size:10px;color:#999999;">只能修改一次</span> 
    </div> 
   </div> 
   <div class="clearfix"></div> 

   <!--隐私保护--> 
   <div class="userseting-yinsi"> 
    <div class="navbar-form navbar-left" role="search"> 
     <span>隐私保护:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
     <label>
      <input type="checkbox" /> 
     &nbsp;&nbsp;
     <a>在站外搜到我在知乎创作的内容时，我的姓名将不会被显示</a> 
     </label>
    </div> 
   </div> 
   <div class="clearfix"></div> 

   <!--提交按钮--> 
   <div class="userseting-tutton"> 
    <hr /> 
    <button class="btn btn-primary">提交</button> 
   </div> 
   </form>
  </div> 
  @endsection
 