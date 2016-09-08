<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--body panel starts -->
<div class="bodyPanel">
	<div class="loginPanelOuter">
		<h1>Login</h1>
		<div class="loginPanelInner">
			<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
			<?php endif; ?>
			<?= form_open() ?>
				<div class="fldRow selectbox">
					<div class="select-style">
						<select id="user_type_id" name="user_type_id" required='required'>
							<option value="">User Type</option>
							<?php 
							foreach($all_user_type as $user_type)
							{
								//$selected = "";	
							?>	
								<option value="<?php echo $user_type['ID'];?>" <?php echo set_select('user_type_id',  $user_type['ID']); ?>><?php echo $user_type['Type_Name'];?></option>
							<?php
							} 
							?>
						</select>
					</div>				
				</div>
				<div class="fldRow">					
					<input type="text" id="username" name="username" placeholder="Username" title="Enter user name" required='required' value="<?php echo set_value("username");?>"> 
				</div>
				<div class="fldRow">					
					<input type="password" id="password" name="password" placeholder="Password" title="Enter the password" required='required' value="">					
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
