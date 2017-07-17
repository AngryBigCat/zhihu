<div class="Card col-md-12">
	<div class="UserCoverEditor">
		<button class="Button DynamicColorButton--white UserCoverEditor-simpleEditButton">
		编辑封面图片
		</button>
		<img src="holder.js/100px200?text=封面图片&bg=#aea">
	</div>
	<div class="ProfileHeader-main">
		<div class="head-pic">
			<img src="holder.js/160x160">
		</div>
		<div class="user-title">
			<h2>你管我</h2>
			<span>呵呵大</span>
			<div>为什么要写页面</div>
			<a href="">查看详细资料</a>
			<div class="btn-edit">
				<button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
				编辑个人资料
				</button>
			</div>
		</div>	
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">编辑个人资料</h4>
      </div>

      <div class="modal-body">
        <form action="/" method="post">
          <div class="form-group">
          		性别:
            <label for="recipient-name" class="control-label">
            	<input type="radio" name="sex" value="1" checked  id="recipient-name">男
            </label>
            <label>
           	 <input type="radio" name="sex" value="0"  id="recipient-name">女
            </label>
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label"> 一句话介绍:</label>
            <input type="text" name="" class="form-control">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label"> 居住地:</label>
            <input type="text" name="" class="form-control">
          </div>

          <div class="form-group">
            <label for="message-text" class="control-label">  职业经历:</label>
            <input type="text" name="" class="form-control">
          </div>


          <div class="form-group">
            <label for="message-text" name="introductions" class="control-label">个人介绍:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	         <button type="submit" class="btn btn-primary" data-dismiss="modal">保存</button>
	      </div>
      </form>
    </div>
  </div>
</div>