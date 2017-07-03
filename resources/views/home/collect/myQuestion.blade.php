@extends('home.layouts.default')

@section('style')
	<style>
		.font-s{
			font-size:13px;
		}
		
		.right-tool{
        	font-size:13px;
   		}
		#biaoqian li{
			border:1px solid #ccc;
			padding:0 15px;
			margin:25px 5px;
			border-radius:15px;
			color:red;
			float:left;
			list-style-type: none;
			height:30px;
			line-height: 30px;
		}
		#biaoqian{
			/*border:1px solid red;*/
			height:80px;
		}
		#biaoqian + input{
			margin:50px;
			width:300px;
		}
		#left{
			float: left;
		}
		#right{
			float: right;
		}
		#huati>div{
			height:30px;
			border-bottom:1px solid #ddd;
			margin-bottom:30px;
		}
		#tuijian li{
			list-style: none;
		}
		.zg{
			padding: 0 3px;
		    color: #BBB;
		    font-family: Arial;
		}
		.form{
			color:#888;
		}
		.t{
			font-weight: bold;
			color:#225599;

		}
   		#tuijian>li{
   			padding:10px;
			border-bottom: 1px solid #ddd;			
   		}
   		#remen li{
   			list-style: none;
   			padding:10px;
   			border-bottom:1px solid #eee;
   		}
   		#remen li>a{
   			color:#bbb;
   		}
		#yaoqing{
			height:60px;
			padding:25px 0 15px 0;
			border-bottom:1px solid #ddd;
		}
		#yaoqing>span{
			float:left;
		}
		#yaoqing>div{
			float:right;
		}
		#yaoqing>div>a{
			color:#888;
		}
		#m>li{
			padding:15px;
			list-style: none;
			border-bottom:1px solid #eeeeae;
		}
		#m>li>div{
			
			float: left;
		}
		#m button{
			margin:20px 20px 0 0;
			float: right;
		}
	</style>
@endsection

