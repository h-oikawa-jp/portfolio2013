<!--[if lt IE 10]>
	<div class="chromeframe alert alert-info container text-center">
		<a class="close">&times;</a>
		<p><strong class="label label-warning" style="margin: 10px 20px">Caution</strong>※ご使用中の Internet Explorer は最新ではありません。<br>このページを正常に閲覧するにはブラウザを<a href="http://browsehappy.com/">アップデート</a>するか <a href="http://www.google.com/chromeframe/?redirect=true">Google Chrome Frame</a> を有効にして下さい。</p>
	</div>
<![endif]-->

<!-- ==================== header ==================== -->
<header id="header">
	<div class="row container centering">
		<div class="span4">
			<h1><?php echo $pageTitle; ?></h1>
			<div id="backLogo">
				<embed src="img/bgLogo.svg" type="image/svg+xml" alt="Site Logo" />
			</div>
		</div>
		<div class="span8 bsa well">
			<p class="lead"><?php echo $headerRead; ?></p>
		</div>
	</div><!--/.row -->

	<nav id="navbar" class="navbar navbar-fixed-top">
		<div id="navbarInner" class="navbar-inner">
			<!-- アイテムコンテナ、センタリング -->
			<div class="container centering">
				<!-- Navi ＝ ページ遷移メニュー -->
				<div id="pageNav" class="nav dropdown">
					<a href="#" class="brand dropdown-toggle" data-toggle="dropdown"><h2>Navi <span class="caret"></span></h2></a>
					<ul id="pageNavMenu" class="dropdown-menu SmoothScroll">
						<li><a class="btn" href="#top"><span>Top</span></a></li>
						<li><a class="btn" onClick="history.back(); return false;"><span>Prev</span></a></li>
						<li><a class="btn" onClick="history.forward(); return false;"><span>Next</span></a></li>
						<li><a class="btn" href="#footer"><span>End</span></a></li>
					</ul>
				</div>


				<!-- 検索ボックス -->
				<form id="siteSearch" class="navbar-search form-search pull-right" method="get" action="https://www.google.co.jp/search">
					<input type="hidden" name="ie" value="utf-8">
					<input type="hidden" name="oe" value="utf-8">
					<input type="hidden" name="hl" value="ja">
					<input type="hidden" name="sitesearch" value="<?php echo $_SERVER['SERVER_NAME'] ?>">
					<div class="input-append" id="appendedSearchBar">
						<input type="text" name="q" class="search-query span2" maxlength=255 placeholder="Google検索">
						<button type="submit" name="btnG" class="btn btn-small"><i class="icon-search icon-white"></i></button>
					</div>
				</form>



				<!-- 縮小表示時のメニューボタン -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a><!--/.btn-navbar -->

				<!-- 縮小表示時ボタン内格納メニュー -->
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li>
							<a href="index.php">
								<i class="icon-home icon-white"></i> Home
							</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-picture icon-white"></i> Gallery <b class="caret"></b>
							</a>
							<ul id="galleryMenu" class="dropdown-menu">
								<li><a href="gallery.php" class="nav-header">Gallery</a></li>
								<li class="divider"></li>
								<li><a href="gallery.php#tab1">Illustrations</a></li>
								<li><a href="gallery.php#tab2">Photographys</a></li>
								<li><a href="gallery.php#tab3">Page Design</a></li>
								<li><a href="gallery.php#tab4">Script Programs</a></li>
								<li><a href="gallery.php#tab5">Web Site</a></li>
							</ul>
						</li>
						<li class="divider-vertical"></li>
					</ul>
					<ul class="nav pull-right">
						<li class="divider-vertical"></li>
						<li class="disabled">
							<a href="https://me.h-oikawa.jp"><i class="icon-info-sign icon-white"></i> About Me</a>
						</li>
						<li>
							<a href="https://www.facebook.com/oikawa.hiroyuki.9" target="_blank">
								<i class="icon-user icon-white"></i> Facebook
							</a>
						</li>
						<li>
							<a href="https://twitter.com/Qkanshi">
								<i class="icon-bookmark icon-white"></i> Twitter
							</a>
						</li>
						<li>
							<a href="mailto:contact@h-oikawa.jp">
								<i class="icon-envelope icon-white"></i> Contact
							</a>
						</li>
						<li class="divider-vertical"></li>
					</ul>
				</div><!--/.nav-collapse -->

			</div><!--/.container -->
		</div><!--/.navbar-inner -->
	</nav>
</header>
<!-- ==================== /header ==================== -->
