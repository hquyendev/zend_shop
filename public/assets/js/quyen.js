/*	
*	====================================
*	JavaScript message box by QuyenDev.com
*	DOT NOT COPY
*	====================================
*/
var QDEV = {};
$(document).ready(function(){
	var id = 0;
	var QMark = $('#qdev_mark_p');
		QDEV = {
		QTitle: function (title){
			return title = title ? title : 'Thông báo';
		},
		QValue: null,
		QFadeIn: function(msg, timeout, link, type){
			id = parseInt(Math.random()*1000);
			var mark = '#qdev_mark_'+id;
			var QBody = $('body');
			var QContent = $([
				'<div class="qdev_mark" id="qdev_mark_'+id+'">',
				'<div class="qdev_close qdev_bg"></div>',
				'<div class="qdev_content">',
				'<span class="qdev_close">x</span>',
				'<div class="qdev_body '+type+'">',
				msg,
				'</div>',
				'<div class="qdev_footer">',
				'<a href="#" class="qdev_close">Đóng</a>',
				link?'<a href="'+link+'" class="qdev_accept">Đồng ý</a>':'',
				'</div>',
				'</div>',
				'</div>'].join('')
				);

			timeout = timeout?timeout:3000;
			QMark.append(QContent);
			QBody.append(QMark);
			$(mark).animate({opacity: '1'}, 250);
			$('.qdev_content').animate({top:'100px', opacity:1},0);
			setTimeout(function() {QDEV.QFadeOut();}, timeout);

		   	$(QMark).on('click',function(event){
		   		if($(event.target).hasClass('qdev_close'))
		   		{
		   			event.preventDefault();
					QDEV.QFadeOut();
		   		}
		   	});
		},
		QFadeOut: function(){
			$('#qdev_mark_'+id).animate({opacity: '0'}, 150, function(){$('#qdev_mark_'+id).remove();});
		},
		QTranfer: function(link, timeout){
			if(!link)
			{
				setTimeout("location.reload();",timeout);
			}
			else {
				setTimeout("window.location.href= '"+link+"'",timeout);
			}
		},
		QToast: function(message, timeout, type, link, namelink){
			id = parseInt(Math.random()*1000);
			var toast = $('<div id="toast-'+id+'" class="q-toast '+type+'">'+message+'</div>');
			if(link)
			{
				toast.addClass('link').append('<a href="'+link+'" class="btn" title="Đồng ý">'+namelink+'</a>');
			}
			QMark.append(toast);
			toast.animate({'opacity':1,'right':35}, 50);
			setTimeout(function() {toast.animate({'opacity':0,'top':0}, 100, function(){ $(toast).remove();});}, timeout);
			toast.on('click', function(){
				$('.q-toast').remove();
			})
		},
		QData: function(data)
		{
			return QDEV.QValue = data;
		}
	};
	
	/*$('form[ target = "main" ]').on('submit',function(event) {
		event.preventDefault();
		if($(this).attr('ckeditor') == 'true')
		{
			for ( instance in CKEDITOR.instances ) {
		        CKEDITOR.instances[instance].updateElement();
		    }
		}
		$.ajax({
			url: 	$(this).attr('action'), 
			data: 	new FormData(this),
			type: 	$(this).attr('method'),  
			contentType: 	false,
			cache: 			false,
			dataType: 		"script",
			processData: 	false,   
			success:function(data){
			}
		});

		var inputs = $(this).find('input');
		$(inputs).removeClass('error');
		function inputCheck (tag, bool) {
			if(bool == false)
			{
				$(tag).removeClass('success');
				$(tag).addClass('error');
			}
			else
			{
				$(tag).addClass('success');
				$(tag).removeClass('error');
			}
		}
		for (var i =  0; i < inputs.length; i++) {
			inputCheck($(inputs[i]), true);
			if($(inputs[i]).hasClass('required') && $(inputs[i]).val()=='')
			{
				inputCheck($(inputs[i]), false);
			}
			if($(inputs[i]).hasClass('number') && isNaN($(inputs[i]).val()))
			{
				inputCheck($(inputs[i]), false);
			}
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if($(inputs[i]).hasClass('email') && re.test($(inputs[i]).val()) == false)
			{
				inputCheck($(inputs[i]), false);
			}
		};
	});

	$( 'a[ target = "main"]' ).click(function() {
		event.preventDefault();
	  	$.ajax({
			url: 		$(this).attr('href'),
			dataType: 	"script",
			success:function(data){
			}
		});
	});*/
});
