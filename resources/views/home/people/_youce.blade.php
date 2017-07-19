<div class="col-md-4">
	<div class="col-md-12 guanzhu">
		<div class="col-md-6 pull-left text-center">
			<a data-pjax href="/people/following" class="@if(Auth::id() == $_SESSION['id']) guanzhule @endif" id="guanzhu">
				<div>关注了</div>
				<div>{{ $count['followings_count'] }}</div>
			</a>
		</div>
		<div class="col-md-6 text-center">
			<a data-pjax href="/people/follower" class="guanzhuzhe" >
				<div>关注者</div>
				<div>{{ $count['followers_count'] }}</div>
			</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-13 bg-default right-gongju" >
		<div class="list-group">
		  <a href="/people/topics" data-pjax  class="bg list-group-item">关注的话题 <span class="pull-right">{{ $count['tag_count'] }}</span></a>
		  <a data-pjax href="/people/following/questions" class="list-group-item">关注的问题 <span class="pull-right">{{ $count['follow_que_count'] }}</span></a>
		  <a data-pjax href="/people/following/collections" class="list-group-item">关注的收藏夹 <span class="pull-right">{{ $count['follow_col_count'] }}</span> </a>
		</div> 
	</div>	
	<div>
		个人主页被浏览 <span> 666 </span> 次 
	</div>
	<hr>
	<div>
		刘看山 • 知乎指南 • 知乎协议 • 应用 • 工作 •
		 侵权举报 • 违法和不良信息举报：010-82716601
		联系我们 © 2017 知乎
	</div>
</div>
