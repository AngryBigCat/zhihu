<!DOCTYPE html>
<html lang="en">
 <head> 
  <meta charset="utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <title>@yield('title')</title> 
  <meta name="description" content="这是一个 index 页面" /> 
  <meta name="keywords" content="index" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link rel="icon" type="image/png" href="/admins/i/favicon.png" /> 
  <link rel="apple-touch-icon-precomposed" href="/admins/i/app-icon72x72@2x.png" /> 
  <meta name="apple-mobile-web-app-title" content="Amaze UI" /> 
  <script src="/admins/js/echarts.min.js"></script> 
  <link rel="stylesheet" href="/admins/css/amazeui.min.css" /> 
  <link rel="stylesheet" href="/admins/css/amazeui.datatables.min.css" /> 
  <link rel="stylesheet" href="/admins/css/app.css" /> 
  <script src="/admins/js/jquery.min.js"></script> 

  <meta name="_token" content="{{ csrf_token() }}"/>
  @yield('css')
 </head> 
 <body data-type="index"> 
  <script src="/admins/js/theme.js"></script> 
  <div class="am-g tpl-g"> 
   <!-- 头部 --> 
   <header> 
    <!-- logo --> 
    <div class="am-fl tpl-header-logo"> 
     <a href="javascript:;"><img src="/admins/img/logo.png" alt="" /></a> 
    </div> 
    <!-- 右侧内容 --> 
    <div class="tpl-header-fluid"> 
     <!-- 侧边切换 --> 
     <div class="am-fl tpl-header-switch-button am-icon-list"> 
      <span> </span> 
     </div> 
     <!-- 搜索 --> 
     <div class="am-fl tpl-header-search"> 
      <form class="tpl-header-search-form" action="javascript:;"> 
       <button class="tpl-header-search-btn am-icon-search"></button> 
       <input class="tpl-header-search-box" type="text" placeholder="搜索内容..." /> 
      </form> 
     </div> 
     <!-- 其它功能--> 
     <div class="am-fr tpl-header-navbar"> 
      <ul> 
       <!-- 欢迎语 --> 
       <li class="am-text-sm tpl-header-navbar-welcome"> <a href="javascript:;">欢迎你, <span>要你管</span> </a> </li> 
       <!-- 退出 --> 
       <li class="am-text-sm"> <a href="{{ route('admin.logout') }}"> <span class="am-icon-sign-out"></span> 退出 </a> </li> 
      </ul> 
     </div> 
    </div> 
   </header> 
   <!-- 风格切换 --> 
   <div class="tpl-skiner"> 
    <div class="tpl-skiner-toggle am-icon-cog"> 
    </div> 
    <div class="tpl-skiner-content"> 
     <div class="tpl-skiner-content-title">
       选择主题 
     </div> 
     <div class="tpl-skiner-content-bar"> 
      <span class="skiner-color skiner-white" data-color="theme-white"></span> 
      <span class="skiner-color skiner-black" data-color="theme-black"></span> 
     </div> 
    </div> 
   </div> 
   <!-- 侧边导航栏 --> 
   <div class="left-sidebar"> 
    <!-- 用户信息 --> 
    <div class="tpl-sidebar-user-panel"> 
     <div class="tpl-user-panel-slide-toggleable"> 
      <div class="tpl-user-panel-profile-picture"> 
       <img src="/admins/img/user04.png" alt="" /> 
      </div> 
      <span class="user-panel-logged-in-text"> <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i> 禁言小张</span> 
      <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a> 
     </div> 
    </div> 
    <!-- 菜单 --> 
    <ul class="sidebar-nav"> 
    <li class="sidebar-nav-link">
        <a href="/admin" >
            <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
        </a>
    </li>
    
    <li class="sidebar-nav-link"> <a href="javascript:;" class="sidebar-nav-sub-title "> <i class="am-icon-table sidebar-nav-link-logo"></i>  用户管理 </a> 
      	<ul class="sidebar-nav sidebar-nav-sub"> 
         <li class="sidebar-nav-link"> <a href="{{ url('admin/user') }}"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 用户列表 </a> </li> 
	       <li class="sidebar-nav-link"> 
          <a class="" href="{{ route('user.delList') }}"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 删除的用户 </a> 
         </li> 
	       <li class="sidebar-nav-link">
         <a href="{{ url('admin/user/create') }}"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 用户增加 </a> </li> 
     	  </ul> 
    </li> 

    <li class="sidebar-nav-link"> <a href="javascript:;" class="sidebar-nav-sub-title"> <i class="am-icon-wpforms sidebar-nav-link-logo"></i>  话题管理  </a> 
      	<ul class="sidebar-nav sidebar-nav-sub"> 
	       <li class="sidebar-nav-link"> <a href="/admin/listtopic"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 话题列表 </a> </li> 
	       <li class="sidebar-nav-link"> <a href="/admin/topiccreate"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 话题增加 </a> </li> 
     	</ul> 
    </li> 

    <li class="sidebar-nav-link"> <a href="javascript:;" class="sidebar-nav-sub-title"> <i class="am-icon-clone sidebar-nav-link-logo"></i>  问题管理  </a> 
      	<ul class="sidebar-nav sidebar-nav-sub"> 
	       <li class="sidebar-nav-link"> <a href="table-list.html"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 问题列表 </a> </li> 
	       <li class="sidebar-nav-link"> <a href="table-list-img.html"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 问题增加 </a> </li> 
     	</ul> 
    </li> 

    <li class="sidebar-nav-link"> <a href="javascript:;" class="sidebar-nav-sub-title"> <i class="am-icon-key sidebar-nav-link-logo"></i> 发现管理  </a> 
      	<ul class="sidebar-nav sidebar-nav-sub"> 
	       <li class="sidebar-nav-link"> <a href="table-list.html"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 发现列表 </a> </li> 
	       <li class="sidebar-nav-link"> <a href="table-list-img.html"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 发现增加 </a> </li> 
     	</ul> 
    </li> 

    <li class="sidebar-nav-link"> <a href="javascript:;" class="sidebar-nav-sub-title"> <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 回答管理  </a> 
        <ul class="sidebar-nav sidebar-nav-sub"> 
         <li class="sidebar-nav-link"> <a href="/admin/answer"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 回答列表 </a> </li> 
         <li class="sidebar-nav-link"> <a href="/admin/del_answer"> <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 删除的回答 </a> </li> 
      </ul> 
    </li> 

    </ul> 

   </div> 
   <!-- 内容区域 --> 
   <div class="tpl-content-wrapper">
   		 @yield('content')
   </div>
    
  <script src="/admins/js/amazeui.min.js"></script> 
  <script src="/admins/js/amazeui.datatables.min.js"></script> 
  <script src="/admins/js/dataTables.responsive.min.js"></script> 
  <script src="/admins/js/app.js"></script>
  @yield('script')
 </body>
</html>