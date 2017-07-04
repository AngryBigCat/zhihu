  <div class="Card col-md-12">
  	<div class="UserCoverEditor">
  		<button class="edit-img Button DynamicColorButton--white UserCoverEditor-simpleEditButton">
  		<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>　编辑封面图片
  		</button>
      <form style="display:none" action="/user" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
         <input type="file" name="cover-img" class="cover-img" style="display: none;" accept="image/jpeg, image/gif" />
      </form>
  		<img src="holder.js/100px200?text=封面图片&bg=#aea">
  	</div>
  	<div class="ProfileHeader-main">
    		<div class="head-pic"  id="up-img-touch">
              <img class="edit-headPic" width="160" height="160" src="/uploads/headPic/{{ $user->headpic }}">
           <div class="Mask-mask">
              <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
              <span>修改我的头像</span>
           </div>
    		</div>
    		<div class="user-title">
    			<h2>你管我 <span class="yiju">{{ $user->a_word }}</span></h2>
          <div class="ProfileHeader-infoItem">
            <span class="icon glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;&nbsp;
            <span>互联网</span>
            <div class="ProfileHeader-divider"></div>
            <span>{{ $user->job }}</span>
          </div>
    			<div class="ProfileHeader-infoItem">
            <span class="icon glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;&nbsp;
            <span>教育经历</span>
            <div class="ProfileHeader-divider"></div>
            <span></span>
          </div>

          <span class="icon glyphicon glyphicon-menu-down" aria-hidden="true"></span>&nbsp;&nbsp;
    			<a href="">查看详细资料</a>
    			<div class="btn-edit">
    				 <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
    				 编辑个人资料
    				 </button>
    			</div>
    		</div>	
  	</div>
</div>

<!-- 修改个人资料模态框 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">编辑个人资料</h4>
      </div>

      <div class="modal-body">
        <form method="post" action="/people/edit">
          {{ csrf_field() }}
          <div class="form-group">
          		性别:
            <label for="recipient-name" class="control-label">
            	<input type="radio" @if($user->sex== "1") checked @endif   name="sex" value="1" checked  id="recipient-name">男
            </label>
            <label>
           	 <input type="radio" @if($user->sex== "1") checked @endif name="sex" value="0"  id="recipient-name">女
            </label>
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label"> 一句话介绍:</label>
            <input type="text" value="{{ $user->a_word }}" name="a-word" class="form-control">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label"> 居住地:</label>
            <input type="text" value="{{ $user->address }}" name="address" class="form-control">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">  职业经历:</label>
            <input type="text" name="job" value="{{ $user->job }}" class="form-control">
          </div>


          <div class="form-group">
            <label for="message-text" name="introductions" class="control-label">个人介绍:</label>
            <textarea class="form-control"   name="intro" id="message-text">{{ $user->intro }}</textarea>
          </div>

      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	         <button type="submit" id="save" class="btn btn-primary" data-dismiss="modal">保存</button>
	      </div>
      </form>
    </div>
  </div>
</div>


<!--图片上传框-->
<div class="am-modal am-modal-no-btn up-frame-bj " tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog up-frame-parent up-frame-radius">
  <div class="am-modal-hd up-frame-header">
     <label>修改头像</label>
    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
  </div>
  <div class="am-modal-bd  up-frame-body">
    <div class="am-g am-fl">
    <div class="am-form-group am-form-file">
      <div class="am-fl">
      <button type="button" class="am-btn am-btn-default am-btn-sm">
        <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
      </div>
        <input type="file" id="inputImage" accept="image/jpeg, image/png"  name="headPic">
    </div>
    </div>
    <div class="am-g am-fl" >
    <div class="up-pre-before up-frame-radius">
      <img alt="" src="/uploads/headPic/{{ $user->headpic }}" id="image" >
    </div>
    <div class="up-pre-after up-frame-radius">

    </div>
    </div>
    <div class="am-g am-fl">
    <div class="up-control-btns">
      <span class="am-icon-rotate-left"  onclick="rotateimgleft()"></span>
      <span class="am-icon-rotate-right" onclick="rotateimgright()"></span>
      <span class="am-icon-check" id="up-btn-ok" url="/people/edit_headPic"></span>
    </div>
    </div>
    
  </div>
  </div>
</div>

<!--加载框-->
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
  <div class="am-modal-dialog">
  <div class="am-modal-hd">正在上传...</div>
  <div class="am-modal-bd">
    <span class="am-icon-spinner am-icon-spin"></span>
  </div>
  </div>
</div>

<!--警告框-->
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
  <div class="am-modal-hd">信息</div>
  <div class="am-modal-bd"  id="alert_content">
        成功了
  </div>
  <div class="am-modal-footer">
    <span class="am-modal-btn" id="queding">确定</span>
  </div>
  </div>
</div>