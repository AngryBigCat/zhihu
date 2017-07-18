/*!
 * jQuery Pinwheel - A Tooltips Plugin
 * ------------------------------------------------------------------
 *
 * jQuery Pinwheel is a plugin that show tooltips.
 *
 * @version        0.1.0
 * @since          2013.08.14
 * @author         charles.yu
 * @documentation  
 *
 * ------------------------------------------------------------------
 *
 *  <div id="tip"></div>
 *
 *  $('#tip').pinwheel();
 *
 */
(function($){
	var $loading, $wrap, timers = [], optsArray = [], currentObj, currentOpts = {},
		
		_position = function($ref, $target){
			var scrollTop,
				scrollLeft,
				windowHeight,
				windowWidth,
				refOffset,
				refHeight,
				refWidth,
				targetTop,
				targetLeft,
				targetHeight,
				targetWidth,
				originTop,
				originRight,
				originBottom,
				originLeft,
				arrowPositon,//箭头方向
				arrowSize = 5,
				isPosition = false;
				
			
			scrollTop = $(document).scrollTop();
			scrollLeft = $(document).scrollLeft();
			windowHeight = $(window).height();
			windowWidth = $(window).width();
			refOffset = $ref.offset();
			refHeight = $ref.outerHeight();
			refWidth = $ref.outerWidth();
			targetHeight = $target.outerHeight();
			targetWidth = $target.outerWidth();
			
			
			//定位显示的位置
			if(refOffset.top - scrollTop - targetHeight - arrowSize>= 0){//上
				if(windowWidth + scrollLeft - refOffset.left - targetWidth >= 0){//上右
					targetTop = refOffset.top - targetHeight - arrowSize;
					targetLeft = refOffset.left;
					isPosition = true;
					arrowPositon = "b";
				}else if(refOffset.left + refWidth -scrollLeft - targetWidth >=0){//上左
					targetTop = refOffset.top - targetHeight - arrowSize;
					targetLeft = refOffset.left + refWidth - targetWidth;
					isPosition = true;
					arrowPositon = "b";
					$wrap.find('.arrow').css({left: 'auto',right: '20px'});
				}
			}
			
			if(!isPosition){
				if(windowHeight - (refOffset.top + refHeight - scrollTop) - targetHeight - arrowSize >= 0){//下
					if(windowWidth + scrollLeft  - refOffset.left - targetWidth >= 0){//下右
						targetTop = refOffset.top + refHeight + arrowSize;
						targetLeft = refOffset.left;
						isPosition = true;
						arrowPositon = "t";
					}else if(refOffset.left + refWidth -scrollLeft - targetWidth >=0){//下左
						targetTop = refOffset.top + refHeight + arrowSize;
						targetLeft = refOffset.left + refWidth - targetWidth;
						isPosition = true;
						arrowPositon = "t";
						$wrap.find('.arrow').css({left: 'auto',right: '20px'});
					}
				}
			}
			
			
			if(!isPosition){
				if(windowWidth + scrollLeft - refOffset.left - refWidth - targetWidth - arrowSize>= 0){//右
					if(refOffset.top + refHeight - scrollTop - targetHeight >= 0){//右上
						targetTop = refOffset.top + refHeight - targetHeight;
						targetLeft = refOffset.left + refWidth + arrowSize;
						isPosition = true;
						arrowPositon = "l";
						$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
					}else if(refOffset.top + windowHeight - scrollTop - targetHeight>= 0){//右下
						targetTop = refOffset.top;
						targetLeft = refOffset.left + refWidth + arrowSize;
						isPosition = true;
						arrowPositon = "l";
					}
				}
			}
			
			if(!isPosition){
				if(refOffset.left - scrollLeft - targetWidth - arrowSize>=0){//左
					if(windowHeight - (refOffset.top - scrollTop) - targetHeight >= 0){//左下
						targetTop = refOffset.top;
						targetLeft = refOffset.left - targetWidth -arrowSize;
						isPosition = true;
						arrowPositon = "r";
					}else if(refOffset.top + refHeight - scrollTop - targetHeight >= 0){//左上
						targetTop = refOffset.top + refHeight - targetHeight;
						targetLeft = refOffset.left - targetWidth - arrowSize;
						isPosition = true;
						arrowPositon = "r";
						$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
					} 
				}
			}
			
			if(!isPosition){
				//特殊情况定位(非最大化情况下)
				//计算原点与浏览器视窗边缘的距离
				originTop = refOffset.top - scrollTop + refHeight/2;
				originBottom = windowHeight - originTop;
				originLeft = refOffset.left - scrollLeft + refWidth/2;
				originRight = windowWidth - originLeft;
				
				if(originTop >= originBottom ){
					if(originRight >= originLeft){
						if(originTop < targetHeight && originRight >= targetWidth){//右上
							targetTop = refOffset.top + refHeight - targetHeight;
							targetLeft = refOffset.left + refWidth + arrowSize;	
							arrowPositon = "l";
							$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
						}else{//上右
							targetTop = refOffset.top - targetHeight - arrowSize;
							targetLeft = refOffset.left;
							arrowPositon = "b";
						}
					}else{
						if(originTop < targetHeight && originLeft >= targetWidth){//左上
							targetTop = refOffset.top + refHeight - targetHeight;
							targetLeft = refOffset.left - targetWidth - arrowSize;
							arrowPositon = "r";
							$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
						}else{//上左
							targetTop = refOffset.top - targetHeight - arrowSize;
							targetLeft = refOffset.left + refWidth - targetWidth;
							arrowPositon = "b";
							$wrap.find('.arrow').css({left: 'auto',right: '20px'});
						}
					}
				}else{
					if(originRight >= originLeft){
						if(originBottom < targetHeight && originRight >= targetWidth){//右下
							targetTop = refOffset.top;
							targetLeft = refOffset.left + refWidth + arrowSize;		
							arrowPositon = "l";
						}else{//下右
							targetTop = refOffset.top + refHeight + arrowSize;
							targetLeft = refOffset.left;
							arrowPositon = "t";
						}
					}else{
						if(originBottom < targetHeight && originLeft >= targetWidth){//左下
							targetTop = refOffset.top;
							targetLeft = refOffset.left - targetWidth - arrowSize;
							arrowPositon = "r";
						}else{//下左
							targetTop = refOffset.top + refHeight + arrowSize;
							targetLeft = refOffset.left + refWidth - targetWidth;
							arrowPositon = "t";
							$wrap.find('.arrow').css({left: 'auto',right: '20px'});
						}
					}
				}
				
				isPosition = true;	
			}
			
			$wrap.find('.arrow').removeClass().addClass('arrow arrow_' + arrowPositon);
			
			if(isPosition){
				$target.css({
					top: targetTop,
					left: targetLeft
				});
			}

		},
		
		_appendContent = function(){
			var type, href, data, content;
				
			$loading = $('<div class="pinwheel_loading"><div>正在加载，请稍后</div></div>');
			if (typeof($wrap) != "undefined"){
				$wrap.html('');
			}else{	
				$('body').append('<div class="pinwheel_wrap"></div>');
				$wrap = $('.pinwheel_wrap');
			}
			$wrap.html('<div class="pinwheel_layer"><div class="bg"><div class="effect"><div class="pinwheel_content"></div><div class="arrow"></div></div></div></div>');
			$wrap.find('.pinwheel_content').append($loading);
			

			
			for(var i=0; i<optsArray.length; i++){
				if(optsArray[i] && optsArray[i].obj == currentObj){
					currentOpts = optsArray[i].opts;
					break;
				}
			}
			
			if(currentOpts.content){
				type = 'html';
			}else{
				type = 'ajax';
			}
			
			switch (type) {
				case 'html' :
					$wrap.find('.pinwheel_content').html(currentOpts.content);
				break;
				
				case 'ajax' :
					href = $(currentObj).attr('ajax-href');
					data = $(currentObj).attr('ajax-data');
					
					var ajaxLoader = $.ajax({
						url	: href,
						data : data || {},
						error : function(XMLHttpRequest, textStatus, errorThrown) {
							if ( XMLHttpRequest.status > 0 ) {
								window.console.log('ajax error');
							}
						},
						success : function(data, textStatus, XMLHttpRequest) {
							var o = typeof XMLHttpRequest == 'object' ? XMLHttpRequest : ajaxLoader;
							if (o.status == 200) {
								$wrap.find('.pinwheel_content').html(data);
								// 重新定位,Fix By 夏の寒风
								_position($(currentObj), $wrap);//定位
							}
						}
					});
				break;
			}
			//$wrap.find('.pinwheel_content').html(opts.content);	
		},
		
		_
		
		//清除所有定时器 ps:之前没考虑到会产生多个定时器,差点被搞死...
		_clearTimer = function(){
			for(var i=0; i<timers.length; i++){
				if(timers[i]){
					clearInterval(timers[i]);
				}
			}
			timers = [];
		},
		
		_debug = function($obj){
			if(window.console && window.console.log){
				window.console.log("pinwheel count :" +　$obj.size());
			};
		};
		
	$.fn.pinwheel = function(options){
		//_debug(this);
		var opts = $.extend({}, $.fn.pinwheel.defaults, options);
		
		return this.each(function(){	
								  
			optsArray.push({obj:this, opts:opts});
			
			$(this).bind("mouseover",function(e){
				e.stopPropagation();
				_clearTimer();	
				
				
				if(currentObj && currentObj == this){			
					_position($(this), $wrap);//定位
					$wrap.show();
				}else{
					currentObj = this;	
					_appendContent();//为容器添加内容		
					_position($(this), $wrap);//定位
					$wrap.show();

					$wrap.unbind().bind('mouseover', function(e){							  
						e.stopPropagation();
						_clearTimer();
					});
			
					$(document).unbind().bind("mouseover", function(){
						_clearTimer();																	
						if($wrap.is(':visible')){
							var timer = setInterval(function(){
								$wrap.hide();
								_clearTimer();
							},50);	
							timers.push(timer);
						}
					});		
				}
			});	
			
		});
	};
	
	$.fn.pinwheel.defaults = {

	};
})(jQuery);