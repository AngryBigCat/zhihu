@extends('home.layouts.default')

@section('style')
	@include('home.people._style')
@endsection

@section('title',  $user->name)

@section('content')
		@if(Auth::id() == $_SESSION['id'])
			@include('home.people._header')
		@else
			@include('home.people._people')
		@endif
	<div class="col-md-8">
		<div class="dongtai col-md-12">
			@section('bread')
			<ul class="bread nav nav-pills">
                @if(Auth::id() == $_SESSION['id'])
                <li role="presentation"><a data-pjax href="/people/answers">回答 <span>{{ $count['ans_count'] }}</span></a></li>
               @else 
                <li role="presentation"><a data-pjax href="/people/answer/{{$_SESSION['id']}}">回答 <span>{{ $count['ans_count'] }}</span></a></li>
               @endif
			   <li role="presentation"><a data-pjax href="/people/asks">提问 <span>{{ $count['que_count'] }}</span></a></li>
			   <li role="presentation"><a data-pjax href="/people/topics">话题 <span>{{ $count['tag_count'] }}</span></a></li>
			   <li role="presentation"><a data-pjax href="/people/collections">收藏 <span>{{ $count['collect_count'] }}</span></a></li>
			</ul>
			@show
			<div id="pjax-con">
				@yield('daohang')
			</div>
		</div>
		<div id="pjax_loading" style="display:none">
				<img style="width:100%;height:200px" src="/img/my-loading.gif">
		</div>
	</div>

{{-- 右侧 --}}
@include('home.people._youce');
@endsection

