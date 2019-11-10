// JavaScript Document
function DSXDialog(settings){
	var option = $.extend({
			title:'窗口',
			yesBtn:'确定',
			noBtn:'取消',
			fixed:true,
			width:500,
			hideBottom:false
		},settings);
		var self = this;
		var header  = $('<div class="dialog-title"><strong>'+option.title+'</strong><span class="icon close">&#xf00b3;</span></div>');
		var footer  = $('<div class="dialog-footer"><div class="ui-button ui-button-yes" tabindex="1">'+option.yesBtn+'</div><div class="ui-button ui-button-no" tabindex="1">'+option.noBtn+'</div></div>');
		var dialogCount = DSXDialog.__count;
		this.id = option.id ? option.id : 'ui-dialog-'+dialogCount;
		this.zIndex  = option.zIndex ? option.zIndex : dialogCount+1000;
		this.content = $('<div class="dialog-content"></div>');
		this.window  = $('<div id="'+this.id+'" class="ui-dialog"></div>').width(option.width).css({'z-index':this.zIndex+1});
		this.overLayer = $('<div id="ui-overlayer-'+dialogCount+'" class="ui-overlayer"></div>').css({'z-index':this.zIndex});
		
		this.setContent = function(){
			if(option.html) {
				self.content.html(option.html);
			}else if(option.iframe) {
				self.content.html('<iframe frameborder="0" style="width:100%; height:100%; display:block;" src="'+c.frame+'"></iframe>');
			}else if(option.url) {
				$.ajax({
					url:option.url,
					dataType:'html',
					beforeSend: function(){
						self.content.html('<div class="ui-ajax-loading"></div>');
					},
					success: function(c){
						self.content.html(c);
						self.setPosition();
						if(option.afterLoad) option.afterLoad(self);
					}
				});
			}else if(option.selector){
				self.content.html($(option.selector).html());
			}
			self.setPosition();
		}
		
		this.setPosition = function(){
			var left = ($(window).width() - self.window.outerWidth()) / 2;
            var top = ($(window).height() - self.window.outerHeight()) / 2;
			if(option.fixed){
				self.window.css({top:top,left:left});
			}else{
				self.window.css({top:top+$(document).scrollTop(),left:left+$(document).scrollLeft()});
			}
		}
		
		this.close = function(){
			if(option.beforeClose) option.beforeClose(self);
			self.overLayer.remove();
			self.window.remove();
			if(option.afterClose) option.afterClose(self);
		}
		
		var init = function(){
			$(document.body).append(self.overLayer);
			$(document.body).append(self.window);
			self.window.append(header);
			self.window.append(self.content);
			if(!option.hideBottom) self.window.append(footer);
			if(option.height) self.content.height(option.height);
			self.setPosition();
			self.setContent();
			
			var mouse={x:0,y:0};
			function moveDialog(event){
				var e = window.event || event;
				var top = parseInt(self.window.css('top')) + (e.clientY - mouse.y);
				var left = parseInt(self.window.css('left')) + (e.clientX - mouse.x);
				self.window.css({top:top,left:left});
				mouse.x = e.clientX;
				mouse.y = e.clientY;
			};
			self.window.find('.dialog-title').mousedown(function(event){
				var e = window.event || event;
				mouse.x = e.clientX;
				mouse.y = e.clientY;
				$(document).bind('mousemove',moveDialog);
				$(this).css('cursor','move');
			});
			$(document).mouseup(function(event){
				$(document).unbind('mousemove', moveDialog);
				self.window.find('.dialog-title').css('cursor','default');
			});
			
			/* 绑定一些相关事件。 */
			self.window.find('.close').on('click', self.close);
			self.window.find('.ui-button-yes').on('click', function(e){
				if(option.onConfirm) option.onConfirm(self);
			});
			self.window.find('.ui-button-no').on('click', function(e){
				if(option.onCancel) option.onCancel(self);
				self.close();
			});
			if(option.afterShow) option.afterShow(self);
		}
		init.call(this);
		DSXDialog.__count++;
}
DSXDialog.__count = 1;

