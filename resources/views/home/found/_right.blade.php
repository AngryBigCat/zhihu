<div class="col-md-4 right">
	<!-- src="/img/default-50x50.gif" alt="" -->
		<a href="{{$AD->url}}" target="_blank" class="guanggao">
			<div class="alert alert-warning alert-dismissible fade in " role="alert" style="background: url('{{ltrim($AD->img,'.')}}');background-repeat: no-repeat;background-size:cover; ">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    </div>
		</a>
		<div>
			<!-- <div class="panel panel-default">
			  <div class="panel-heading "><span class="pull-left">热门圆桌</span><a href="#" class="pull-right">更多圆桌<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
			  <ul class="list-group clearfix">
			    <li class="list-group-item ff">
			    	<img src="/img/avatar.png" alt="" width="40px">
			    	<div>
				    	<a href="#" class="pull-left">心理质询师的进阶之路</a>
				    	<span class="pull-right">还有7天结束</span>
			    	</div>
			    	<p id="ss"><a href="#"><span> 422</span>人关注 </a><span> . </span><a href="#"><span> 18</span>个问题 </a></p>
			    </li>
			    <li class="list-group-item ff">
			    	<img src="/img/avatar.png" alt="" width="40px">
			    	<div>
				    	<a href="#" class="pull-left">心理质询师的进阶之路</a>
				    	<span class="pull-right">还有7天结束</span>
			    	</div>
			    	<p id="ss"><a href="#"><span> 422</span>人关注 </a><span> . </span><a href="#"><span> 18</span>个问题 </a></p>
			    </li>
			  </ul>
			</div> -->
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><span class="pull-left">热门话题</span><a href="/topicSquare/1" class="pull-right">更多话题<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
			  <!-- List group -->
			  <ul class="list-group clearfix">
			  @foreach($hotTopic1 as $v)
			    <li class="list-group-item ee">
			    	<div>
				    	<img src="/uploads/headPic/{{$v->img}}" alt="" width="40px">
				    	<a href="#">{{$v->tag_name}}</a>
				    	<a href="#" class="g"><span>{{ \App\Tag::find($v->id)->followers()->count() }}</span>人关注</a>
			    	</div>
			    	<a href="#">{{$v->description}}</a>
			    </li>
			    @endforeach
			   <!--  <li class="list-group-item ee">
			    	<div>
				    	<img src="/img/avatar.png" alt="" width="40px">
				    	<a href="#">NBA</a>
				    	<a href="#" class="g"><span>258045</span>人关注</a>
			    	</div>
			    	<a href="#">科比的巅峰是哪一个赛季？</a>
			    </li>
			    <li class="list-group-item ee">
			    	<div>
				    	<img src="/img/avatar.png" alt="" width="40px">
				    	<a href="#">NBA</a>
				    	<a href="#" class="g"><span>258045</span>人关注</a>
			    	</div>
			    	<a href="#">科比的巅峰是哪一个赛季？</a>
			    </li> -->
			  </ul>
			</div>
			<div class="panel panel-default cols">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><span class="pull-left">热门收藏</span></div>
			  <!-- List group -->
			  <ul class="list-group clearfix shoucang">
			  	@foreach($collects as $v)
			    <li class="list-group-item">
			    	<a href="/collect/colQus/{{$v->id}}">{{$v->name}}</a>
			    	<span style="padding-left: 15px">{{ \App\Collect::find($v->id)->question->count()}}条内容</span>
                    <span class="#">•</span>
                    <span class="#" href="#">{{\App\Collect::find($v->id)->followers()->count()}} 人关注</span>
			    </li>
			    @endforeach
			  </ul>
			</div>
			<div>
				 <div class="" id="dibu">
			        <!-- <div role="separator" class="divider"></div> -->
			        <ul class="li-horizontal">
			            <li><a href="https://liukanshan.zhihu.com" target="_blank">刘看山</a></li>
							<li><a href="/question/19581624" target="_blank">知乎指南</a></li>
							<li><a href="javascript:;" data-toggle="modal" data-target="#suggest" id="js-feedback-button">建议反馈</a></li>
							<li><a href="/deal" target="_blank">知乎协议</a></li>
							<li><a href="/jubao" target="_blank">举报投诉</a></li>
							<li><a href="/contact">联系我们</a></li>
			        </ul>
			        <span class="copy">© 2017 知乎</span>
			    </div> 
			</div>
		</div>
	</div>
<div class="modal fade bs-example-modal-md" id="suggest" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info well-lg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">说出你的宝贵建议</h4>
      </div>
      <div class="modal-body">
          <form  action="/suggest" method="post" style="padding:0 50px">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <textarea name="content" id="" cols="50" rows="10"></textarea>
            <button type="submit" class="btn btn-primary" style="margin-top:10px ">确定</button>
          </form>
      </div>
    </div>
  </div>
</div>