@section('script')
{{-- pjax加速 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script> 

<script type="text/javascript">



    // 查看详细资料
    $('.see_userinfo a').click(function(event) {
        event.stopPropagation();
        $('.user-title .userinfo').css('display','none');
        $('.user-title .user_info').fadeIn(1500);
        $('.see_userinfo span').removeClass('glyphicon-menu-down').addClass('glyphicon-menu-up');
        $('.head-pic').css('margin-bottom','120px');
        $(this).parents('.see_userinfo').css('display','none');
        $('.nosee_userinfo').css('display','block');
    });
    // 收起详细资料
    $('.nosee_userinfo a').click(function(event) {
        event.stopPropagation();
        $('.user-title .user_info').css('display','none');
        $('.user-title .userinfo').fadeIn(1500);
        $('.see_userinfo span').removeClass('glyphicon-menu-up').addClass('glyphicon-menu-down');
        $('.head-pic').css('margin-bottom','0px');
        $(this).parents('.nosee_userinfo').css('display','none');
        $('.see_userinfo').css('display','block');
    });

    // 导航栏
    $('.bread a').click(function() {
        $(this).parent('li').addClass('active').siblings().removeClass('active');
    });
    $(document).pjax('a[data-pjax]', '#pjax-con');

    $(document).on('pjax:send', function() { 
        //pjax链接点击后显示加载动画；
        $("#pjax_loading").css("display", "block");
        $('#pjax-con').css('display', 'none');
    });

    $(document).on('pjax:complete', function() { 
        //pjax链接加载完成后隐藏加载动画；
        $("#pjax_loading").css("display", "none");
        $('#pjax-con').css('display', 'block');
         // 感谢
        thanks();

        pjax_toggleFollow();
        pjax_zhuyeFollow();
    });

    $(document).on("pjax:timeout", function(event) {
        // 阻止超时导致链接跳转事件发生
        event.preventDefault();
    });

    pjax_toggleFollow();
    pjax_zhuyeFollow();
    thanks();
    function thanks() {
        $('.dongtai-content-gongneng .thanks').click(function() {
            if ($(this).html() == '<span class="fa fa-heart "></span> 感谢') {
                $(this).html('取消感谢');
            } else if($(this).html() == '取消感谢') {
                $(this).html('<span class="fa fa-heart "></span> 感谢');
            }
        });
    }

    // 关注和已关注按钮
    function pjax_toggleFollow() {
        $('.tgg-follow .toggle-follow').click(function() {
            var uid = $(this).parents('.tgg-follow').attr('uid');
            var _this = $(this);
            var gzz = $('.guanzhu .guanzhuzhe div:last');
            var count = parseInt($('.guanzhu .guanzhuzhe div:last').text());
            $.ajax({
                url: '/people/toggle_follow',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'uid' : uid
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        _this.html('<span class="glyphicon glyphicon-plus"></span> 关注Ta').removeClass('btn-info').addClass('btn-primary');
                        gzz.html(count - 1);
                    flag = false;
                    } else {
                        _this.html('已关注').removeClass('btn-primary').addClass('btn-info');
                        gzz.html(count + 1);
                    }
                }
            });
        });
    }

    function pjax_zhuyeFollow() {
        // 我的主页关注
        $('.tgge-follow .toggle-follow').click(function() {
            var uid = $(this).parents('.tgge-follow').attr('uid');
            var _this = $(this);
            var gzl = $('.guanzhu .guanzhule div:last');
            var count = parseInt($('.guanzhu .guanzhule div:last').text());
            var xianghu = $(this).parents('.zhuan-item').find('.zhuan-right .xianghu');
            var gzz = $(this).parents('.zhuan-item').find('.zhuan-right .zhuan-bottom span:last');
            var gzz_count = parseInt($(this).parents('.zhuan-item').find('.zhuan-right .zhuan-bottom span:last').html());
            $.ajax({
                url: '/people/toggle_follow',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'uid' : uid
                },
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        _this.html('<span class="glyphicon glyphicon-plus"></span> 关注Ta').removeClass('btn-info').addClass('btn-primary');
                        gzl.html(count - 1);
                        xianghu.html('关注了你');
                        gzz.html(gzz_count - 1);
                    } else {
                        _this.html('已关注').removeClass('btn-primary').addClass('btn-info');
                        gzl.html(count + 1);
                        xianghu.html('相互关注');
                        gzz.html(gzz_count + 1);
                    }
                }
            });
        });
    }
	
	// 点击 编辑封面图片
	$(document).ready(function () {
		$(".edit-img").click(function () { 
			return $(".cover-img").click();
		}); 

		setTimeout(function() {
			$('.er_cover').fadeOut(1000);
		},2000);
	});
	
	$('.head-pic').hover(
		function() {
			$('.Mask-mask').fadeIn(200).css('display', 'block');
		},
		function() {
			$('.Mask-mask').fadeOut(200).css('display', 'none');
		}
	);

	// 通过ajax发送请求修改用户信息
	$('#save').click(function() {
		var sex = $('input[name="sex"]:checked').val();
		var aword = $('input[name="a-word"]').val();
		var address = $('input[name="address"]').val();
		var job = $('input[name="job"]').val();
		var intro = $('#message-text').val();
        var edu = $('input[name="edu"]').val();

		$.ajax({
			url: '/people/edit',
			data: {
				'_token' : '{{ csrf_token() }}',
				'sex' : sex,
				'a_word' : aword,
				'address' : address,
				'job' : job,
				'intro' : intro,
                'edu' : edu
			},
			type : 'POST',
			dataType: 'json',
			success : function(data) {
				window.location.reload();
			},
		});
	});

	$(document).ready(function(){
        $("#up-img-touch").click(function(){
            $("#doc-modal-1").modal({width:'600px'});
        });
    });
    $(function() {
        'use strict';
        // 初始化
        var $image = $('#image');
        $image.cropper({
            aspectRatio: '1',
            autoCropArea:0.8,
            preview: '.up-pre-after',
            
        });

        // 事件代理绑定事件
        $('.docs-buttons').on('click', '[data-method]', function() {
       
            var $this = $(this);
            var data = $this.data();
            var result = $image.cropper(data.method, data.option, data.secondOption);
            switch (data.method) {
                case 'getCroppedCanvas':
                if (result) {
                    // 显示 Modal
                    $('#cropped-modal').modal().find('.am-modal-bd').html(result);
                    $('#download').attr('href', result.toDataURL('image/jpeg'));
                }
                break;
            }
        });
        
        

        // 上传图片
        var $inputImage = $('#inputImage');
        var URL = window.URL || window.webkitURL;
        var blobURL;

        if (URL) {
            $inputImage.change(function () {
                var files = this.files;
                var file;

                if (files && files.length) {
                   file = files[0];

                   if (/^image\/\w+$/.test(file.type)) {
                        blobURL = URL.createObjectURL(file);
                        $image.one('built.cropper', function () {
                            // Revoke when load complete
                           URL.revokeObjectURL(blobURL);
                        }).cropper('reset').cropper('replace', blobURL);
                        $inputImage.val('');
                    } else {
                        window.alert('Please choose an image file.');
                    }
                }

                // Amazi UI 上传文件显示代码
                var fileNames = '';
                $.each(this.files, function() {
                    fileNames += '<span class="am-badge">' + this.name + '</span> ';
                });
                $('#file-list').html(fileNames);
            });
        } else {
            $inputImage.prop('disabled', true).parent().addClass('disabled');
        }
        
        //绑定上传事件

        $('#up-btn-ok').on('click',function(){
            var $modal = $('#my-modal-loading');
            var $modal_alert = $('#my-alert');
            var img_src=$image.attr("src");
            if(img_src==""){
                set_alert_info("没有选择上传的图片");
                $modal_alert.modal();
                return false;
            }
            
            $modal.modal();
            
            var url=$(this).attr("url");
            var canvas=$("#image").cropper('getCroppedCanvas');
            var data=canvas.toDataURL(); //转成base64
            $.ajax({  
                url:'/people/edit_headPic',  
                dataType:'json',
                type: "POST",
                data: {"image":data.toString(), '_token':'{{ csrf_token() }}'},  
                success: function(data, textStatus){
                    $modal.modal('close');
                    set_alert_info(data.result);
                    $modal_alert.modal();
                    if(data.result=="ok"){
                        $("#up-img-touch img").attr("src",data.file);
                        var img_name=data.file.split('/')[2];
                        $('#queding').click(function() {
                            $('#doc-modal-1').modal('close');
                        });
                    }
                },
                error: function(){
                    $modal.modal('close');
                    set_alert_info("修改头像失败了！");
                    $modal_alert.modal();
                }  
             });  
            
        });
        
    });

    function rotateimgright() {
        $("#image").cropper('rotate', 90);
    }


    function rotateimgleft() {
        $("#image").cropper('rotate', -90);
    }

    function set_alert_info(content){
        $("#alert_content").html(content);
    }
</script>
@endsection	


