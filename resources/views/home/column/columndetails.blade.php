@extends('home.column._article')

@section('column')
	<style type="text/css">
		body{
			padding:0px;
		}
	 	.container-fluid {
	 		background:#FFFFFF;
	 	}
		.xiangqing-xinxi {
			margin:0 auto;
		}
		.xiangqing-xinxi img {
			display:block;
			border-radius:50%;
			margin:0 auto;
			margin-top:40px;
		}
		.xiangqing-biaoti {
			display:block;
			margin-top:15px;
			text-align:center;
			font-size:20px;
			color:#222222;
		}
		.xiangqing-gonghao {
			display:block;
			text-align:center;
			font-size:16px;
			color:#222222;
		}
		.xaingqing-guanzhu {
			border:1px solid #50C87E;
			width:90px;
			height:34px;
			border-radius:5px;
			line-height:34px;
		}
		.xaingqing-guanzhu a {
			color:#50C87E;
		}
		.xiangqig-shuliang {
			display:block;
			width:94px;
			height:14px;
			text-align:center;
			
		}
		.xiangqig-shuliang a{
			font-size:13px;
			color:#222222;
			text-decoration:none;
		}
		.xiangqig-shuliang a span {
			font-size:12px;
		}
		.xiangqing-ul {
			width:518px;
			height:46px;
			margin:0 auto;
			list-style-type:none;
		}
		.xiangqing-li {
			width:79px;
			height:26px;
			border-radius:10px;
			float:left;
			margin:20px 1%;
			text-align:center;
			line-height:30px;
			background:white;
			box-shadow:2px 1px 5px 2px #ccc;  
		}
		.xiangqing-li a {
			font-size:14px;
			color:#B38F8F;
			text-decoration:none;
		}
		.xiangqing-content {
			width:660px;
			margin:0 auto;
			margin-top:55px;
		}
		.xiangqing-title {
			font-size:16px;
			font-weight: 700;
			color:#333333;
		}
		.xiangqing-xian {
			float:right;
			width:580px;
			border:1px solid #F0F0F0;
			margin-top:12px;
		}
		.xiangqing-neirongs {
			width:660px;
			height:180px;
			margin-top:25px;
		}
		.xiangqing-tuxiang {
			float:left;
		}
		.xiangqing-biaotineirong {
			float:right;
			width:404px;
			height:158px;
		}
		.biaoti-aa {
			font-size:20px;
		}
		..biaoti-aa p {
			color:#666666;
		}
		.biaoti-aa p a{
			text-decoration:none;
			color:#B3B3B3;
		}
		.xiangqing-lianjie {
			float:right;
			width:404px;
			height:23px;
		}
		.lianjie-zuo {
			float:left;
		}
		.lianjie-you {
			float:right;
		}
		.lianjie-zuo a {
			font-size:12px;
			color: inherit;
			text-decoration:none;
		}
		.lianjie-you a {
			font-size:12px;
			color: inherit;
			text-decoration:none;
		}
	</style>
@endsection

