<div id="retui">
	<div>

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">今日最热</a></li>
	    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">本月最热</a></li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="home">
	    	@foreach ($dayHot as $v)
			<div class="lizi">
				<a href="#" >
					<h5>{{$v->title}}</h5>
				</a>
				<div >
					<a href="#" class="pull-left"><span class="badge">42</span></a>
					<div class="pull-left">
						<a href="#">{{$v->name}}</a>
						<span class="aria-hidden">{{$v->introduction}}</span>
						<p class="aria-hidden ">
							{{$v->content}}

							作者：{{$v->name}}
							链接：https://www.zhihu.com/question/55370905/answer/189293359
							来源：知乎
							著作权归作者所有，转载请联系作者获得授权。
						</p>
						<div class="list_retui">
							<a class="attent"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
							<span> . </span>
							<a class="comment" rel="popover"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
							<span> . </span>

							<div class="lizi_hide">
							<a class="thank"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
							<span> . </span>
							<a><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
							<span> . </span>
							<a data-toggle="modal" data-target="#myModal"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
							<span> . </span>
							<a class="no_help"> 没有帮助 </a>
							<span>.</span>
							<a> 举报 </a>
							</div>
							<span> . </span>
							<a> 作者保留权利 </a>
						</div>
						
					</div>
				</div>
			</div>
			@endforeach
			
	    </div>
	    <div role="tabpanel" class="tab-pane" id="profile">
			@foreach ($dayHot as $v)
			<div class="lizi">
				<a href="#" >
					<h5>{{$v->title}}</h5>
				</a>
				<div >
					<a href="#" class="pull-left"><span class="badge">42</span></a>
					<div class="pull-left">
						<a href="#">{{$v->name}}</a>
						<span class="aria-hidden">{{$v->introduction}}</span>
						<p class="aria-hidden ">
							{{$v->content}}

							作者：{{$v->name}}
							链接：https://www.zhihu.com/question/55370905/answer/189293359
							来源：知乎
							著作权归作者所有，转载请联系作者获得授权。
						</p>
						<div class="list_retui">
							<a href="#" class="attent"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
							<span> . </span>
							<a class="comment" rel="popover"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
							<span> . </span>

							<div class="lizi_hide">
								<a href="#" class="thank"><i class=" fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
								<span> . </span>
								<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
								<span> . </span>
								<a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
								<span> . </span>
								<a class="no_help"> 没有帮助 </a>
								<span>.</span>
								<a href="#"> 举报 </a>
							</div>
							<span> . </span>
							<a href="#"> 作者保留权利 </a>
						</div>
						
					</div>
				</div>
			</div>
			@endforeach
	    </div>
	  </div>
	</div>
</div>