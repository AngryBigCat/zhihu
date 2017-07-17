<div class="col-md-4 right">
	<!-- src="/img/default-50x50.gif" alt="" -->
		<a href="http://www.bmw.com.cn/zh/all-models/5-series/sedan/2017/campaign.html?bmw=dis:G38lau:G30:p_zhihu_17-q2-g38-pd-g38_cm_ba_jxbn&mz_ca=2051217&mz_sp=778EM&mz_sb=1#tab-0&bookmark=aHR0cDovL3d3dy5ibXcuY29tLmNuL2NvbnRlbnQvZGFtL2Jtdy9tYXJrZXRDTi9jb21tb24vYWxsLW1vZGVscy81LXNlcmllcy9zZWRhbi8yMDE2L2FkZG9ucy9hZGFwdGl2ZS1sZWQtaGVhZGxpZ2h0cy9pbmRleC5odG1sP2NvbnRlbnQ9L2NvbnRlbnQvZGFtL2Jtdy9tYXJrZXRDTi9jb21tb24vYWxsLW1vZGVscy81LXNlcmllcy9zZWRhbi8yMDE2L2FkZG9ucy9hZGFwdGl2ZS1sZWQtaGVhZGxpZ2h0cy9jb250ZW50X3poLmpzb24=" target="_blank" class="guanggao">
			<div class="alert alert-warning alert-dismissible fade in " role="alert" style="background: url('/img/12.jpg');background-repeat: no-repeat; ">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    </div>
		</a>
		<div>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading "><span class="pull-left">热门圆桌</span><a href="#" class="pull-right">更多圆桌<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
			  <!-- List group -->
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
			</div>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><span class="pull-left">热门话题</span><a href="#" class="pull-right">更多话题<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
			  <!-- List group -->
			  <ul class="list-group clearfix">
			    <li class="list-group-item ee">
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
			    </li>
			    <li class="list-group-item ee">
			    	<div>
				    	<img src="/img/avatar.png" alt="" width="40px">
				    	<a href="#">NBA</a>
				    	<a href="#" class="g"><span>258045</span>人关注</a>
			    	</div>
			    	<a href="#">科比的巅峰是哪一个赛季？</a>
			    </li>
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
			            <li><a href="javascript:;" id="js-feedback-button">建议反馈</a></li>
			            <li><a href="/app" target="_blank">移动应用</a></li>
			            <li><a href="/careers">加入知乎</a></li>
			            <li><a href="/deal" target="_blank">知乎协议</a></li>
			            <li><a href="/jubao" target="_blank">举报投诉</a></li>
			            <li><a href="/contact">联系我们</a></li>
			        </ul>
			        <span class="copy">© 2017 知乎</span>
			        </div>  
			</div>
		</div>
	</div>
