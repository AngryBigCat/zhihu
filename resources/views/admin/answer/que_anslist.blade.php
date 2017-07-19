@extends('admin.index')

@section('title', '回答列表')

@section('css')
    <style type="text/css">
        input[name="content"]{
            color:black;
            display: none;
        }
        .gradeC .content{
            cursor: pointer;
        }
        .info{
            color:yellowgreen;
            margin-left:300px;
        }
    </style>

@endsection

@section('content')
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf"><span style="font-weight:700;color:yellowgreen">{{ $info[0]->title }}</span> 的回答列表</div>
                    <span style="color:red"></span>
                </div>
                <div class="widget-body  am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="info">{{ Session::get('info') }}</div>
                            </div>

                        </div>
                    </div>
                    <form action="/admin/answer" method="get">
                      <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                          <div class= "am-form-group tpl-table-list-select">
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
                              <input type="text" class="am-form-field " value="{{ $data['keywords'] or '' }}" name="keywords" >
                              <span class="am-input-group-btn">
                                  <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit" ></button>
                                </span>
                          </div>
                      </div>
                    </form>
                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名称</th>
                                    <th>问题标题</th>
                                    <th>回答内容</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $val)
                                <tr class="even gradeC">
                                    <td class="am-text-middle">{{ $val->id }}</td>
                                    <td class="am-text-middle">{{ $val->name }}({{ $val->uid }})</td> 
                                    <td class="am-text-middle">{{ $val->title }}</td>
                                    <td class="am-text-middle content"><span>{{ $val->content }}</span><input type="text" value="{{$val->content}}" name="content"></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                        <form action="/admin/answer/ans_del/{{ $val->id }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" class="am-btn-danger">
                                                <i class="am-icon-trash"></i> 删除
                                            </button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="pages">    
                        {{ $info->appends($data)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

@section('script')
    <script type="text/javascript">
       
        // ajax更改回答内容
        setTimeout(function() {
            $('.info').fadeOut(1500);
        },2000);
        $('.gradeC .content').dblclick(function() {
            $(this).find('span').css('display','none');
            $(this).find('input[name="content"]').css('display','block');
            $(this).find('input[name="content"]').focus();
        });
        $('input[name="content"]').blur(function() {
            var info = $('.info');
            var _this = $(this);
            var val = $(this).val();
            var ans_id = $(this).parents('.gradeC').find('td:first').html();
            $.ajax({
                url : '/admin/answer/update_ans/'+ans_id,
                type: 'POST',
                data: {
                    'content' : val,
                    '_token' : '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status == '0') {
                        _this.css('display','none');
                        _this.prev('span').css('display','block');
                        _this.prev('span').html(val);
                        info.html(data.msg).fadeIn(1500).fadeOut(1500);
                    } else {
                        _this.css('display','none');
                        _this.prev('span').css('display','block');
                        info.html(data.msg).addClass('color','red').fadeIn(1500).fadeOut(1500);
                    } 
                }
            });
        });
    </script>
@endsection