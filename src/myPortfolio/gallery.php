<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start('ob_gzhandler'); else ob_start(); ?>
<?php $page = basename($_SERVER['SCRIPT_NAME']); $page_url = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];
	//ページ別メタ情報
	$pageTitle = "h-oikawa&#039;s Gallery";
	$pageDescription = "h-oikawa&#039;s Portfolio : ギャラリー";
	$pageKeywords = "web design, portfolio, ウェブデザイン, ポートフォリオ";
	//ヘッダのリード文
	$headerRead = 'Adobe Illustrator／Photoshop 等で作成したデザイン作品の掲載ページ';
?>

<!DOCTYPE html>

<!-- IEのバージョン別にhtmlクラス分け -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="jp"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="jp"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="jp"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="jp"> <!--<![endif]--><head>
	<?php include("parts/meta.php"); ?>
	<link rel="index" href="index.php" title="h-oikawa&#039;s Portfolio Site" />
</head>

<body id="top">
<?php include("parts/header.php"); ?>

<!-- パンくずリスト -->
<ul class="breadcrumb">
	<li>Server Root <span class="divider">&gt;</span></li>
	<li><a href="index.php">Home</a> <span class="divider">/</span></li>
	<li class="active">Gallery</li>
</ul>



<!-- ==================== Main Contents ==================== -->
<section id="mainContents">

	<div id="gallery" class="container well">
		<h2 class="hide">Contents</h2>
		<p id="tabLabel">Illustrations</p>

		<!-- ===== タブメニュー ===== --
		<div id="nav-tabs-wrap">-->
			<ul class="nav nav-tabs" id="nav-tabs">
				<li class="active"><a id="tab1" href="#A" data-toggle="tab">Illust</a></li>
				<li><a id="tab2" href="#B" data-toggle="tab">Photo</a></li>
				<li><a id="tab3" href="#C" data-toggle="tab">PageDesign</a></li>
				<li><a id="tab4" href="#D" data-toggle="tab">Program</a></li>
				<li><a id="tab5" href="#E" data-toggle="tab">WebSite</a></li>
			</ul>
		<!--</div>
		<!-- ===== /タブメニュー ===== -->

		<!-- ===== タブコンテンツ ===== -->
		<div class="tabbable">
			<div class="tab-content container-fluid" id="tab-content">

				<!-- Illustrations -->
				<section class="tab-pane well row active" id="A">
					<h3>Illustrations</h3>

					<ul class="thumbnails">
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ai/Munich1972.png"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="パスファインダーの練習としてミュンヘンオリンピックのロゴを再現">
									<img src="gallery/tmb/tab1/Munich1972_tmb.png" alt="Munich 1972 Logo">
								</a>
								<h4>ロゴトレース</h4>
								<p>ミュンヘン五輪のロゴ</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ai/apple.jpg"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="透明なレイヤーで陰影をつけ、<br>背景色で色変更可能なりんごのベクターイラスト">
									<img src="gallery/tmb/tab1/apple_tmb.png" alt="カラーりんご">
								</a>
								<h4>りんご</h4>
								<p>色変更可能</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ai/Cafe-Logo.png"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="架空のカフェのロゴをデザイン">
									<img src="gallery/tmb/tab1/Cafe-Logo_tmb.png" alt="Cafe Logo">
								</a>
								<h4>ロゴデザイン</h4>
								<p>架空のカフェのロゴ</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ai/PrivateCard1.png"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="プライベート用名刺">
									<img src="gallery/tmb/tab1/PrivateCard_tmb.png" alt="プライベート 名刺">
								</a>
								<a href="gallery/Ai/PrivateCard2.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="プライベート用名刺">
								</a>
								<h4>名刺デザイン</h4>
								<p>プライベート用</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ai/fugaku36_misaka_trace.png"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="葛飾北斎：富嶽三十六景 ＜甲州三坂水面＞ Illustrator によるトレース、ベクター画像化">
									<img src="gallery/tmb/tab1/misaka_trace_tmb.jpg" alt="葛飾北斎：富嶽三十六景 ＜甲州三坂水面＞ トレース">
								</a>
								<a href="gallery/Ai/fugaku36_misaka.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="葛飾北斎：富嶽三十六景 ＜甲州三坂水面＞ 元画像">
								</a>
								<h4>画像トレース</h4>
								<p>葛飾北斎：富嶽三十六景<br>＜甲州三坂水面＞</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ai/real-trace.png"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="腕時計を Illustrator のグラデーションメッシュ機能で再現">
									<img src="gallery/tmb/tab1/real-trace_tmb.png" alt="腕時計：リアルトレース">
								</a>
								<a href="gallery/Ai/watch.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab1' 
									data-fresco-caption="腕時計の元画像">
								</a>
								<h4>リアルトレース</h4>
								<p>グラデーションメッシュによる腕時計のトレース</p>
							</div>
						</li>
					</ul>
				</section>
				<!-- /Illustrations -->



				<!-- Photographys -->
				<section class="tab-pane well row" id="B">
					<h3>Photographys</h3>

					<ul class="thumbnails">
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/mirrortxt/mirrortxt_web.jpg"
									class='fresco' 
									data-fresco-group='tab2'
									data-fresco-caption="鏡面反射文字１">
									<img src="gallery/tmb/tab2/mirrortxt_tmb.jpg" alt="装飾テキスト">
								</a>
								<a href="gallery/Ps/mirrortxt/mirrortxt_ps.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab2'
									data-fresco-caption="鏡面反射文字２">
								</a>
								<a href="gallery/Ps/mirrortxt/mirrortxt_shadow.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab2'
									data-fresco-caption="鏡面反射文字３">
								</a>
								<h4>基本：装飾テキスト</h4>
								<p>鏡面反射文字</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/gosei/mooncat.png"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="月と猫を合成、もやを追加。かなりヤッツケ">
									<img src="gallery/tmb/tab2/mooncat_tmb.jpg" alt="写真合成１">
								</a>
								<h4>基本：写真合成１</h4>
								<p>月と猫の画像を合成</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/gosei/queenmarry.jpg"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="元画像１">
									<img src="gallery/tmb/tab2/m_gosei_tmb.jpg" alt="写真合成２">
								</a>
								<a href="gallery/Ps/gosei/toyosu.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="元画像２">
								</a>
								<a href="gallery/Ps/gosei/toyosu_gosei.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="港の画像を海ごと入れ替え">
								</a>
								<h4>基本：写真合成２</h4>
								<p>港の画像合成</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/filter/1482.jpg"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="元画像">
									<img src="gallery/tmb/tab2/filter_tmb.jpg" alt="Photoshop フィルター">
								</a>
								<a href="gallery/Ps/filter/1482.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="セピア調">
								</a>
								<a href="gallery/Ps/filter/2144.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="元画像">
								</a>
								<a href="gallery/Ps/filter/2144.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="スチールブルー">
								</a>
								<h4>フィルター</h4>
								<p>Photoshopのフィルターや補正機能の試用</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/texture/flame.png"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="テクスチャ：炎">
									<img src="gallery/tmb/tab2/texture_tmb.jpg" alt="テクスチャ">
								</a>
								<a href="gallery/Ps/texture/hyogara.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="テクスチャ：豹柄">
								</a>
								<h4>テクスチャ</h4>
								<p>Photoshopでのテクスチャ作成</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/Windows-Shortcut/Simple_Gray.png"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="下地">
									<img src="gallery/tmb/tab2/shortcut_tmb.jpg" alt="ショートカット壁紙">
								</a>
								<a href="gallery/Ps/Windows-Shortcut/Windows-Shortcut-list.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="ベクター画像化した Windows ショートカット一覧表<br>(元素材：http://dreamnoah.com/download.html)">
								</a>
								<a href="gallery/Ps/Windows-Shortcut/Windows-Shortcut_blue.jpg" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="合成＆色調整">
								</a>
								<h4>Wallpaper</h4>
								<p>Windowsショートカット壁紙</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Ps/bg/bg_smoke.png"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="スモーク">
									<img src="gallery/tmb/tab2/wallpaper_tmb.jpg" alt="壁紙：その他">
								</a>
								<a href="gallery/Ps/bg/night_sky.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab2' 
									data-fresco-caption="星空">
								</a>
								<h4>Wallpaper</h4>
								<p>壁紙：その他</p>
							</div>
						</li>
					</ul>
				</section>
				<!-- /Photographys -->



				<!-- Page Design -->
				<section class="tab-pane well row" id="C">
					<h3>Page Design</h3>

					<ul class="thumbnails">
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Design/WF/Top.png"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="ワイヤーフレーム１：トップ　適当">
									<img src="gallery/tmb/tab3/WF_tmb.png" alt="ワイヤーフレーム">
								</a>
								<a href="gallery/Design/WF/Works.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="ワイヤーフレーム２：ギャラリー">
								</a>
								<a href="gallery/Design/WF/Sitemap.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="ワイヤーフレーム３：サイトマップ">
								</a>
								<h4>ワイヤーフレーム</h4>
								<p>このサイトの初期構想</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Design/cs_uidesign.png"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="WEBクリエイタースクールのサイトトップ">
									<img src="gallery/tmb/tab3/school_tmb.jpg" alt="デザインカンプ１">
								</a>
								<h4>デザインカンプ１</h4>
								<p>テーマ：WEBスクールのサイトトップ</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Design/codomo.jpg"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="ゴールデンウィーク中の製作課題、行楽施設のページデザイン">
									<img src="gallery/tmb/tab3/codomo_tmb.jpg" alt="デザインカンプ２">
								</a>
								<h4>デザインカンプ２</h4>
								<p>テーマ：長期休暇の行楽施設</p>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a href="gallery/Design/BBQdesign3d.png"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="デザイン制作課題：バーベキューサイト<br>CSS3のtransform機能を使った立体感のあるページを想像">
									<img src="gallery/tmb/tab3/BBQ_tmb.png" alt="デザインカンプ３">
								</a>
								<a href="gallery/Design/BBQdesign2d.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="コンテンツにフォーカスが移ると倒れこみの3D効果解除">
								</a>
								<a href="gallery/Design/BBQdesign.png" style="display:none"
									class='fresco' 
									data-fresco-group='tab3'
									data-fresco-caption="">
								</a>
								<h4>デザインカンプ３</h4>
								<p>テーマ：バーベキューのサイト</p>
							</div>
						</li>
					</ul>
				</section>
				<!-- /Page Design -->



				<!-- Script Programs -->
				<section class="tab-pane well row" id="D">
					<h3>Script Programs</h3>

					<section class="row well well-small">
						<h4>タイマー機能付き Flash 時計</h4>

						<div class="span5 frame frame-insert">
							<a class="openmodalbox flashClockModal" href="javascript:void(0);">
								<img src="gallery/tmb/tab4/Fl_Clock_tmb.jpg" class="img-polaroid">
							</a>
						</div>

						<div class="span5">
							<ul>
								<li>Flash &amp; Action Script で作成したタイムゾーン切り替え対応WEB時計</li>
								<li>素材は Illustrator で腕時計をトレースしたものを流用</li>
								<li>モード変更でアラームモード、タイマーモードに切り替え</li>
								<li>下のテキスト欄にアクセス可能な音源へのURLを入力することでアラーム音の変更が可能</li>	
							</ul>
						</div>

						<!-- /ModalBox Flash -->
						<div id="flClockModalContents" style="display:none;">
							<iframe id="flashClock" src="gallery/Flash/Flash_Clock_ver6.html" style="width:550px;height:550px;"> この部分はインラインフレームを使用しています。</iframe>
							<div class="well" style="margin: 10px auto 0">
								<p>(テスト用音源)  ※ テキストエリアにコピー＆ペースト<br>
								http://classical-sound.up.seesaa.net/image/J.S.Bach-BWV147.mp3</p>
							</div>
						</div>
						<!-- ModalBox Flash -->

					</section>

					<section class="row well" id="dir2tree">
						<h4>Dir2tree VBS</h4>
						<ul>
							<li>2011年頃に作成したディレクトリ構造をツリーリスト化し、HTMLで出力するVBScript。</li>
							<li>リスト化したいフォルダやドライブをダイアログで指定するかvbsファイルにD&amp;D。</li>
							<li>出力先はvbsファイルと同じフォルダ。</li>
						</ul>
						<a class="btn btn-warning pull-left" href="gallery/dir2tree/wordpress.html"><i class="icon-hand-right"></i> Sample</a></p>
						<a class="btn btn-success pull-left" href="gallery/dir2tree/Dir2tree_ver2_rev6.zip"><i class="icon-download-alt"></i> Download</a></p>
					</section>

				</section>
				<!-- /Script Programs -->



				<!-- WebSites -->
				<section class="tab-pane well row" id="E">
					<h3>WebSite Coding</h3>

					<section class="row well well-small">
						<div class="span5">
							<h4>レガシー観光サイト</h4>
							<ul>
								<li>練習サイトその１</li>
								<li>トップと観光スポットのページのみ</li>
								<li>メニューバー等のスタイルは極力CSSの設定のみで実現</li>
								<li>iframeで外部htmlファイルとGoogleマップを読み込み</li>
								<li>jQueryプラグインの初使用</li>
								<!--
								<li>使用したプラグイン： <a href="http://fancyapps.com/fancybox/" target="_blank">FancyBox2</a> , loopslider.js</li>
								-->
							</ul>
						</div>
						<div class="span5 frame frame-insert">
							<a href="../Bali/" target="_blank">
								<img src="gallery/tmb/tab5/Bali_tmb.jpg" class="img-polaroid">
							</a>
						</div>
					</section>

					<section class="row well well-small">
						<div class="span5">
							<h4>TokyoBridge PhotoGallery</h4>
							<ul>
								<li>練習サイトその２</li>
								<li>写真を並べたギャラリーサイト</li>
								<li>DOM書き換えや複数のプラグインの連携など、jQueryのスクリプト記述・改変に挑戦</li>
								<li>PHPで指定フォルダ内の画像を読み込み、自動でHTMLを記述</li>
								<li>サイトタイトルにSVGとWEBフォントを使用</li>
								<!--
								<li>使用したプラグイン： <a href="http://2inc.org/blog/2012/02/14/1233/" target="_blank">jquery.SmoothScroll.js</a> ,
														 <a href="http://jqueryui.com/datepicker/" target="_blank">jquery.ui.datepicker</a> ,
														 <a href="http://www.marcofolio.net/webdesign/creating_a_polaroid_photo_viewer_with_css3_and_jquery.html" target="_blank">polaroid_photo_viewer.js</a> ,
														 <a href="http://tutorialzine.com/2010/06/apple-like-retina-effect-jquery-css/" target="_blank">Apple-like Retina Effect</a> ,
								</li>
								-->
							</ul>
						</div>
						<div class="span5 frame frame-insert">
								<img src="gallery/tmb/tab5/PhotoGallery_tmb.jpg" class="img-polaroid">
						</div>
					</section>

					<section class="row well well-small">
						<div class="span5">
							<h4>jQuery Experiment</h4>
							<ul>
								<li>練習サイトその３</li>
								<li>Ajax の導入・運用練習として作成</li>
								<li>ヘッダやナビゲーションは固定、メインコンテンツの内容をjQuery Ajax機能で書き換え</li>
								<li>アイコンに <a href="http://fortawesome.github.io/Font-Awesome/" target="_blank">Font Awesome</a> を使用</li>
								<li>それぞれのjQueryプラグインのコンテンツはほぼデモページそのまま</li>
							</ul>
						</div>
						<div class="span5 frame frame-insert">
							<a href="../jQuery_Experiment/" target="_blank">
								<img src="gallery/tmb/tab5/jQuery_tmb.jpg">
							</a>
						</div>
					</section>

				</section>
				<!-- /WebSites -->

			</div> <!-- /.tab-content -->
		</div>
		<!-- ===== /タブコンテンツ ===== -->

	</div> <!--/#gallery -->

</section>
<!-- ==================== /Main Contents ==================== -->




<?php include("parts/footer.php"); ?>

</body>

<?php include("parts/script.php"); ?>

<!-- Fresco -->
<script type="text/javascript" src="js/fresco/fresco.js"></script>
<link rel="stylesheet" type="text/css" href="css/fresco/fresco.css" />

</html>
