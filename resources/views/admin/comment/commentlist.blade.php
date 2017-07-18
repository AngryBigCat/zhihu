@extends('admin.index')

@section('title', '评论列表')

<!-- @section('style') -->
  <style>
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
<!-- @endsection -->
@section('')
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf">评论列表</div>
                    <span style="color:red"></span>
                    
                </div>
                <div class="widget-body  am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                               <div class="info"></div>
                            </div>

                        </div>
                    </div>
                    <form action="/admin/commentlist" method="get">
                      <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                          <div class="am-form-group tpl-table-list-select">
                              <span>显示</span>
                              <select  name="num" style="width:100px;color:black">
                                <option value="5" @if($request->input('num') == 5) selected="selected" @endif>5</option>
                                <option value="10" @if($request->input('num') == 10) selected="selected" @endif>10</option>
                                <option value="15" @if($request->input('num') == 15) selected="selected" @endif>15</option>
                                <option value="20" @if($request->input('num') == 20) selected="selected" @endif>20</option>
                              </select>
                              <span>条</span>
                          </div>
                      </div>
                      <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                          <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                              <input type="text" class="am-form-field " value="{{$request->input('keyword')}}" name="keyword" >
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
                                    <th>类型</th>
                                    <th>内容</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                           @foreach($info as $val)
                                <tr class="even gradeC">
                                    <td class="am-text-middle">{{$val->id}}</td>
                                    <td class="am-text-middle">{{$val->name}}</td>   
                                                             
                                    <td class="am-text-middle">{{$val->commentable_type}}</td>
                                    <td class="am-text-middle content"><span>{{$val->content}}</span><input type="text" value="{{$val->content}}" name="content"></td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                             <a href="/admin/commentdelete/{{$val->id}}" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                    <div id="pages">    
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>	
@endsection

@section('script')
    <script type="text/javascript">
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
                url : '/admin/commentmodify/'+ans_id,
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

         // // $.ajaxSetup({
         // //     headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
         // //  });
         //  //点击删除
         //  $('.delete').click(function() {

         //    var comm_id = $(this).attr('comm_id');
           
         //    $.ajax({
         //            url: "/admin/commentdelete/"+comm_id,
         //            type: 'GET',
         //            data: { date :comm_id },
         //            dataType: 'json',
         //            success: function (data) {
         //            //      if (data.status == '0') {
                          
         //            //     info.html(data.msg).fadeIn(1500).fadeOut(1500);
         //            // } else {
                       
         //            //     info.html(data.msg).addClass('color','red').fadeIn(1500).fadeOut(1500);
         //            // } 
         //            // },
         //            // error: function (data) {
         //            //     console.log(data);
         //            // }
         //        });
         //        return false;
         //  }); 
    </script>
@endsection