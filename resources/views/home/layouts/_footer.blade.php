<div class="foot col-md-12">
	<span class="copy pull-left">&copy; 2017知乎</span>
	<ul class="pull-right">
		<li><a href="https://liukanshan.zhihu.com" target="_blank">刘看山</a></li>
		<li><a href="/question/19581624" target="_blank">知乎指南</a></li>
		<li><a href="javascript:;" data-toggle="modal" data-target="#suggest" id="js-feedback-button">建议反馈</a></li>
		<li><a href="/deal" target="_blank">知乎协议</a></li>
		<li><a href="/jubao" target="_blank">举报投诉</a></li>
		<li><a href="/contact">联系我们</a></li>
	</ul>
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
            <textarea name="content" id="" cols="80" rows="10"></textarea>
            <button type="submit" class="btn btn-primary">确定</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>