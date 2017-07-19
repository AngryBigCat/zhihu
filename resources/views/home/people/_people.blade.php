  <div class="Card col-md-12">
    <div class="UserCoverEditor">
      @if($user -> coverpic == "")
          <img style="width:100%;height:240px;background:#96A1A9">
      @else
        <img style="width:100%;height:240px" src="/uploads/coverPic/{{$user->coverpic}}">
      @endif
    </div>
    <div class="ProfileHeader-main">
          <div class="head-pic"  id="up-img-touch">
            <img class="edit-headPic" width="160" height="160" src="/uploads/headPic/{{ $user->headpic }}">
          </div>
          <div class="user-title">
              <h2>{{ $user->name }} <span class="yiju">{{ $user->a_word }}</span></h2>
              <div class="userinfo">
                  <div class="ProfileHeader-infoItem">
                  <span class="icon glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;&nbsp;
                
                  <span>{{ $user->job }}</span>
                </div>
                <div class="ProfileHeader-infoItem">
                  <span class="icon glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;&nbsp;
                  <span>{{ $user->edu }}</span>
                  <div class="ProfileHeader-divider"></div>
                  @if($user->sex == '1')
                    <span class="icon fa fa-male"></span>
                  @else
                    <span class="icon fa fa-female"></span>
                  @endif
                </div>
              </div>
              
              <div class="user_info" style="display:none">
                  <div class="ProfileHeader-infoItem">
                    <span class="ProfileHeader-detailLabel">现居住地</span>
                    <span>{{ $user->address }}</span>
                  </div>
                  <div class="ProfileHeader-infoItem">
                    <span class="ProfileHeader-detailLabel">职业经历</span>
                    <span>{{ $user->job }}</span>
                  </div>
                  <div class="ProfileHeader-infoItem">
                    <span class="ProfileHeader-detailLabel">教育经历</span>
                    <span>{{ $user->edu }}</span>
                  </div>
                  <div class="ProfileHeader-infoItem">
                    <span class="ProfileHeader-detailLabel">个人简介</span>
                    <span>{{ $user->intro }}</span>
                  </div>
              </div>

              <div class="userinfo_footer">
                <div>
                    <div class="see_userinfo">
                      <span class="icon glyphicon glyphicon-menu-down" aria-hidden="true"></span>&nbsp;&nbsp;
                      <a>查看详细资料</a>
                    </div>

                    <div class="nosee_userinfo">
                      <span class="icon glyphicon glyphicon-menu-up"></span>&nbsp;&nbsp;
                      <a>收起详细资料</a>
                    </div>

                    <div class="btn-edit tgg-follow" uid="{{ $_SESSION['id'] }}">
                      <button class="toggle-follow btn btn-guanzhu {{ Auth::user()->isFollowing(\App\User::find($_SESSION['id'])) ? 'btn-info' : 'btn-primary' }}">
                      @if(Auth::user()->isFollowing(\App\User::find($_SESSION['id'])))
                          已关注
                      @else
                          <span class="glyphicon glyphicon-plus"></span> 关注Ta
                      @endif
                      </button>
                    </div>
                    
                </div>
                
              </div>
          </div>  
    </div>
</div>