<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--body panel starts -->
<div class="bodyPanel">
	<div class="loginPanelOuter">
		<h1>Login</h1>
		<div class="loginPanelInner">
			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
			<?= form_open() ?>
				<div class="fldRow selectbox">
					<div class="select-style">
						<select id="user_type_id" name="user_type_id">
							<option value="">User Type</option>
							<?php 
							foreach($all_user_type as $user_type)
							{
								$selected = "";							
								echo '<option value="'.$user_type['ID'].'" $"."selected>'.$user_type['Type_Name'].'</option>';
							} 
							?>
						</select>
					</div>				
				</div>
				<div class="fldRow">					
					<input type="text" id="username" name="username" placeholder="Username">
				</div>
				<div class="fldRow">					
					<input type="password" id="password" name="password" placeholder="Password">
				</div>
				<div class="fldRow">
					<p><a href="#">Forgot  your password?</a>  |  <a href="#">Reset Password</a></p>
				</div>
				<div class="fldRow">
					<button class="signInBtn">SIGN IN</button>
				</div>
				<div class="fldRow">
					<p>You can reach us at : <a href="mailto:info@krpsolutions.co.in">info@krpsolutions.co.in</a></p>
				</div>
				<div class="btmBtns">
					<div class="btmBtnsInner">
						<a href="<?= base_url('register') ?>" class="signUpBtn">SIGN UP</a>
						<a href="#" class="updateProfileBtn">UPDATE PROFILE</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--body panel ends--> 
