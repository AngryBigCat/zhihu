@extends('home.layouts.default')

@section('style')
    <style>
        .gengduo {
            margin-top: 50px;
        }

        .font-weight {
            font-weight: bold;
            font-size: 14px;
            padding: 20px 10px 10px;
        }

        .font-weight a {
            color: #259;
            text-decoration: none;
        }

        .down-tool a,
        .down-tool {
            color: #999;
            font-size: 13px;
            text-decoration: none;
        }

        .right-tool {
            font-size: 13px;
        }

        .right-tool a {
            text-decoration: none;
        }
    </style>
    @include('home.layouts._foot_style')
@stop
@section('content')
    <div class="row" id="content">
        <div class="col-md-8">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab"
                                                          data-toggle="tab">我创建的收藏</a></li>
            </ul>
            <div id="info" class="bg-info well-sm" style="padding:0;margin-top: 10px;text-align: center">
                {{Session::get('info')}}
            </div>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="profile">
                    <div id="#" class="">
                        @foreach($myCollects as $v)
                            <div class="" id="">
                                <h4 class="font-weight">

                                    <a href="/collect/colQus/{{$v->id}}">{{$v->name}}</a>

                                </h4>
                                <div class="down-tool">
                                    <div class="#">
                                        <span style="padding-left: 15px">{{ \App\Collect::find($v->id)->question->count()}}
                                            条内容</span>
                                        <span class="#">•</span>
                                        <span class="#" href="#">{{\App\Collect::find($v->id)->followers()->count()}}
                                            人关注</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('home.collect._rightTool')
        <hr>
        <hr>
    </div>
    @include('home.layouts._footer')
@stop

@section('script')
<script>
$('#info').fadeOut(3000);
{{-- 取消关注 --}}
$('.follow').click(function() {
    var col_id = $(this).attr('col_id');
    var col = $(this);
    $.ajax({
        url: "/collect/followAjax",
        type: 'GET',
        data: { data :col_id },
        dataType: 'json',
        success: function (data) {
            if (data.status==0) {
                col.html('<i class="fa fa-plus" aria-hidden="true"></i> 关注');
            }else{
                col.html('取消关注');
            }
            // console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
    return false;
}); 
</script>

@stop
