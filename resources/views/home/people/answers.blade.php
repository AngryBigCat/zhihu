@extends('home.people.activities')


@section('bread')
<ul class="nav nav-pills">
   <li role="presentation" ><a href="/people/activities">动态</a></li>
   <li role="presentation" class="active"><a href="/people/answers">回答 <span>10</span></a></li>
   <li role="presentation"><a href="/people/asks">提问 <span>10</span></a></li>
   <li role="presentation"><a href="/people/columns">专栏 <span>10</span></a></li>
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
<div role="tabpanel" class="tab-pane" id="huida">
	<div class="dongtai-dongtai">
	<span>我的回答</span>
	</div>
	<div class="dongtai-content">

		
		<div class="dongtai-content-title">
			<a href="">淘宝上有屎？？？</a>
		</div>
		<div class="dongtai-content-info col-md-12">
			<div class="dongtai-content-img pull-left"><a href=""><img style="width:50px;height:50px" src="{{ asset('uploads/headPic/boxed-bg.png') }}"></a></div>
			<div class="dongtai-content-name">
	    		<div class="col-md-12">
					<a href="">闻佳</a>
	    		</div>
	    		<div class="col-md-12">
	    			<span>不知道你吃饱没有，反正我吃饱了</span>
	    		</div>	
			</div>
		</div>

		<div class="col-md-12 dongtai-content-zan" >
			<a href=""><span>66666 </span> 人赞同了该回答</a>
		</div>
		<div class="dongtai-content-con">	
			<div class="col-md-12">
				
					叹！不过还是要提醒大家，开车跑长途一定要注意休息，毕竟命是自己的！放几张玩的时候拍的…
				
			</div>
		</div>
		<div class="dongtai-content-gongneng">
			<div class="btn-group" data-toggle="buttons">
			  <label class="btn-zan btn btn-info active">
			    <input type="radio" name="options" id="option1" autocomplete="off" checked>▲666
			  </label>
			  <label class="btn-buzan btn btn-info">
			    <input type="radio" name="options" id="option2" autocomplete="off">▼
			  </label>
			</div>
			<button class="dongtai-content-link"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>  666条评论</button>
			<button class="dongtai-content-link"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 分享</button>
			<button class="dongtai-content-link"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏</button>
			<button class="dongtai-content-link"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 感谢</button>
		</div>
	</div>
</div>
@endsection