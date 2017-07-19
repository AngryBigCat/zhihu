@extends('home.layouts.default')

@section('style')
    <style>

        #dibu {
            margin-bottom: 80px;
            border-top: 1px solid #ddd;
        }

        #dibu span{
            float:left;
        }
        #dibu a{
            
            color:#888;
        }
        .gengduo{
            margin-top:50px;
        }
        .font-weight{
            font-weight: bold;
            font-size:14px;
            padding:20px 10px 10px;
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
<<<<<<< HEAD
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">我关注的收藏</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">我创建的收藏</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="#" id="#">
                <h4 class="font-weight">

                <a href="/collection/125834257">方法论做题</a>

                </h4>
                <div class="#">
                    <div class="down-tool">
                        由 <a data-hovercard="p$b$gaia-agul" href="#" target="_blank" class="#" data-original_title="愚者">愚者</a> 创建<span class="#l">•</span>
                        <span href="#">4 条内容</span>

                        <span class="#">•</span>
                        <a class="#" href="#">3 人关注</a>


                        <span class="zg-bull">•</span>

                        <a href="#" name="focus" class="" id="">取消关注</a>


                    </div>
                </div>
                </div>
                <div class="#">
                <h4 class="font-weight">

                <a href="#">美食</a>



                </h4>
                <div class="">
                    <div class="down-tool">
                        由 <a href="#" target="_blank" class="#" title="愚者">愚者</a> 创建<span class="zg-bull">•</span>
                        <span href="javavscript:;">103 条内容</span>

                        <span class="zg-bull">•</span>
                        <a class="#" href="#">10 人关注</a>


                        <span class="zg-bull">•</span>

                        <a href="#" name="focus" class="" >取消关注</a>


                    </div>
                </div>
                    <a class="btn btn-default btn-block gengduo"  style="">更多</a>    
                </div>
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
    <div class="content container clearfix navbar-fixed-bottom" id="dibu">
        <!-- <div role="separator" class="divider"></div> -->
        <ul class="li-horizontal">

            <li><a href="https://liukanshan.zhihu.com" target="_blank">刘看山</a></li>

            <li><a href="/question/19581624" target="_blank">知乎指南</a></li>
            <li><a href="javascript:;" id="js-feedback-button">建议反馈</a></li>

            <li><a href="/app" target="_blank">移动应用</a></li>
            <li><a href="/careers">加入知乎</a></li>
            <li><a href="/terms" target="_blank">知乎协议</a></li>
            <li><a href="/jubao" target="_blank">举报投诉</a></li>
            <li><a href="/contact">联系我们</a></li>

        </ul>

        <span class="copy">© 2017 知乎</span>

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