@section('content')
			<div class="container-fluid">
			 	<!-- 个人信息 -->
				 	<div class="xiangqing-xinxi">
				 		<p><img src="holder.js/100x100"></p>
				 		<p class="xiangqing-biaoti">起立,上课</p>
				 		<p class="xiangqing-gonghao">后面一排的同学别睡了,上课了</p>
				 		<p><div class="xaingqing-guanzhu center-block text-center">
									<a href="" class="">关注专栏</a>
						</div></p>
						<p class="xiangqig-shuliang center-block text-center"><a href="">6666<span>人关注</span></a></p>
						<ul class="xiangqing-ul">
							<li class="xiangqing-li"><a href="">全部</a></li>
							<li class="xiangqing-li"><a href="">审计</a></li>
							<li class="xiangqing-li"><a href="">上课</a></li>
							<li class="xiangqing-li"><a href="">事务所</a></li>
							<li class="xiangqing-li"><a href="">更多</a></li>
						</ul>
				 	</div>

				 	<!-- 内容 -->
				 	<div class="xiangqing-content">
				 			<!-- 标题 -->
				 			<div>
				 				<span class="xiangqing-title">最新文章</span><div class="xiangqing-xian"></div>
				 			</div>
				 			<!-- 内容 -->
				 			<div class="xiangqing-neirongs">
				 					<div class="xiangqing-tuxiang"><a href=""><img src="holder.js/240x180"></a></div>

				 					<div class="xiangqing-biaotineirong">
				 					<span class="biaoti-aa">乔金州&nbsp;的无敌人生,你们懂吗?</span>
				 					<p>你停在了这条我们熟悉的街,把你准备好的台词全练一遍.我还在逞强,说着谎,也没能力遮挡你去的方向,至少分开的时候,我落落大方.我慢慢的回到自己的生活圈,也开始可以解除新的人选,爱你到最后不痛不痒,留言在计较,谁爱过一场,我剩下一张没后悔的模样.你还要我怎样,要怎样?....<a href="">查看全文</a></p>
				 					</div>

				 					<div class="xiangqing-lianjie">
				 						<div class="lianjie-zuo">
					 						<a href="">乔先生</a>
					 						<span>·&nbsp;两个月前</span>
					 					</div>
					 					<div class="lianjie-you">
					 						<a href="">666赞&nbsp;·&nbsp;66条评论</a>

					 					</div>
				 					</div>
				 			</div>
				 			<div class="xiangqing-neirongs">
				 					<div class="xiangqing-tuxiang"><a href=""><img src="holder.js/240x180"></a></div>

				 					<div class="xiangqing-biaotineirong">
				 					<span class="biaoti-aa">乔金州&nbsp;的无敌人生,你们懂吗?</span>
				 					<p>你停在了这条我们熟悉的街,把你准备好的台词全练一遍.我还在逞强,说着谎,也没能力遮挡你去的方向,至少分开的时候,我落落大方.我慢慢的回到自己的生活圈,也开始可以解除新的人选,爱你到最后不痛不痒,留言在计较,谁爱过一场,我剩下一张没后悔的模样.你还要我怎样,要怎样?....<a href="">查看全文</a></p>
				 					</div>

				 					<div class="xiangqing-lianjie">
				 						<div class="lianjie-zuo">
					 						<a href="">乔先生</a>
					 						<span>·&nbsp;两个月前</span>
					 					</div>
					 					<div class="lianjie-you">
					 						<a href="">666赞&nbsp;·&nbsp;66条评论</a>

					 					</div>
				 					</div>
				 			</div>
				 			<div class="xiangqing-neirongs">
				 					<div class="xiangqing-tuxiang"><a href=""><img src="holder.js/240x180"></a></div>

				 					<div class="xiangqing-biaotineirong">
				 					<span class="biaoti-aa">乔金州&nbsp;的无敌人生,你们懂吗?</span>
				 					<p>你停在了这条我们熟悉的街,把你准备好的台词全练一遍.我还在逞强,说着谎,也没能力遮挡你去的方向,至少分开的时候,我落落大方.我慢慢的回到自己的生活圈,也开始可以解除新的人选,爱你到最后不痛不痒,留言在计较,谁爱过一场,我剩下一张没后悔的模样.你还要我怎样,要怎样?....<a href="">查看全文</a></p>
				 					</div>

				 					<div class="xiangqing-lianjie">
				 						<div class="lianjie-zuo">
					 						<a href="">乔先生</a>
					 						<span>·&nbsp;两个月前</span>
					 					</div>
					 					<div class="lianjie-you">
					 						<a href="">666赞&nbsp;·&nbsp;66条评论</a>

					 					</div>
				 					</div>
				 			</div>
				 			<div class="xiangqing-neirongs">
				 					<div class="xiangqing-tuxiang"><a href=""><img src="holder.js/240x180"></a></div>

				 					<div class="xiangqing-biaotineirong">
				 					<span class="biaoti-aa">乔金州&nbsp;的无敌人生,你们懂吗?</span>
				 					<p>你停在了这条我们熟悉的街,把你准备好的台词全练一遍.我还在逞强,说着谎,也没能力遮挡你去的方向,至少分开的时候,我落落大方.我慢慢的回到自己的生活圈,也开始可以解除新的人选,爱你到最后不痛不痒,留言在计较,谁爱过一场,我剩下一张没后悔的模样.你还要我怎样,要怎样?....<a href="">查看全文</a></p>
				 					</div>

				 					<div class="xiangqing-lianjie">
				 						<div class="lianjie-zuo">
					 						<a href="">乔先生</a>
					 						<span>·&nbsp;两个月前</span>
					 					</div>
					 					<div class="lianjie-you">
					 						<a href="">666赞&nbsp;·&nbsp;66条评论</a>

					 					</div>
				 					</div>
				 			</div>

				 	</div>
			</div>

@endsection