;(function($){
$.fn.Jscroll = function(settings){
	settings = $.extend({
		speed : 3000,
		animateSpeed:1000,
		direction : 'left',
		width:300,
		height:300,
		arrowLeft:'',
		arrowRight:''
	},settings);
	var that = this;
	var ul = $(this).find("ul");
	$(this).css({'overflow':'hidden','height':settings.height});
	if(settings.direction == 'left' || settings.direction == 'right') ul.css({'width':1000,'height':settings.height});
	that.t = setInterval(function(){that.AutoPlay();},settings.speed);
	that.scrollLeft = function(){
		ul.animate({marginLeft:-settings.width+"px"},settings.animateSpeed,function(){
			//把第一个li丢最后面去
			ul.css({marginLeft:0}).find("li:first").appendTo(ul);
		});
	}
	that.scrollRight = function(){
		ul.css({marginLeft:-settings.width+"px"}).find("li:last").prependTo(ul);
		ul.animate({marginLeft:0},settings.animateSpeed,function(){
			//把第一个li丢最后面去
		});
	}
	that.scrollUp = function(){
		ul.animate({marginTop:-settings.height+"px"},settings.animateSpeed,function(){
			//把第一个li丢最后面去
			ul.css({marginTop:0}).find("li:first").appendTo(ul);
		});
	}
	that.scrollDown = function(){
		ul.css({marginTop:-settings.height+"px"}).find("li:last").prependTo(ul);
		ul.animate({marginTop:0},settings.animateSpeed,function(){
			//把第一个li丢最后面去
		});
	}
	that.AutoPlay = function(){
		if(settings.direction == 'right'){
			that.scrollRight();
		}else if(settings.direction == 'up'){
			that.scrollUp();
		}else if(settings.direction == 'down'){
			that.scrollDown();
		}else{
			that.scrollLeft();
		}
	}
	$(this).hover(function(){
		clearTimeout(that.t);
	},
	function(){
		that.t = setInterval(function(){that.AutoPlay();},settings.speed);
	});
	$(this).find(settings.arrowLeft).bind('click',that.scrollRight);
	$(this).find(settings.arrowRight).bind('click',that.scrollLeft);
}
})(jQuery);

/*
 * jQuery JavaScript Library Marquee Plus 1.0
 * http://mzoe.com/
 *
 * Copyright (c) 2009 MZOE
 * Dual licensed under the MIT and GPL licenses.
 *
 * Date: 2009-05-13 18:54:21
 */
;(function($) {
	$.fn.marquee = function(o) {
		//获取滚动内容内各元素相关信息
		o = $.extend({
			speed:30, // 滚动速度
			step:1, // 滚动步长
			direction:'left', // 滚动方向
			pause: 0, // 停顿时长
			container:'ul',
			items : 'li'
		}, o || {});
		var dIndex = $.inArray(o.direction, ['right', 'down']);
		if (dIndex > -1) {
			o.direction = ['left', 'up'][dIndex];
			o.step = -o.step;
		}
		var mid;
		var div 		= $(this); // 容器对象
		var divWidth 	= div.innerWidth(); // 容器宽
		var divHeight 	= div.innerHeight(); // 容器高
		var ul 			= div.find(o.container);
		var li 			= ul.find(o.items);
		var liSize 		= li.size(); // 初始元素个数
		var liWidth 	= li.width(); // 元素宽
		var liHeight 	= li.height(); // 元素高
		var width 		= liWidth * liSize;
		var height 		= liHeight * liSize;
		div.height(liHeight);
		if ((o.direction == 'left' && width > divWidth) || 
			(o.direction == 'up' && height > divHeight)) {
			// 元素超出可显示范围才滚动
			if (o.direction == 'left') {
				ul.width(2 * liSize * liWidth);
				if (o.step < 0) div.scrollLeft(width);
			} else {
				ul.height(2 * liSize * liHeight);
				if (o.step < 0) div.scrollTop(height);
			}
			ul.append(li.clone()); // 复制元素
			mid = setInterval(_marquee, o.speed);
			div.hover(
				function(){clearInterval(mid);},
				function(){mid = setInterval(_marquee, o.speed);}
			);
		}
		function _marquee() {
			// 滚动
			if (o.direction == 'left') {
				var l = div.scrollLeft();
				if (o.step < 0) {
					div.scrollLeft((l <= 0 ? width : l) + o.step);
				} else {
					div.scrollLeft((l >= width ? 0 : l) + o.step);
				}
				if (l % liWidth == 0) _pause();
			} else {
				var t = div.scrollTop();
				if (o.step < 0) {
					div.scrollTop((t <= 0 ? height : t) + o.step);
				} else {
					div.scrollTop((t >= height ? 0 : t) + o.step);
				}
				if (t % liHeight == 0) _pause();
			}
		}
		function _pause() {
			// 停顿
			if (o.pause > 0) {
				var tempStep = o.step;
				o.step = 0;
				setTimeout(function() {
					o.step = tempStep;
				}, o.pause);
			}
		}
	};
})(jQuery);

