@extends('home.people.activities')

@section('bread')
<ul class="nav nav-pills">
   <li role="presentation" ><a href="/people/activities">动态</a></li>
   <li role="presentation"><a href="/people/answers">回答 <span>10</span></a></li>
   <li role="presentation"><a href="/people/asks">提问 <span>10</span></a></li>
   <li role="presentation"  class="active"><a href="/people/columns">专栏 <span>10</span></a></li>
   <li role="presentation"><a href="/people/collections">收藏 <span>10</span></a></li>
   <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          更多 <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li role="presentation"><a href="/people/collections">分享 <span>10</span></a></li>
          <li role="presentation"><a href="/people/collections">关注 <span>10</span></a></li>
        </ul>
   </li>
</ul>
@endsection

@section('daohang')
<div role="tabpanel" class="tab-pane" id="zhuanlan">
	<div class="dongtai-dongtai">
	<span>我的专栏</span>
    </div>
    <div class="zhuan-item">
    	<div class="zhuan-left pull-left">
    		<a href=""><img src="holder.js/70x70"></a>
    	</div>
    	<div class="zhuan-right">
    		<h4><a href="">不被发布</a></h4>
    		<span class="zhuan-desc">自己的专栏</span>
    		<div class="zhuan-bottom">发表 <span>24</span> 篇文章 • 共 <span> 14 </span>
    		篇文章 • <span> 70421 </span>人关注
    		</div>
    	</div>
    </div>

</div>
@endsection