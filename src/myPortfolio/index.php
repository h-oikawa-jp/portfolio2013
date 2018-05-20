<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start('ob_gzhandler'); else ob_start(); ?>
<?php $page = basename($_SERVER['SCRIPT_NAME']); $page_url = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
	//ページ別メタ情報
	$pageTitle = "h-oikawa&#039;s Portfolio Site";
	$pageDescription = "h-oikawaの(旧)ポートフォリオサイトです。";
	$pageKeywords = "web design, portfolio, ウェブデザイン, ポートフォリオ";
	//ヘッダのリード文
	$headerRead = 'ここは h-oikawa が学生時代に作成した(旧)ポートフォリオサイトです。';
?>

<!DOCTYPE html>

<!-- IEのバージョン別にhtmlクラス分け -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="jp"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="jp"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="jp"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="jp"> <!--<![endif]-->

<head>
	<?php include("parts/meta.php"); ?>
	<link rel="contents" href="" title="サイトマップ等" />

</head>

<body id="top">
<?php include("parts/header.php"); ?>

<!-- パンくずリスト -->
<ul class="breadcrumb">
	<li><span class="divider">&gt;</span></li>
	<li class="active">Home</li>
</ul>



<!-- ==================== Main Contents ==================== -->
<div id="mainContents">
	<div class="container">


		<section class="hero-unit">
			<!--<h1>Hello, world!</h1>-->
			<h2>PickUp, My Works!</h2>

			<!-- Slider Row -->
			<div class="row-fluid" id="slider">
				<!-- Top part of the slider -->
				<div class="span8" id="carousel-bounding-box">
					<div id="myCarousel" class="carousel slide">
						<!-- Carousel items -->
						<div class="carousel-inner">
							<div class="active item" data-slide-number="0"><img src="img/carousel/fugaku-trace.jpg" /></div>
							<div class="item" data-slide-number="1"><img src="img/carousel/WinShortcut.jpg" /></div>
							<div class="item" data-slide-number="2"><img src="img/carousel/scrShot_jq.jpg" /></div>
							<div class="item" data-slide-number="3"><img src="img/carousel/scrShot_brg.jpg" /></div>
							<div class="item" data-slide-number="4"><img src="img/carousel/real-trace.png" /></div>
						</div>
						<!-- Carousel nav -->
						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>

				<!-- Toggle Text about the Slide -->
				<div class="span4" id="carousel-text">このタグの中身はJavaScriptによって"#slide-content-x"の内容に書き換えられます。</div>

				<!-- Slide Contents -->
				<div style="display: none;" id="slide-content">
					<section id="slide-content-0">
						<h3>Illustrator 画像トレース</h3>
						<p>葛飾北斎：富嶽三十六景<br>
							＜甲州三坂水面＞</p>
						<p class="sub-text">2013 Feb. 10 - 15 <br>
							<a class="btn" href="gallery.php#tab1">View Gallery &raquo;</a></p>
					</section>
					<section id="slide-content-1">
						<h3>Shortcut Wallpaper</h3>
						<p>Windows ショートカット一覧の壁紙</p>
						<p class="sub-text">2013 Mar. 09 - 13 <br>
							<a class="btn" href="gallery.php#tab2">View Gallery &raquo;</a></p>
					</section>
					<section id="slide-content-2">
						<h3>jQuery Experiment</h3>
						<p>Ajax & jQuery プラグイン 導入練習サイト</p>
						<p class="sub-text">2013 Apr. 20 - May 30 <br>
							<a class="btn" href="../jQuery_Experiment" target="_blank">Visit &raquo;</a></p>
					</section>
					<section id="slide-content-3">
						<h3>PHOTO GALLERY</h3>
						<p>画像表示 jQuery プラグイン のテストサイト</p>
						<p class="sub-text">2013 Apr. 20 - May 30 </p>
					</section>
					<section id="slide-content-4">
						<h3>リアルトレース</h3>
						<p>腕時計の画像をグラデーションメッシュでトレース</p>
						<p class="sub-text">2013 Jan. 17 - Feb. 15 <br>
							<a class="btn" href="gallery.php#tab1">View Gallery &raquo;</a></p>
					</section>
				</div><!-- /Slide Contents -->

			</div><!-- /Slider Row -->


			<!-- Slider Thumbnails -->
			<div class="row-fluid hidden-phone" id="slider-thumbs">
				<div class="span10">
					<!-- Bottom switcher of slider -->
					<ul class="thumbnails">
						<li class="span2">
							<a class="thumbnail" id="carousel-selector-0">
								<img class="img-circle" src="img/carousel/fugaku-trace.jpg" />
							</a>
						</li>
						<li class="span2">
							<a class="thumbnail" id="carousel-selector-1">
								<img class="img-circle" src="img/carousel/WinShortcut.jpg" />
							</a>
						</li>
						<li class="span2">
							<a class="thumbnail" id="carousel-selector-2">
								<img class="img-circle" src="img/carousel/scrShot_jq.jpg" />
							</a>
						</li>
						<li class="span2">
							<a class="thumbnail" id="carousel-selector-3">
								<img class="img-circle" src="img/carousel/scrShot_brg.jpg" />
							</a>
						</li>
						<li class="span2">
							<a class="thumbnail" id="carousel-selector-4">
								<img class="img-circle" src="img/carousel/real-trace.png" />
							</a>
						</li>
					</ul>
				</div>
			</div><!-- /Slider Thumbnails -->

		</section><!-- /.hero-unit -->


		<!-- row of columns -->
		<div class="row">
			<section class="span7 well">
				<h2>Bootstrap について</h2>
				<p>このサイトは Twitter社の Bootstrap を使用して作成しています。</p>
				<p><a class="btn btn-info" href="http://twitter.github.com/bootstrap/">Read more &raquo;</a></p>
			</section>
		</div>

	</div> <!--/.container -->
</div>
<!-- ==================== /Main Contents ==================== -->




<?php include("parts/footer.php"); ?>

</body>

<?php include("parts/script.php"); ?>

</html>
