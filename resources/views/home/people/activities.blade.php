@extends('home.people.default')

	@section('daohang')
	<div role="tabpanel" class="tab-pane active" id="dongtai">
		<div class="dongtai-dongtai">
			<span>{{ $count['sex'] }}的动态</span>
		</div>
	    	
		<div class="dongtai-content">
	    	<div class="dongtai-content-first">
	    		<span>赞同了回答</span>
	    		<span class="pull-right">20分钟前</span>
	    	</div>
	    	<div class="dongtai-content-title">
	    		<a href="">淘宝上有屎？？？</a>
	    	</div>
	    	<div class="dongtai-content-info col-md-12">
	    		<div class="dongtai-content-img pull-left"><a href=""><img src="holder.js/50x50?text=头像"></a></div>
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
	    			不觉已经有八百赞了。虽然有这么危险的经历，但是在重庆和回程的时候见的风景真的是非常的震撼，大自然的鬼斧神工让我为之惊叹！不过还是要提醒大家，开车跑长途一定要注意休息，毕竟命是自己的！放几张玩的时候拍的…不觉已经有八百赞了。虽然有这么危险的经历，但是在重庆和回程的时候见的风景真的是非常的震撼，大自然的鬼斧神工让我为之惊叹！不过还是要提醒大家，开车跑长途一定要注意休息，毕竟命是自己的！放几张玩的时候拍的…
	    		</div>
	    	</div>

	    	<div class="dongtai-content-gongneng">
				<div class="btn-group" data-toggle="buttons">
				  <label class="btn-zan btn btn-info active">
				    <input type="radio" name="options" id="option1" autocomplete="off" checked>▲666
				  </label>
				  <label class="btn-buzan btn btn-info">
				    <input class="" type="radio" name="options" id="option2" autocomplete="off">▼
				  </label>
				</div>
				</span>
				<button class="dongtai-content-link"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 666条评论</button>
				<button class="dongtai-content-link"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 分享</button>
				<button class="dongtai-content-link"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏</button>
				<button class="dongtai-content-link"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 感谢</button>
			</div>
		</div>
	</div>
@endsection

