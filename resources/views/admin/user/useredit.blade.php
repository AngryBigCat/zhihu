@extends('admin.index')

@section('title','编辑用户')

@section('css')
<style type="text/css">
    .help-block strong{
        color:#A94442;
    }
</style>
@endsection

@section('content')
<div class="row-content am-cf" style="width:800px;margin:0 auto">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">编辑用户</div>
                </div>
                <div class="widget-body am-fr">

                    <form class="am-form tpl-form-line-form" action="/admin/user/{{$user->id}}" method="POST">

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">用户ID</label>
                            <div class="am-u-sm-9">
                                <input disabled type="text" value="{{ $user->id }}" class="tpl-form-input" id="user-name">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">用户名</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="name" value="{{ $user->name }}" class="tpl-form-input" id="user-name" placeholder="请输入用户名">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">邮　箱</label>
                            <div class="am-u-sm-9">
                                <input type="text" disabled value="{{ $user->email }}" class="tpl-form-input" id="email" placeholder="请输入邮箱">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">权　限</label>
                            <div class="am-u-sm-9">
                                <select name="auth" data-am-selected="{searchBox: 0}" style="display: none;">
                                    <option @if($user->auth == 0) selected @endif value="0">普通用户</option>
                                    <option @if($user->auth == 1) selected @endif value="1">管理员</option>
                                </select>
                            </div>
                        </div>
                        
                        {{ csrf_field() }}
                       {{ method_field('PUT') }}
                        
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary  tpl-btn-bg-color-success ">提交</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection