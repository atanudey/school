<?php if (!empty($error) || validation_errors()) { ?>
<script language="javascript">
	$(document).ready(function() {
		$('html, body').animate({
			scrollTop: $("#alert").offset().top
		}, 2000);
	});
</script>
<?php } ?>
<!--body panel starts -->
<div class="bodyPanel">
	<div class="loginPanelOuter">
		<h1>Reset Password</h1>
		<div id="login" class="loginPanelInner">
			<?php if (validation_errors()) { ?>
					<div id="alert" class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
			<?php } else if (isset($error)) { ?>			
					<div id="alert" class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
			<?php } ?>
			<?php if($success){ ?>
				<div class="fldRow">
					<p>You have successfully reset your password.</p>
        			<p>Click the button to login.</p>	
				</div>
				<div class="btmBtns">
					<div class="btmBtnsInner">			
						<a href="<?php echo base_url('login'); ?>" class="signUpBtn">Login</a>
					</div>				
				</div>
			<?php } else { ?>
				<?= form_open() ?>
					<div class="fldRow">					
						<input type="password" id="password" name="password" placeholder="* Enter a password" value="<?php echo set_value("password");?>" required='required'>									
					</div>
					<div class="fldRow">					
						<input type="password" id="password_conf" name="password_conf" placeholder="* Confirm your password" value="<?php echo set_value("password_confirm");?>" required='required'>									
					</div>
					<div class="fldRow">
						<button class="signInBtn">RESET</button>
					</div>
				</form>					
			<?php } ?>
		</div>
	</div>
</div>