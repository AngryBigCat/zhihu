@extends('admin.index')

@section('title', '话题列表')

<!-- @section('style') -->
  <style>
      #pages li {
          float: left;
          left:700px;
          padding-left: 10px;
          padding-right: 10px;
          position: relative;
          padding: 10px 20px 13px;
          /*background-color: #fff;*/
          border-radius: 4px;
          color: #838FA1;
      }
  </style>
<!-- @endsection -->
@section('container')
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf">话题列表</div>
                    <span style="color:red">{{Session::get('info')}}</span>
                </div>
                <div class="widget-body  am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-success" onclick="location.href='/admin/topiccreate'"><span class="am-icon-plus"></span>新增</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <form action="/admin/listtopic" method="get">
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
                                    <th>话题缩略图</th>
                                    <th>话题名称</th>
                                    <th>话题描述</th>
                                    <th>父级话题名称</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $k=>$v)
                                <tr class="even gradeC">
                                    <td class="am-text-middle">{{$v->id}}</td>
                                    <td>
                                        <img src="{{$v->img}}" class="tpl-table-line-img" alt="" style="width:50px;height:50px">
                                    </td>
                                    <td class="am-text-middle">{{$v->tag_name}}</td>
                                    <td class="am-text-middle">{{$v->description}}</td>
                                    <td class="am-text-middle">{{getTagNameById($v->pid)}}</td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="/admin/topicupdate?id={{$v->id}}">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="/admin/topicdelete?id={{$v->id}}" class="tpl-table-black-operation-del">
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
                        {!! $tags->appends($request->all())->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection