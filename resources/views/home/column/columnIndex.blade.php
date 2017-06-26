@extends('home.column._article')

@section('column')
	<style type="text/css">
		.logo-zhihu {
			width:129px;
			height:129px;
			border:3px solid #222222;
			text-align:center;
			margin:0 auto;
			margin-top:94px;
		}
		.logo-zhihu > span {
			margin-top:20px;
			font-size:40px;
			font-weight:bold;
			color:#222222;
		}
		.prompt {
			height:30px;
			margin-top:70px;
			text-align:center;
			letter-spacing:6px;
			font-size:20px;
		}
		.button-a {
			width:120px;
			height:38px;
			border:1px solid #222222;
			border-radius:5px;
			text-align:center;
			margin:0 auto;
			margin-top:45px;
		}
		.button-a a {
			color:#222222;
		}
		.zhuanlan-kaitong {

			margin-top:13px;
			text-align:center;
			font-size:15px;
		}
		.zhuanlan-kaitong a {
			color:#50C87E;
			text-decoration:none;
		}
		.zhuanlan-content { 
			
		}
		.zhuanlan-faxian {

			margin:0 auto;
			margin-top:25px;
			width:500px;
			height:14px;
			
		}
		.zhuanlan-zuo {

			width:200px;
			height:9px;
			border-bottom:1px solid #D9D9D9;
		}
		.zhuanlan-zhong {
			width:80px;
			text-align:center;
			margin-left:10px;
		}
		.zhuanlan-you {
			width:200px;
			height:9px;
			border-bottom:1px solid #D9D9D9;
		}
		.zhuanlan-neirong {
			margin-top:30px;
		}
		
		.zhuanlan-ul {
			list-style:none;
		}
		.zhuanlan-ul li {
			width:20%;
			height:258px;
			float:left;
			margin:10px 2%;
			padding:0px 15px;
			background:white;
			 box-shadow:2px 1px 5px 2px #ccc;  
		}
		.zhuanlan-ul li a {
			text-decoration:none;
		}
		.zhuanlan-img img {
			border-radius:50%;
		}
		.zhuanlan-img{
			margin:24px auto 10px;
		}
		.zhuanlan-title a {
			color:#222222;
			font-size:15px;
			font-weight:700;
		}
		.zhuanlan-desc {
			height:42px;

		}
		.zhuanlan-desc a {
			color:#999;
		}
		.zhuanlan-count {
			font-size:13px;
		}
		.zhuan-jinru {
			border:1px solid #50C87E;
			width:90px;
			height:28px;
			border-radius:5px;
			line-height:28px;
		}
		.zhuan-jinru a {
			color:#50C87E;
		}
		.zhuan-jinru a:hover {
			color:#50C87E;
			background:;
		}
		.btn-huan{
			margin:32px 0px;
		}
		..zhuanlan-ul li {
			width:25%;
			height:258px;
			float:left;
			margin:10px 2%;
			padding:0px 15px;
			background:white;
			 box-shadow:2px 1px 5px 2px #ccc;  
		}
		.zhunalan-weibu {
			width:345px;
			height:72px;
			border-top:1px solid #97FFD8;
			border-bottom:1px solid #97FFD8;
			margin:0 auto;
			margin-top:132px;
			text-align:center;
			line-height:72px;
		}
		.zhuanlan-weibujieshao {
			font-size:18px;
			color:#222222;
			letter-spacing:14px;
		}
		.zhaunlan-shenqing {
			width:120px;
			height:38px;
			border:1px solid #222222;
			border-radius:5px;
			text-align:center;
			line-height:38px;
			margin:0 auto;
			margin-top:45px;
		}
		.zhuanlan-weibuanniu {
			color:#222222;
			text-decoration:none;
		}
		/*.zhuanlanwenzhang-img img {
			border-radius:5px;
		}
		.zhuanlanwenzahng-img{
			margin:24px auto 10px;
		}*/
		
		.zhuanlanwenzhang-ul {
			list-style:none;
		}
		.zhuanlanwenzhang-ul li {

			width:31%;
			height:228px;
			float:left;
			margin:5px 1%;
			padding:0px 0px;
			background:white;
			box-shadow:2px 1px 5px 2px #ccc; 
		}
		.zhuanlanwenzhang-title {
			width:270px;
			height:60px;
			color:#222222;
			font-size:15px;
			margin:0 auto;
			line-height:60px;
		}
		.zhuanlanwenzhang-title a {
			color:#222222;
			font-weight:700;
		}
		.zhuanlanwenzhang-jinru span {
			color:#222222;
		}
		.zhuanlanwenzhang-jinru span a{
			color:#222222;
			text-decoration:none;
		}
	</style>
@endsection

