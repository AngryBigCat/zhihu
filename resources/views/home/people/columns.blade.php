@extends('home.people.default')


@section('daohang')
<div role="tabpanel" class="tab-pane" id="zhuanlan">
	<div class="dongtai-dongtai">
	<span>{{$count['sex']}}的专栏</span>
    </div>
    <div class="zhuan-item">
    	<div class="zhuan-left pull-left">
    		<a href=""><img style="width:70px;height:7    0px" src="/uploads/headPic/1499178949.png"></a>
    	</div>
    	<div class="zhuan-right">
    		<h4><a href="">不被发布</a></h4>
    		<span class="zhuan-desc">自己的专栏</span>
    	</div>
    </div>

</div>
@endsection