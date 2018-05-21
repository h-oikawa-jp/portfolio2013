jQuery(document).ready(function(){


/**********************************************************************/
	//グローバルナビのアクティブ(現在のページ)表示切り替え
	if(location.href.match("/about")){
		$('#header nav ul.nav li').eq(2).addClass('active');
	} else 
	if(location.href.match("/gallery")){
		$('#header nav ul.nav li').eq(3).addClass('active');
	} else 
	if(location.href.match("/link")){
		$('#header nav ul.nav li').eq(4).addClass('active');
	} else 
	if(location.href.match("/")){
		$('#header nav ul.nav li').eq(1).addClass('active');
	}
/**********************************************************************/
	
	
	
/**********************************************************************/
	//縮小時のナビバー位置切り替え
	var navbar = $("#navbar");
	var navbarInner = $("#navbarInner");
	var fixedFlag = 1;
	function windowWidth(){
		//ウィンドウ幅判定 → フラグ切り替え
		if($(window).width() < 980) {
			fixedFlag = 1;
		} else {
			fixedFlag = 0;
			//スタイルリセット
			navbar.css("position","");
			navbarInner.css("padding","");
			$("body").css("margin-top","");
		}
	}
	function toggleFixed() {
		//ヘッダより下にスクロールしたらスタイル変更
		if($(window).scrollTop() >= $("#header").height()) {
			navbar.css("position","fixed");
			navbarInner.css("padding","0 20px");
			$("body").css("margin-top","50px");
		} else {
			navbar.css("position","");
			navbarInner.css("padding","");
			$("body").css("margin-top","");
		}
	}
	windowWidth(); //ドキュメントロード時
	$(window).resize(function() {
		//ウィンドウリサイズ時
		windowWidth();
	});
	$(window).scroll(function() {
		//ウィンドウスクロール時
		if(fixedFlag) toggleFixed();
	});
/**********************************************************************/



/**********************************************************************/
	//アラートボックス クローズボタン
	if ( $('.alert').length ) {
		$(".alert a.close").click(function(){
			$(this).parent(".alert").toggle();
		});
	}
/**********************************************************************/


/**********************************************************************/
	//タブ表示切り替え
	if ( $('.nav-tabs').length ) {
		//自動クリックファンクション
		function tabAutoClick(target) {
			setTimeout(function(){
				$(target).click();
			},300);
		}
		//ページロード時、URLからクリックターゲット指定
		tabAutoClick('#' + $.url().attr('fragment'));
		//ナビメニュークリック時
		$('#galleryMenu a').click(function(){
			setTimeout(function(){
				tabAutoClick('#' + $.url().attr('fragment'));
			},100);
		});
		
		$('.nav-tabs a').click(function(){
			//alert($(this).attr('href'));
			var label = $($(this).attr('href')).find('h3').text();
			$('#tabLabel').text(label);
		});
	}
/**********************************************************************/


	$('#nav-tabs a').on('click', function(){
		var list = $('#nav-tabs > li').toArray();
		//alert(list);
		//$('#nav-tabs').empty().append(list);
	});
/*	$('#reverse').toggle(
		function() {
			$(this).text('Normal Order');
		},
		function() {
			$(this).text('Reverse Order');
		}
	);*/











/**********************************************************************/
	// jQuery modalBox setting

	function absModalScroll(){
		setTimeout(function(){
			/* 絶対配置時スクロール位置に移動 */
			if($("#modalBox").css('position') == "absolute") {
				$("#modalBox").css({top:$(window).scrollTop()+40});
			}
			$('.openmodalbox').click(function() {absModalScroll()});
		},1000);
	};
	
	$('.openmodalbox').click(function() {absModalScroll()});
	
	/* ウィンドウリサイズに追随 */
	$(window).resize(function() {
		if(0 < $("#modalBox .resizable").length) {
			$("#modalBox").width($(window).width() * 0.96);
		}
	});



	/* flashClockModal */
	$("a.flashClockModal").modalBox({
		getStaticContentFrom : "#flClockModalContents",
		setWidthOfModalLayer : 656
	});
/**********************************************************************/


});
