@extends('home.layouts.default')
@section('style')
    <style>
        body {
                background-color: #FFFFFF;
        }
        a {
            font-size: 16px;
            color: #225599;
        }

        span {
            font-size: 16px;
            color: #222222;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <!--选项-->
        @include('home.settings._toggle')
        <!--绑定邮箱-->
        <div class="">
            <br>
            <p style="font-size:16px;color:#999999;">绑定手机和邮箱，并设置密码，帐号更安全。</p><br>
            <span>邮箱</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
               style="font-size:16px;text-decoration:none">绑定邮箱</a>
        </div>
        <hr>
        <div class="clearfix"></div>
        <!--绑定手机-->
        <div class="">

            <span>手机</span>&nbsp;
            <span>188****7554</span>&nbsp;
            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
               style="font-size:16px;text-decoration:none">修改</a>

        </div>
        <hr>
        <div class="clearfix"></div>
        <!--账户密码-->
        <div class="">

            <span>账户密码</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
               style="font-size:16px;text-decoration:none">修改密码</a>


        </div>
        <hr>
        <div class="clearfix"></div>
        <!--社交账号-->
        <div class="">

            <span>社交账号</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
               style="font-size:16px;text-decoration:none">绑定微信</a>&nbsp;

            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
               style="font-size:16px;text-decoration:none">绑定微博</a>&nbsp;

            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
               style="font-size:16px;text-decoration:none">绑定QQ</a>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <b class="modal-title" id="exampleModalLabel">身份验证</b>

                        <p class="text-center">为了保证您的安全,请进行身份验证</p>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">请输入手机号</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">请输入验证码</label>
                                <input class="form-control" id="message-text" placeholder="请输入验证码"/>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">发送验证码</button>
                        </form>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary">验证</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <hr>
    </div>
@endsection