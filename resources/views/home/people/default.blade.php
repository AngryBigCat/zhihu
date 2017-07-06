@extends('home.layouts.default')

@section('style')
	@include('home.people._style')
@endsection



@section('content')
	@include('home.people._header')
	<div class="col-md-8">
		<div class="dongtai col-md-12">
			@yield('bread')
			<div>
				@yield('daohang')
			</div>
		</div>
	</div>
	@include('home.people._youce')
@endsection


@section('js')
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