@section('content')

   <div class="row font-s" id="content">
        <div class="col-md-8" >
            <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
	            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">为你推荐</a></li>
	            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">全站热门</a></li>
	            <li role="presentation"><a href="#ans" aria-controls="ans" role="tab" data-toggle="tab">邀请回答</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div>
                	<ul id="biaoqian">
                		<li class="bg-info">
		                	<span>LOL英雄 </span>
		                	<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                	</li>
	                	<li class="bg-info">
		                	<span>LOL英雄 </span>
		                	<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                	</li>
	                	<li class="bg-info">
		                	<span>LOL英雄</span>
		                	<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                	</li>
                	</ul>
                	<input type="text" placeholder="添加擅长话题" class="form-control">
                </div>
				<div id="huati">
				<div>
					<span id="left">根据你擅长的话题，推荐以下问题</span>
					<div id="right">
						<a href="#">热门问题</a><span> | </span><a href="#">全部问题</a>
					</div>
				</div>
					<ul id="tuijian">
						<li>
							<span>来自：</span>
							<a href="#" class="form">知乎吉祥物</a>
							<h4><a href="#" class="t">求六看山表情包？</a></h4>
							<a href="#">还没有回答</a>
							<span class="zg">.</span>
							<a href="#"><span>3</span>人关注</a>
						</li>
						<li>
							<span>来自：</span>
							<a href="#" class="form">LOL英雄</a>
							<h4><a href="#" class="t">在lol中玩一个英雄上千把是一种怎样的体验？</a></h4>
							<a href="#"><span>7</span>个回答</a>
							<span class="zg">.</span>
							<a href="#"><span>8</span>人关注</a>
						</li>
						<li>
							<span>来自：</span>
							<a href="#" class="form">LOL英雄</a>
							<h4><a href="#" class="t">在lol中玩一个英雄上千把是一种怎样的体验？</a></h4>
							<a href="#"><span>7</span>个回答</a>
							<span class="zg">.</span>
							<a href="#"><span>8</span>人关注</a>
						</li>
						<li>
							<span>来自：</span>
							<a href="#" class="form">LOL英雄</a>
							<h4><a href="#" class="t">在lol中玩一个英雄上千把是一种怎样的体验？</a></h4>
							<a href="#"><span>7</span>个回答</a>
							<span class="zg">.</span>
							<a href="#"><span>8</span>人关注</a>
						</li>
					</ul>
				</div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
	            <div>

	                
					<ul id="remen">
					<li>
						<h5><a href="#" class="t">请问查看微信号怎样查看删除的微信聊天记录呢?</a></h5>
						<a href="#"><span>6</span>个回答</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">Robert Lucas 的理性预期 (rational expectations) 理论是否已经失效?</a></h5>
						<a href="#"><span>2</span>个回答	</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">请问查看微信号怎样查看删除的微信聊天记录呢?</a></h5>
						<a href="#">还没有回答</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">请问查看微信号怎样查看删除的微信聊天记录呢?</a></h5>
						<a href="#">还没有回答</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">Robert Lucas 的理性预期 (rational expectations) 理论是否已经失效?</a></h5>
						<a href="#"><span>2</span>个回答	</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">Robert Lucas 的理性预期 (rational expectations) 理论是否已经失效?</a></h5>
						<a href="#"><span>2</span>个回答	</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">Robert Lucas 的理性预期 (rational expectations) 理论是否已经失效?</a></h5>
						<a href="#"><span>2</span>个回答	</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">Robert Lucas 的理性预期 (rational expectations) 理论是否已经失效?</a></h5>
						<a href="#"><span>2</span>个回答	</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
					<li>
						<h5><a href="#" class="t">Robert Lucas 的理性预期 (rational expectations) 理论是否已经失效?</a></h5>
						<a href="#"><span>2</span>个回答	</a>
						<span class="zg">.</span>
						<a href="#"><span>3</span>人关注</a>
					</li>
				</div>
            </div>
            <div role="tabpanel" class="tab-pane" id="ans">
                <div id="yaoqing">
                	<span>邀请我回答的问题</span>
                	<div>
                		<a href="#">所有人（<span>1</span>）</a><span> | </span><a href="#">我关注的人（<span>1</span>）</a>
                	</div>
                </div>
                <ul id="m">
                	<li class="clearfix">
                		<div>
							<h5><a href="#" class="t">的额打算阿三打算阿三大？</a></h5>
							<a href="#">AngryCat </a><span> 邀请我回答</span>
							<span class="zg"> . </span>
							<span><span>6</span>个回答</span>
							<span class="zg">.</span>
							<span><span>3</span>人关注</span>
						</div>
						<button>忽略</button>
					</li>
					<li class="clearfix">
                		<div>
							<h5><a href="#" class="t">的额打算阿三打算阿三大？</a></h5>
							<a href="#">AngryCat </a><span> 邀请我回答</span>
							<span class="zg"> . </span>
							<span><span>6</span>个回答</span>
							<span class="zg">.</span>
							<span><span>3</span>人关注</span>
						</div>
						<button>忽略</button>

					</li>
					<li class="clearfix">
                		<div>
							<h5><a href="#" class="t">的额打算阿三打算阿三大？</a></h5>
							<a href="#">AngryCat </a><span> 邀请我回答</span>
							<span class="zg"> . </span>
							<span><span>6</span>个回答</span>
							<span class="zg">.</span>
							<span><span>3</span>人关注</span>
						</div>
						<button>忽略</button>
					</li>
					<li class="clearfix">
                		<div>
							<h5><a href="#" class="t">的额打算阿三打算阿三大？</a></h5>
							<a href="#">AngryCat </a><span> 邀请我回答</span>
							<span class="zg"> . </span>
							<span><span>6</span>个回答</span>
							<span class="zg">.</span>
							<span><span>3</span>人关注</span>
						</div>
						<button>忽略</button>
					</li>
                </ul>
            </div>
          </div>
        </div>
        @include('home.collect._rightTool')
    </div>
@endsection