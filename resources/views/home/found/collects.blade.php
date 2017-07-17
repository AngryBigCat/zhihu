<div class="panel panel-default cols">
  <!-- Default panel contents -->
  <div class="panel-heading"><span class="pull-left">热门收藏</span><a style="cursor: pointer" class="pull-right huan">换一批<i class="fa fa-repeat" aria-hidden="true"></i></a></div>
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