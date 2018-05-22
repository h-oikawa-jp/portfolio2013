$(document).ready(function(){
	
	
	$("#main-nav li a.toggle").click(function(){
		if($(this).attr('rel')=='up') {
			$(this).attr('rel','down')
			
			$("#main-nav li a.main-link").removeClass("active");
			//$(".sub-links").fadeOut();
			$("#sub-link-bar > *").fadeOut();
			$("#sub-link-bar").animate({ height: "5px" });
			
			$("#iconArrow").attr('class','icon-arrow-down')
		} 
		else if($(this).attr('rel')=="down") {
			$(this).attr('rel','up')
			
			$("#main-nav li a.main-link").removeClass("active");
			//$(".sub-links").fadeIn();
			$("#sub-link-bar > *").fadeIn();
			$("#sub-link-bar").animate({ height: "300px" });
			
			$("#iconArrow").attr('class','icon-arrow-up')
		} 
		else {$(this).attr('rel','up')}
		return false;
	});
	$("#main-nav li a.main-link").hover(function(){
		$("#main-nav li a.main-link").removeClass("active");
		$(this).addClass("active");
		
		/*if($("#iconArrow").attr('class')=='icon-arrow-up') {
			$(".sub-links").hide();
			$(this).siblings(".sub-links").fadeIn();
		}*/
		
		var index = $(this).attr('index');
		setTimeout(function(){
			$("#slyItems > li").eq(index).click();
		},100);
		
	});
	
	
	
	function mainAjax(url){
		$.ajax({
			url: url,
			dataType: "html",
			cache: false,
			success: function(data, textStatus){
				// データ取得成功時、 data にサーバーから返された html が入る
				function pageSwap(){
					$('#main-ajax').html(data);
				}
				
				
				//$('#main-ajax').fadeTo(500,0);
				//$('#main-ajax').slideUp(300);
				$('#main-ajax').hide();
				pageSwap()
				
				/*setTimeout(function(){
					//$('#main-ajax').html(data);
					//$('#main-ajax').fadeTo(500,1);
					$('#main-ajax').slideDown(500);
				},400);*/
				/*$('#main-ajax').load(function() {
					$('#main-ajax').slideDown(500);
				});*/
				$('#main-ajax').ready(function() {
					//$('#main-ajax').slideDown(500);
					$('#main-ajax').fadeIn(500);
				});	
			},
			error: function(xhr, textStatus, errorThrown){
				alert('Error! ' + textStatus + ' ' + errorThrown);
			}
		});
		//alert("ajax:"+url);
	};
	
	mainAjax('ajax/ajax.RefineSlide.html'); // 初期ページ読み込み
	$("a.mainAjax").click(function(){
		var page = $(this).attr('index');
		
		mainAjax($(this).attr('href'));
		return false;
	});
	


});


