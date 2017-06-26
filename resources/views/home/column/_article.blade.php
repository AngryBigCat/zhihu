<!DOCTYPE html>
<html>
<head>
	<title>知乎专栏</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<script type="text/javascript" src='/js/app.js'></script>
	@yield('column')
	<style type="text/css">
		.navbar-logo{
			width:58px;
			height:58px;
			font-size:25px;
			text-align:center;
			line-height:58px;
			font-weight:bold;
		}
		.nav-top{
			height:60px;
			background:white;
		}
		.navbar-logo a, .navbar-right a{
			color:#999;
			text-decoration:none;
		}
		.navbar-right{
			height:60px;
			margin-right:80px;
			line-height:60px;
			color:#999;
			font-weight:bold;
			font-size:18px;
		}
	</style>
</head>
<body>
	<header>
		<div class="nav-top">
			<div class="navbar-logo pull-left">
		  		<a href="">知</a>
		    </div>

		    <div class="navbar-right pull-right">
				<a href=""><img src="/img/write.png">写文章</a>
		   </div>
		</div>
	</header>
	<section>
		@yield('content')

	</section>
		
</body>
</html>