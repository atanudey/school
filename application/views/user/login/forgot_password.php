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
		<h1>Forgot Password</h1>
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
					<p>Thank you. We have sent you an email with further instructions on how to reset your password.</p>
				</div>
			<?php } else { ?>
				<?= form_open() ?>
					<div class="fldRow">					
						<input type="text" id="email" name="email" placeholder="Email Address" title="Enter your email" required='required' pattern='[^@]+@[^@]+\.[a-zA-Z]{2,6}' value="">					
					</div>
					<div class="fldRow">
						<button class="signInBtn">RESET PASSWORD</button>
					</div>
				</form>					
			<?php } ?>
		</div>
	</div>
</div>