;(function($){
	$.fn.extend({
		confirm : function(settings){
			var option = $.extend({
				event:'click',
				text:'确定要删除吗?',
				btnYes:'确定',
				btnNo:'取消'
			},settings);

			var div = $('<div id="ui-confirm-box" class="ui-confirm-box">'+
			'<dl><dt class="txt">'+option.text+'</dt><dd><span class="btn btn-yes" tabindex="1">'+option.btnYes+'</span>'+
			'<span class="btn btn-no" tabindex="1">'+option.btnNo+'</span></dd></dl></div>');
			$(this).on(option.event,function(e) {
                if(e.stopPropagation){
					e.stopPropagation();
				}else{
					e.cancelBubble = true;
				}
				var self = this;
				var position = $(this).offset();
				var top = parseInt((position.top+$(this).outerHeight())) + 7;
				$(document.body).append(div);
				div.css({"top":top+"px","display":"none",'position':'absolute'}).fadeIn("fast");
				if((position.left + div.width()) > $(document).width()){
					div.css({'right':$(document).width() - (position.left+$(this).outerWidth())+'px'});
				}else {
					div.css({'left':position.left+'px'});
				}
				div.find(".btn-yes").one('click',function(){
					div.remove();
					if(option.onConfirm) option.onConfirm(div,self);
				});
				div.find(".btn-no").click(function(){
					div.remove();
					if(option.onCancel) option.onCancel(div,self);
				});
				div.click(function(event){
					var e = window.event || event;
					if(e.stopPropagation){
						e.stopPropagation();
					}else{
						e.cancelBubble = true;
					}
				});
				$(document).on('click',function(){div.remove();});
			});
		},
		showPrompt:function(){
			var that = this;			
			var tips  = $('<div class="ui-tips-box" id="ui-tips-box"></div>');
			var arrow = $('<div class="ui-tips-arrow" id="ui-tips-arrow"></div>');
			this.show = function(){				
				$(document.body).append(tips);
				$(document.body).append(arrow);
				tips.empty().text($(this).attr('prompt'));
				var offset = $(this).offset();
				var left = offset.left + $(that).outerWidth()/2;
				arrow.css({top:offset.top-14, left:left-8});
				
				var tipsLeft = offset.left - (tips.outerWidth() - $(this).outerWidth())/2;
				tips.css({top:offset.top-$(tips).outerHeight()-8, left:tipsLeft});
			}
			this.hide = function(){
				tips.remove();
				arrow.remove();
			}
			
			$(this).hover(this.show,this.hide);
		},
		setImage : function(success,error){
			var that = this;
			var el = null;
			var div = $("<div/>").attr("id","ui-setimage-dialog").height(0);
			var form = $('<form id="ui-setimage-form" enctype="multipart/form-data" method="POST" action="/?m=photo&c=jsapi&a=uploadimage"></form>');
            var file = $('<input type="file" name="filedata" title="点击上传图片">').css({'opacity':'0','position':'absolute','z-index':'500','cursor':'pointer'});
			
			form.append(file);
			div.append(form);
			$(file).change(function(e) {
				var loading;
                form.ajaxSubmit({
					dataType:'json',
					beforeSend:function(){
						loading = DSXUI.showloading('正在上传图片');
					},
					success:function(json){
						loading.close();
						if(json.errno == 0){
							$(el).attr('src',json.data.imageurl);
							if(success) success(el,json.data);
						}else {
							DSXUI.error('上传失败');
							if(error) error(json);
						}
					}
				});
            });
			$(this).each(function(index, element) {
                $(element).mouseover(function(){
					el = element;
					var offset = $(this).offset();
					file.css({'left':offset.left,'top':offset.top,'width':$(this).width(),'height':$(this).height()});
					$(document.body).append(div);
				});
            });
		},
		pickImage : function(settings){
			var opts = $.extend({
				multi:false
			},settings);
			
			var current;
			var that = this;
			$(this).click(function(e) {
                current = this;
				DSXUI.showImagePickView({
					multi:opts.multi,
					onPicked:function(data){
						if(opts.onPicked) opts.onPicked(current, data);
					}
				});
            });
		}
	});
})(jQuery);