
<div class="col-md-4 right-tool" style="margin-top: 50px">
    <ul class="list-group">
        <a href="{{route('collect.collections')}}" class="list-group-item"><span class="fa fa-folder-o"></span> 我的收藏</a>
        <a href="{{route('collect.myFollow')}}" class="list-group-item"><span class="fa fa-file-o"></span> 我关注的收藏</a>
        <a href="{{route('collect.following')}}" class="list-group-item"><span class="fa fa-check-square-o"></span> 我关注的问题</a>
    </ul>
    <ul class="list-group">
        <!-- <li class="list-group-item"><a href="" ><span class="fa fa-list-ul"></span> 公共编辑动态</a></li> -->
        <li class="list-group-item"><a href="/deal" target= _blank><span class="fa fa-home"></span> 社区服务中心</a></li>
        <li class="list-group-item"><a href="/deal" target= _blank><span class="fa fa-copyright"></span> 版权服务中心</a></li>
    </ul>
    <ul class="list-group">
        <li class="list-group-item"><a style="cursor: pointer;" data-toggle="modal" data-target="#collectAdd"><span class="fa fa-plus-square-o"></span> 创建收藏夹</a></li>
    </ul>
</div>
<!-- 上传收藏夹：弹出框 -->
<div class="modal fade" id="collectAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info well-lg">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">创建收藏夹</h4>
      </div>
      <div class="modal-body">
          <form action="/collect/collectAdd" method="post" >
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <!-- value以后改成session的user -->
            <div class="form-group">
            标题：
              <input type="text" name="name" class="form-control" placeholder="最多输入20字"  required>
            </div>
            <div class="form-group">
            描述：（可选）
                <input type="text" class="form-control" name="intro" placeholder="请描述一下你的收藏夹">
            </div>
            <button type="submit" class="btn btn-primary">确定</button>
          </form>
      </div>
    </div>
  </div>
</div>