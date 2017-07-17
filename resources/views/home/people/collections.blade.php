@extends('home.people.activities')

@section('bread')
<ul class="nav nav-pills">
   <li role="presentation" ><a href="/people/activities">动态</a></li>
   <li role="presentation" ><a href="/people/answers">回答 <span>10</span></a></li>
   <li role="presentation"><a href="/people/asks">提问 <span>10</span></a></li>
   <li role="presentation"><a href="/people/columns">专栏 <span>10</span></a></li>
   <li role="presentation" class="active"><a href="/people/collections">收藏 <span>10</span></a></li>
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
<div role="tabpanel" class="tab-pane" id="shoucang">
    <div class="dongtai-dongtai">
    <span>我的收藏</span>
    </div>
    <div class="dongtai-content">
        
        <div class="dongtai-content-title">
            <a href="">淘宝上有屎？？？</a>
        </div>

        <div>
            <time>2017-3-24</time> • <span> 10 </span>个回答 • 
            <span> 10 </span>个关注
        </div>
    </div>
</div>
@endsection