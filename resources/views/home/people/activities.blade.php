@extends('home.layouts.default')

@section('style')
	@include('home.people._style')
@endsection



@section('content')
	@include('home.people._header')
	<div class="col-md-8">
		<div class="dongtai col-md-12">
			@section('bread')
			<ul class="nav nav-pills">
			   <li role="presentation" class="active"><a href="/people/activities">动态</a></li>
			   <li role="presentation"><a href="/people/answers">回答 <span>10</span></a></li>
			   <li role="presentation"><a href="/people/asks">提问 <span>10</span></a></li>
			   <li role="presentation"><a href="/people/columns">专栏 <span>10</span></a></li>
			   <li role="presentation"><a href="/people/collections">收藏 <span>10</span></a></li>
			   <li role="presentation" class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				      更多 <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu">
				      <li role="presentation"><a href="/people/collections">分享 <span>10</span></a></li>
				      <li role="presentation"><a href="/people/collections">关注 <span>10</span></a></li>
				    </ul>
			   </li>
			</ul>
			@show
			<div>
				@section('daohang')
				<div role="tabpanel" class="tab-pane active" id="dongtai">
					<div class="dongtai-dongtai">
						<span>我的动态</span>
						<!-- <hr> -->
					</div>
				    	
					<div class="dongtai-content">
				    	<div class="dongtai-content-first">
				    		<span>赞同了回答</span>
				    		<span class="pull-right">20分钟前</span>
				    	</div>
				    	<div class="dongtai-content-title">
				    		<a href="">淘宝上有屎？？？</a>
				    	</div>
				    	<div class="dongtai-content-info col-md-12">
				    		<div class="dongtai-content-img pull-left"><a href=""><img src="holder.js/50x50?text=头像"></a></div>
				    		<div class="dongtai-content-name">
					    		<div class="col-md-12">
									<a href="">闻佳</a>
					    		</div>
					    		<div class="col-md-12">
					    			<span>不知道你吃饱没有，反正我吃饱了</span>
					    		</div>	
				    		</div>
				    	</div>

				    	<div class="col-md-12 dongtai-content-zan" >
				    		<a href=""><span>66666 </span> 人赞同了该回答</a>
				    	</div>

				    	<div class="dongtai-content-con">
				    		<div class="col-md-12">
				    			不觉已经有八百赞了。虽然有这么危险的经历，但是在重庆和回程的时候见的风景真的是非常的震撼，大自然的鬼斧神工让我为之惊叹！不过还是要提醒大家，开车跑长途一定要注意休息，毕竟命是自己的！放几张玩的时候拍的…不觉已经有八百赞了。虽然有这么危险的经历，但是在重庆和回程的时候见的风景真的是非常的震撼，大自然的鬼斧神工让我为之惊叹！不过还是要提醒大家，开车跑长途一定要注意休息，毕竟命是自己的！放几张玩的时候拍的…
				    		</div>
				    	</div>

				    	<div class="dongtai-content-gongneng">
							<div class="btn-group" data-toggle="buttons">
							  <label class="btn-zan btn btn-info active">
							    <input type="radio" name="options" id="option1" autocomplete="off" checked>▲666
							  </label>
							  <label class="btn-buzan btn btn-info">
							    <input class="" type="radio" name="options" id="option2" autocomplete="off">▼
							  </label>
							</div>
							</span>
							<button class="dongtai-content-link"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 666条评论</button>
							<button class="dongtai-content-link"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 分享</button>
							<button class="dongtai-content-link"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏</button>
							<button class="dongtai-content-link"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 感谢</button>
						</div>
					</div>
				</div>
				@show
			</div>
		</div>
	</div>
	@include('home.people._youce')
@endsection


@section('script')

<script type="text/javascript">
	// 点击 编辑封面图片
	$(document).ready(function () {
		$(".edit-img").click(function () { 
			return $(".cover-img").click(); 
		}); 
	
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


		$.ajax({
			url: '/people/edit',
			data: {
				'_token' : '{{ csrf_token() }}',
				'sex' : sex,
				'a_word' : aword,
				'address' : address,
				'job' : job,
				'intro' : intro
			},
			type : 'POST',
			dataType: 'json',
			success : function(data) {
				$('#notice-modal').modal();
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
	                	set_alert_info("上传文件失败了！");
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


