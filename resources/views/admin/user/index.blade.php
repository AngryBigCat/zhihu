@extends('admin.index')

@section('title','用户列表')

@section('css')
    <style type="text/css">
        .info{
            color:yellowgreen;
            margin-left:300px;
        }
        .del_u{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

<div class="row-content am-cf">

    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    
                    <div class="widget-title  am-cf">用户列表</div> 

                </div>
                <div class="widget-body  am-fr">

                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" onclick="location.href='{{ url("admin/user/create") }}'" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                </div>

                                <div class="info"> {{ Session::get('info') }} </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('admin/user') }}" method="GET"> 
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="am-form-group tpl-table-list-select">
                            <select name="num" data-am-selected="{btnSize: 'sm'}">
                                <option @if(!empty($data['num']) && $data['num'] == 10) selected @endif value="10">显示 10 条</option>
                                <option @if(!empty($data['num']) && $data['num'] == 25) selected @endif value="25">显示 25 条</option>
                                <option @if(!empty($data['num']) && $data['num'] == 50) selected @endif value="50">显示 50 条</option>
                                <option @if(!empty($data['num']) && $data['num'] == 100) selected @endif value="100">显示 100 条</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                        <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                            <input type="text" value="{{ $data['keywords'] or '' }}" name="keywords" class="am-form-field ">
                            <span class="am-input-group-btn">
                                <button type="submit" class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
                            </span>
                        </div>
                    </div>
                    </form>

                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>权限</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="gradeX">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                    @if($user->auth == 0)
                                    普通用户
                                    @else
                                    管理员
                                    @endif
                                    </td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="user/{{$user->id}}/edit">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a uid="{{$user->id}}" class="del_u tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                       
                                    </td>
                                </tr>  
                            @endforeach            
                                <!-- more data -->
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr">
                            {{ $users->appends($data)->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        setTimeout(function(){
            $('.info').fadeOut();
        },3000);
        $('.del_u').click(function(){
            var id = $(this).attr('uid');
            var tr = $(this).parents('tr');
            $.ajax({
                url:'user/'+id,
                type: 'DELETE',
                data:{
                    '_token':'{{ csrf_token() }}'
                },
                success:function(data){
                    console.log(data);
                    var res = $.parseJSON(data);   
                    tr.remove();
                }
            });
        });
    </script>
@endsection