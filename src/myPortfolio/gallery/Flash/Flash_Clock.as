package 
{
	import flash.display.*;
	import flash.events.*;
	import flash.text.*;
	import flash.media.*;
	import flash.net.URLRequest;
	import fl.controls.ComboBox;
	import flash.utils.Timer;
	import fl.motion.MotionEvent;

	public class Flash_Clock extends MovieClip
	{
		public function Flash_Clock()
		{
			stop();

			var now:Date,tmpDate,ans,alFrCnt:uint = 0;
			// 月表記配列
			var monthAry = new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
			// 週表記配列
			var weekAry = new Array("SUN","MON","TUE","WED","THU","FRI","SAT");
			// 時差変数、デフォルトは東京時差(+9h)
			var timeDifference:Number = 9 * 60 * 60 * 1000;
			


			// コンボボックスセット
			var modeResetFlag:Boolean = true;
			setupModeCb();
			setupTzCb();


			// ENTER_FRAME(繰り返し)処理セット
			addEventListener(Event.ENTER_FRAME,constantProcess);

			// =============== メイン繰り返し処理 ===============
			function constantProcess(evt:Event):void
			{
				// 現在時刻取得
				now = new Date();
				// 変数tmpDateに時差計算後の日付格納
				tmpDate = new Date(now.valueOf() + timeDifference);

				// カレントフレームでモードスイッチ
				switch (currentFrame)
				{
					case 1 :
						clockMode(evt);
						break;
					case 2 :
						AlarmMode(evt);
						break;
					case 3 :
						TimerMode(evt);
						break;
					default :
						trace("Mode Error");
						break;
				}

				// 時間帯で背景色変化
				back.gotoAndStop(uint((tmpDate.hoursUTC*60+tmpDate.minutesUTC)/10)+1);
			}
			// =============== メイン繰り返し処理ここまで ===============


			// =============== モード別繰り返し処理 ===============
			{
				// ----- 時計モード -----
				function clockMode(evt:Event):void
				{
					// モード別初期設定（モード変更後１回だけ実行）
					if (modeResetFlag)
					{
						modeResetFlag = false;
					}

					// デジタル時計
					digitalClock();
					//週
					week_box_mc.inBox_txt.text = weekAry[tmpDate.dayUTC];
					//土日色変更(フレーム移動)
					week_box_mc.gotoAndStop(tmpDate.dayUTC+1);

					// アナログ時計に反映;
					analogClock(tmpDate.secondsUTC, tmpDate.minutesUTC, tmpDate.hoursUTC);
				}
				// 現在時刻からデジタル日時表示 (※曜日以外)
				function digitalClock():void
				{
					//年
					year_box_mc.inBox_txt.text = tmpDate.fullYearUTC;
					//月
					month_box_mc.inBox_txt.text = monthAry[tmpDate.monthUTC];

					//桁揃え関数の戻り値をテキストに入力;
					//日
					day_box_mc.inBox_txt.text = keta(tmpDate.dateUTC);
					//時
					hour_box_mc.inBox_txt.text = keta(tmpDate.hoursUTC);
					//分
					min_box_mc.inBox_txt.text = keta(tmpDate.minutesUTC);
					//秒
					sec_box_mc.inBox_txt.text = keta(tmpDate.secondsUTC);
				}
				// アナログ時計反映メソッド
				function analogClock(Second:Number, Minute:Number, Hour:Number):void
				{
					second_mc.rotation = Second * (360 / 60);
					minute_mc.rotation = Minute * (360 / 60);
					hour_mc.rotation = Hour * (360 / 12) + Minute * (30 / 60);
				}
				// ----- 時計モードここまで -----




				// ----- アラームモード -----
				function AlarmMode(evt:Event):void
				{
					//モード別初期設定
					if (modeResetFlag)
					{
						modeResetFlag = false;

						//ゼンマイボタンセット
						zenmai_btnA.addEventListener(MouseEvent.CLICK,zenmaiClickA);
						function zenmaiClickA(evt:MouseEvent):void
						{
							// 現在時刻取得
							digitalClock();
							min_box_mc.inBox_txt.text = keta(int(min_box_mc.inBox_txt.text)+1);
						}

						//OnOffボタンイベントセット
						box_btnA.addEventListener(MouseEvent.CLICK,OnOffToggle);
					}

					// アナログ時計
					analogClock(tmpDate.secondsUTC, tmpDate.minutesUTC, tmpDate.hoursUTC);


					//アラーム判定
					//onoff_boxがOn(2フレーム)の時、判定実行
					if (onoff_box_mc.currentFrame == 2)
					{
						//時刻照合結果の戻り値が真ならカウント+1
						if (alarmJudge(0))
						{
							alFrCnt++;
							//fps値分連続で来るtrue判定の一回目だけ選別
							if (alFrCnt==1)
							{
								channelPlay();
								createMsgBox(28, 0xFF0000, "\n\n\n指定された時間になりました\r\r(この画面はクリックで閉じます)", 40, 100, 460, 300);
							}
						}
						else
						{
							//true判定カウントリセット
							alFrCnt = 0;
						}
					}
					//アラーム時刻照合関数
					function alarmJudge(v):Boolean
					{
						var ans = v;

						//条件を全てクリアでans=1
						if (sec_box_mc.inBox_txt.text == tmpDate.secondsUTC)
						{
							if (min_box_mc.inBox_txt.text == tmpDate.minutesUTC)
							{
								if (hour_box_mc.inBox_txt.text == tmpDate.hoursUTC)
								{
									if (day_box_mc.inBox_txt.text == tmpDate.dateUTC)
									{
										if (month_box_mc.inBox_txt.text == tmpDate.monthUTC + 1 || month_box_mc.inBox_txt.text == monthAry[tmpDate.monthUTC])
										{
											if (year_box_mc.inBox_txt.text == tmpDate.fullYearUTC)
											{
												ans = 1;
											}
										}
									}
								}
							}
						}
						return ans;
					}

				}
				// ----- アラームモードここまで -----


				// ----- タイマーモード -----
				var timerCount:uint = 0;
				var tmpTimer:Timer = new Timer(1000,timerCount);

				function TimerMode(evt:Event):void
				{
					//モード別初期設定
					if (modeResetFlag)
					{
						modeResetFlag = false;

						day_box_mc.inBox_txt.text = 0;
						timerCount = 0;
						//tmpTimer:Timer = new Timer(1000,timerCount);

						//ゼンマイボタンセット (タイマーを3分に設定)
						zenmai_btnB.addEventListener(MouseEvent.CLICK,zenmaiClickB);
						function zenmaiClickB(evt:MouseEvent):void
						{
							day_box_mc.inBox_txt.text = 0;
							hour_box_mc.inBox_txt.text = "00";
							min_box_mc.inBox_txt.text = "03";
							sec_box_mc.inBox_txt.text = "00";
							analogClock(sec_box_mc.inBox_txt.text, min_box_mc.inBox_txt.text, hour_box_mc.inBox_txt.text);
						}

						//OnOffボタンイベントセット
						box_btnB.addEventListener(MouseEvent.CLICK,timerOnOff);
					}
				}
				//タイマー機能のOnOffメソッド
				function timerOnOff(evt:Event):void
				{
					OnOffToggle(evt);

					//On
					if (onoff_box_mc.currentFrame == 2)
					{
						timerCount = int(sec_box_mc.inBox_txt.text) + 60 * int(min_box_mc.inBox_txt.text) + 60 * 60 * int(hour_box_mc.inBox_txt.text) + 24 * 60 * 60 * int(day_box_mc.inBox_txt.text);
						if (timerCount<1)
						{
							timerCount = 1;
						}

						tmpTimer.repeatCount = timerCount;
						tmpTimer.start();
						tmpTimer.addEventListener(TimerEvent.TIMER, timerHandler);
						tmpTimer.addEventListener(TimerEvent.TIMER_COMPLETE, timerComplete);
					}
					//Off
					if (onoff_box_mc.currentFrame == 1)
					{
						tmpTimer.reset();
						tmpTimer.removeEventListener(TimerEvent.TIMER, timerHandler);
						tmpTimer.removeEventListener(TimerEvent.TIMER_COMPLETE, timerComplete);
					}
				}
				//タイマー：一秒毎の処理
				function timerHandler(evt:TimerEvent)
				{
					//オーバーフロー対策
					if (timerCount>864000000)
					{
						timerCount = 864000000;
					}

					//1秒減算
					timerCount--;

					//表示反映
					day_box_mc.inBox_txt.text = int(timerCount/(24*60*60));
					sec_box_mc.inBox_txt.text = keta(timerCount % 60);
					min_box_mc.inBox_txt.text = keta(int(timerCount/60) % 60);
					hour_box_mc.inBox_txt.text = keta(int((timerCount%(24*60*60)) / (60*60)));
					analogClock(sec_box_mc.inBox_txt.text, min_box_mc.inBox_txt.text, hour_box_mc.inBox_txt.text);
				}
				//タイマー：完了時の処理
				function timerComplete(evt:TimerEvent)
				{
					channelPlay();
					createMsgBox(28, 0xFF0000, "\n\n\n指定された時間が経過しました\r\r(この画面はクリックで閉じます)", 40, 100, 460, 300);

					timerOnOff(evt);
				}
				// ----- タイマーモードここまで -----
			};
			// =============== モード別繰り返し処理ここまで ===============


			// OnOffボタントグルメソッド
			function OnOffToggle(evt:Event):void
			{
				// フレーム1と2トグル
				onoff_box_mc.gotoAndStop(-(onoff_box_mc.currentFrame-1)+2);
			}


			// モード変更直前の初期化処理;
			function modeInit(Prev, Next, evt):void
			{
				if (Prev==2 && onoff_box_mc.currentFrame==2)
				{
					OnOffToggle(evt);
				}
				if (Prev==3 && onoff_box_mc.currentFrame==2)
				{
					timerOnOff(evt);
				}
			}



			// =============== コンボボックス設定 ===============
			{
				// ----- モードセレクトCB -----
				function setupModeCb():void
				{
					mode_cb.prompt = "モード変更";
					mode_cb.addItem( { label: "時計", data:1 } );
					mode_cb.addItem( { label: "アラーム", data:2 } );
					mode_cb.addItem( { label: "タイマー", data:3 } );
					mode_cb.addEventListener(Event.CHANGE, modeSelected);
				}
				function modeSelected(evt:Event):void
				{
					modeResetFlag = true;
					// モード変更前処理
					modeInit(currentFrame, mode_cb.selectedItem.data, evt);
					// モード変更(フレーム移動)
					gotoAndStop(mode_cb.selectedItem.data);
				}
				// ----- モードセレクトCBここまで -----

				// ----- タイムゾーンCB -----
				function setupTzCb():void
				{
					tz_cb.prompt = "Select TimeZone";
					tz_cb.addItem( { label: "UTC+14 (TONGA)", data:+(14*60) } );
					tz_cb.addItem( { label: "UTC+13", data:+(13*60) } );
					tz_cb.addItem( { label: "UTC+12:45", data:+(12*60+45) } );
					tz_cb.addItem( { label: "UTC+12 (NEW ZEALAND)", data:+(12*60) } );
					tz_cb.addItem( { label: "UTC+11:30", data:+(11*60+30) } );
					tz_cb.addItem( { label: "UTC+11", data:+(11*60) } );
					tz_cb.addItem( { label: "UTC+10:30", data:+(10*60+30) } );
					tz_cb.addItem( { label: "UTC+10 (SYDNEY)", data:+(10*60) } );
					tz_cb.addItem( { label: "UTC+9:30", data:+(9*60+30) } );
					tz_cb.addItem( { label: "UTC+9 (TOKYO)", data:+(9*60) } );
					tz_cb.addItem( { label: "UTC+8:45", data:+(8*60+45) } );
					tz_cb.addItem( { label: "UTC+8", data:+(8*60) } );
					tz_cb.addItem( { label: "UTC+7 (BANGKOK)", data:+(7*60) } );
					tz_cb.addItem( { label: "UTC+6:30", data:+(6*60+30) } );
					tz_cb.addItem( { label: "UTC+6", data:+(6*60) } );
					tz_cb.addItem( { label: "UTC+5:45", data:+(5*60+45) } );
					tz_cb.addItem( { label: "UTC+5:30 (NEW DELHI)", data:+(5*60+30) } );
					tz_cb.addItem( { label: "UTC+5", data:+(5*60) } );
					tz_cb.addItem( { label: "UTC+4:30", data:+(4*60+30) } );
					tz_cb.addItem( { label: "UTC+4 (ARAB)", data:+(4*60) } );
					tz_cb.addItem( { label: "UTC+3:30", data:+(3*60+30) } );
					tz_cb.addItem( { label: "UTC+3 (MOSCOW)", data:+(3*60) } );
					tz_cb.addItem( { label: "UTC+2", data:+(2*60) } );
					tz_cb.addItem( { label: "UTC+1", data:+(1*60) } );
					tz_cb.addItem( { label: "UTC (LONDON)", data:0 } );
					tz_cb.addItem( { label: "UTC-1", data:-(1*60) } );
					tz_cb.addItem( { label: "UTC-2", data:-(2*60) } );
					tz_cb.addItem( { label: "UTC-3 (RIO DE JANEIRO)", data:-(3*60) } );
					tz_cb.addItem( { label: "UTC-3:30", data:-(3*60+30) } );
					tz_cb.addItem( { label: "UTC-4", data:-(4*60) } );
					tz_cb.addItem( { label: "UTC-4:30", data:-(4*60+30) } );
					tz_cb.addItem( { label: "UTC-5 (NEW YORK)", data:-(5*60) } );
					tz_cb.addItem( { label: "UTC-6", data:-(6*60) } );
					tz_cb.addItem( { label: "UTC-7", data:-(7*60) } );
					tz_cb.addItem( { label: "UTC-8 (LOS ANGELES)", data:-(8*60) } );
					tz_cb.addItem( { label: "UTC-9", data:-(9*60) } );
					tz_cb.addItem( { label: "UTC-9:30", data:-(9*60+30) } );
					tz_cb.addItem( { label: "UTC-10 (HONOLULU)", data:-(10*60) } );
					tz_cb.addItem( { label: "UTC-11", data:-(11*60) } );
					tz_cb.addItem( { label: "UTC-12 (BAKER)", data:-(12*60) } );
					tz_cb.addEventListener(Event.CHANGE, tmzSelected);
				}
				function tmzSelected(evt:Event):void
				{
					// 指定されたタイムゾーンから時差計算
					timeDifference = tz_cb.selectedItem.data * 60 * 1000;
				}
				// ----- タイムゾーンCBここまで -----
			};
			// =============== コンボボックス設定ここまで ===============
			
			
			

			// =============== アラームサウンドの設定ここまで ===============
			// サウンドソースURL
			var soundReq:URLRequest = new URLRequest("defaultChime.mp3");
			// サウンドオブジェクト
			var Chime:Sound = new Sound(soundReq);
			// 再生チャンネル
			var channel:SoundChannel;

			// インプットボックスにCHANGEイベントリスナー設置
			soundRequest.addEventListener(Event.CHANGE, function() {
				// URLを参照してロード用サウンドオブジェクト生成
				soundReq.url = soundRequest.text;
				var tmpSnd:Sound = new Sound();	
				// ロードが完了したらサウンドオブジェクトをChimeに適用
				tmpSnd.addEventListener(Event.COMPLETE, function() {
					Chime = tmpSnd;
				});
				// ロード開始
				tmpSnd.load(soundReq);
			});

			// サウンドチャンネル再生メソッド
			function channelPlay()
			{
				if (channel != null) {
					channel.stop();
				}
				channel = Chime.play();
			}
			
			// 再生ボタン
			sndPlay_btn.addEventListener(MouseEvent.CLICK, channelPlay);
			// 停止ボタン
			sndStop_btn.addEventListener(MouseEvent.CLICK, function() {
				channel.stop();
			});
			// =============== アラームサウンドの設定ここまで ===============




			// =============== 時計の針のドラッグ操作処理を設定 ===============
			{
				var rx0,ry0,td0,tr0,rx1,ry1;

				// 時計の針にマウスダウンイベントセット
				second_mc.addEventListener(MouseEvent.MOUSE_DOWN,mouseDownDD);
				minute_mc.addEventListener(MouseEvent.MOUSE_DOWN,mouseDownDD);
				hour_mc.addEventListener(MouseEvent.MOUSE_DOWN,mouseDownDD);
				// マウスダウンイベント;
				function mouseDownDD(evt:MouseEvent)
				{
					// ターゲットオブジェクトの基準点からのマウス座標を取得
					rx0 = stage.mouseX - evt.currentTarget.x;
					ry0 = stage.mouseY - evt.currentTarget.y;
					// 基準点とマウスとの距離を算出
					td0 = Math.sqrt(rx0*rx0+ry0*ry0);
					// マウスによる回転の差分を算出
					tr0 = (Math.PI/2+Math.atan2(ry0, rx0))*180/Math.PI-evt.currentTarget.rotation;

					// onDragEnterFrameをセット
					evt.currentTarget.addEventListener(Event.ENTER_FRAME,onDragEnterFrame);
				}

				// 針をドラッグ中の繰り返し処理;
				function onDragEnterFrame(evt:Event)
				{
					// 現在の基準点からのマウス座標を取得
					rx1 = stage.mouseX - evt.target.x;
					ry1 = stage.mouseY - evt.target.y;
					// このMCの回転を計算
					evt.target.rotation = (Math.PI/2+Math.atan2(ry1, rx1))*180/Math.PI-tr0;

					// デジタル表記に反映
					HandToText(evt);
				}

				// 針の角度をデジタル表記に反映するメソッド
				function HandToText(evt)
				{
					// イベントターゲットの角度を取得(-180～180度＞0～360度)
					var fixedRtn = (evt.target.rotation < 0)? int(evt.target.rotation)+360:int(evt.target.rotation);

					// 角度をデジタル表記のテキストに反映
					switch (evt.target.name)
					{
						case "second_mc" :
							sec_box_mc.inBox_txt.text = keta(uint(fixedRtn/360 * 60));
							break;
						case "minute_mc" :
							min_box_mc.inBox_txt.text = keta(uint(fixedRtn/360 * 60));
							break;
						case "hour_mc" :
							hour_box_mc.inBox_txt.text = keta(uint(fixedRtn/360 * 12));
							break;
					}
				}

				// マウスアップ時のイベント除去処理を全オブジェクトに設定
				addEventListener(MouseEvent.MOUSE_UP,mouseUpDD);
				function mouseUpDD(evt:MouseEvent)
				{
					// onEnterFrame を削除
					second_mc.removeEventListener(Event.ENTER_FRAME,onDragEnterFrame);
					minute_mc.removeEventListener(Event.ENTER_FRAME,onDragEnterFrame);
					hour_mc.removeEventListener(Event.ENTER_FRAME,onDragEnterFrame);

					// 針の再調整
					analogClock(sec_box_mc.inBox_txt.text, min_box_mc.inBox_txt.text, hour_box_mc.inBox_txt.text);
				}
			};
			// =============== 時計の針ドラッグ操作設定ここまで ===============



			// =============== その他サブ関数、メソッド ===============
			{
				// 桁揃え関数
				function keta(v)
				{
					var ans = v;

					// 一桁なら二桁目に"0"追加
					if (v < 10)
					{
						ans = "0" + v;
					}
					return ans;
				}


				// メッセージボックス生成メソッド;
				function createMsgBox(fontsize:Number, fontcolor:String, txt:String, x:Number, y:Number, width:Number, height:Number)
				{
					// 文字スタイル指定
					var txtFormat:TextFormat = new TextFormat();
					txtFormat.size = fontsize;
					txtFormat.color = fontcolor;
					txtFormat.align = TextFormatAlign.CENTER;

					var msg:TextField = createTextField(x,y,width,height);
					// テキストフィールドのプロパティ
					msg.wordWrap = true;
					msg.type = TextFieldType.INPUT;
					msg.selectable = false;

					msg.background = true;
					msg.backgroundColor = 0xFFFFFF;
					msg.border = true;
					msg.borderColor = 0x000000;

					// テキストフォーマットを適用して文章インプット
					msg.defaultTextFormat = txtFormat;
					msg.text = txt;

					// クリックイベントセット
					msg.addEventListener(MouseEvent.CLICK, removeEvtObject);
				}
				// テキストフィールド生成関数
				function createTextField(x:Number, y:Number, width:Number, height:Number):TextField
				{
					var result:TextField = new TextField();
					result.x = x;
					result.y = y;
					result.width = width;
					result.height = height;

					addChild(result);
					return result;
				}

				// メッセージオブジェクト消去メソッド
				function removeEvtObject(evt:Event)
				{
					removeChild(DisplayObject(evt.target));
					channel.stop();
				}
			};
			// =============== サブ関数、メソッドここまで ===============


		}
		//function Flash_Clock(); End
	}
	//class Flash_Clock; END
}
//End