@section('content')
	<div >
			<!-- 背景logo -->
			<div class="">
					<!-- 知乎专栏 -->
					<div class="logo-zhihu">
						<span>知乎<br>专栏</span>
					</div>

					<!-- 文字描述 -->
					<div class="prompt"><span>随心写作,自由表达</span></div>
					<div class="clearfix"></div>

					<!-- 写入文字 -->
					<div class="button-a">
						 <a href="" class="btn btn-black.write-btn">开始写文章</a>
					</div>

					<!-- 申请开通专栏 -->
					<div class="zhuanlan-kaitong"><a href="">申请开通专栏</a></div>
			</div>
			<div class="clearfix"></div>

			<!-- 专栏发现 -->
			<div class="col-md-10 col-md-offset-1">
					<div class="zhuanlan-faxian">
					 	<div class="zhuanlan-zuo pull-left"></div><div class="zhuanlan-zhong pull-left">专栏&nbsp;·&nbsp;发现</div><div class="zhuanlan-you pull-right"></div>
					</div>

					<div class="zhuanlan-neirong">
						<ul class="zhuanlan-ul">
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
							<li>
								<p class="text-center zhuanlan-img">
									<a href=""><img src="holder.js/48x48"></a>
								</p>
								<p class="zhuanlan-title text-center">
									<a href="">繁华与简史</a>
								</p>
								<p class="zhuanlan-desc text-center">
									<a href="">今天天气好晴朗</a>
								</p>
								<p class="text-center zhuanlan-count">
									<span>666 </span>人关注 <span>|</span> <span>70 </span>篇文章
								</p>
								<div class="zhuan-jinru center-block text-center">
									 <a href="" class="">进入专栏</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="btn-huan text-center">
						<a href="" class="btn btn-default"> <span class="glyphicon glyphicon-refresh" aria-hidden="true">
        				  </span>换一换</a>
					</div>
			</div>
			<!-- 文章发现 -->
			<div class="col-md-10 col-md-offset-1">
					<div class="zhuanlan-faxian">
					 	<div class="zhuanlan-zuo pull-left"></div><div class="zhuanlan-zhong pull-left">文章&nbsp;·&nbsp;发现</div><div class="zhuanlan-you pull-right"></div>
					</div>

					<div class="zhuanlan-neirong">
						<ul class="zhuanlanwenzhang-ul">
							<li>
								<p class="text-center zhuanlanwenzhang-img">
									<a href=""><img src="holder.js/295x130"></a>
								</p>
								<p class="zhuanlanwenzhang-title text-center">
									<a href="" style="text-decoration:none;">奥巴马买下千万豪宅</a>
								</p>
								<p class="zhuanlanwenzhang-jinru text-center">
									<span><a href="">农村黑户</a></span>
									<span>发表于 <a href="">诸事无常...</a></span>
								</p>
							</li>

							<li>
								<p class="text-center zhuanlanwenzhang-img">
									<a href=""><img src="holder.js/295x130"></a>
								</p>
								<p class="zhuanlanwenzhang-title text-center">
									<a href="" style="text-decoration:none;">奥巴马买下千万豪宅</a>
								</p>
								<p class="zhuanlanwenzhang-jinru text-center">
									<span><a href="">农村黑户</a></span>
									<span>发表于 <a href="">诸事无常...</a></span>
								</p>
							</li>

							<li>
								<p class="text-center zhuanlanwenzhang-img">
									<a href=""><img src="holder.js/295x130"></a>
								</p>
								<p class="zhuanlanwenzhang-title text-center">
									<a href="" style="text-decoration:none;">奥巴马买下千万豪宅</a>
								</p>
								<p class="zhuanlanwenzhang-jinru text-center">
									<span><a href="">农村黑户</a></span>
									<span>发表于 <a href="">诸事无常...</a></span>
								</p>
							</li>

							<li>
								<p class="text-center zhuanlanwenzhang-img">
									<a href=""><img src="holder.js/295x130"></a>
								</p>
								<p class="zhuanlanwenzhang-title text-center">
									<a href="" style="text-decoration:none;">奥巴马买下千万豪宅</a>
								</p>
								<p class="zhuanlanwenzhang-jinru text-center">
									<span><a href="">农村黑户</a></span>
									<span>发表于 <a href="">诸事无常...</a></span>
								</p>
							</li>

							<li>
								<p class="text-center zhuanlanwenzhang-img">
									<a href=""><img src="holder.js/295x130"></a>
								</p>
								<p class="zhuanlanwenzhang-title text-center">
									<a href="" style="text-decoration:none;">奥巴马买下千万豪宅</a>
								</p>
								<p class="zhuanlanwenzhang-jinru text-center">
									<span><a href="">农村黑户</a></span>
									<span>发表于 <a href="">诸事无常...</a></span>
								</p>
							</li>

							<li>
								<p class="text-center zhuanlanwenzhang-img">
									<a href=""><img src="holder.js/295x130"></a>
								</p>
								<p class="zhuanlanwenzhang-title text-center">
									<a href="" style="text-decoration:none;">奥巴马买下千万豪宅</a>
								</p>
								<p class="zhuanlanwenzhang-jinru text-center">
									<span><a href="">农村黑户</a></span>
									<span>发表于 <a href="">诸事无常...</a></span>
								</p>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="btn-huan text-center">
						<a href="" class="btn btn-default"> 
						<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>换一换</a>
					</div>
			</div>	

			<!-- 尾部 -->
			<div class="col-md-10 col-md-offset-1">
					<div class="zhunalan-weibu"><span class="zhuanlan-weibujieshao">在知乎创作</span></div>

					<div class="zhaunlan-shenqing">
						 <a href="" class="zhuanlan-weibuanniu" style="text-decoration:none;">申请专栏</a>
					</div>
			</div>

	</div>
@endsection