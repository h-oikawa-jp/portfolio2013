<?php error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED); ?>

<section id="contact" class="resizable">
<h1>Contact Form</h1>

	<form id="contactForm" class="container-fluid well" action="modal/mail.php" method="post">
	<!--<fieldset>-->
		<legend>お問い合わせメール</legend>
		
		<div class="row centering">
			<div align="left" class="controls span5">
			
				<div class="control-group success">
					<div class="controls">
						<input type="text" class="input" name="名前" value="<?= $_POST['名前'] ?>" maxlength="255" placeholder="氏名" required autofocus>
						<span class="help-inline">* 必須</span>
					</div>
				</div>

				<div class="control-group">
					<!--<label class="control-label" for="性別">性別</label>-->
					<div class="controls form-inline">
						<label class="radio"><input type="radio" name="性別" value="男性" <?php if ($_POST['性別']=='男性'){echo 'checked';} ?>>男性</label>
						<label class="radio"><input type="radio" name="性別" value="女性" <?php if ($_POST['性別']=='女性'){echo 'checked';} ?>>女性</label>
						<label class="radio"><input type="radio" name="性別" value="その他" <?php if ($_POST['性別']=='その他'){echo 'checked';} ?>>その他</label>
					</div>
				</div>
				
				<div class="control-group">
					<!--<label class="control-label" for="age">年齢</label>-->
					<div class="controls">
						<select class="input-medium" name="年齢" id="age">
							<option selected disabled>年齢</option>
							<option>10才未満</option>
							<option>10代</option>
							<option>20代</option>
							<option>30代</option>
							<option>40代</option>
							<option>50代</option>
							<option>60代</option>
							<option>70代</option>
							<option>80代</option>
							<option>90才以上</option>
							<option <?php if($_POST['年齢']=='不詳'){echo'selected';}?>>不詳</option>
						</select>
					</div>
				</div>
				
				<div class="control-group warning">
					<div class="controls">
						<input type="url" class="input" name="WEBサイト" value="<?= $_POST['WEBサイト'] ?>" maxlength="255" placeholder="WEBサイト URL">
					</div>
				</div>
				
				<div class="control-group warning">
					<div class="controls">
						<input type="text" class="input" name="etc" value="<?= $_POST['etc'] ?>" maxlength="255" placeholder="その他、SNS等">
					</div>
				</div>
				
			</div>
			
			<div align="left" class="controls span5">
			
				<div class="control-group success">
					<div class="controls">
						<input type="email" class="input-xlarge" name="Email" value="<?= $_POST['Email'] ?>" maxlength="255" placeholder="メールアドレス" required>
						<span class="help-inline">* 必須</span>
					</div>
				</div>
				
				<div class="control-group info">
					<div class="controls">
						<input type="text" class="input-large" name="件名" value="<?= $_POST['件名'] ?>" maxlength="255" placeholder="件名">
						<textarea class="input-xlarge" name="本文" rows="6" placeholder="本文" required><?php echo $_POST['本文'] ?></textarea>
						<span class="help-inline">* 必須</span>
					</div>
				</div>
				
				<!--<div class="controls">
					<label class="control-label">添付ファイル
						<input class="input-file" name="FileInput" type="file" size="200"></label>
				</div>-->
				
			</div>
		</div>

		<div align="center" class="form-actions well-small centering">
		    <input class="openmodalbox btn" type="submit" value="確認" />
		    <input class="btn btn-primary" type="reset" value="リセット" />
		</div>
	<!--</fieldset>-->
	</form>

</section>
