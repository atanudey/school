<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
		<h1>Sign Up</h1>
		<div class="loginPanelInner">
			<?php if (validation_errors()) { ?>
					<div id="alert" class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
			<?php } else if (isset($error)) { ?>			
					<div id="alert" class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
			<?php } ?>
			<?= form_open() ?>
				<div class="fldRow selectBox">
					<span class="selectArrow"></span>
					<div class="select-style">
					<select id="user_type_id" name="user_type_id" required='required'>
						<option value="">* User Type</option>
						<?php 
						foreach($all_user_type as $user_type)
						{
						?>		
							<option value="<?php echo $user_type['ID'];?>" <?php echo set_select('user_type_id',  $user_type['ID']); ?>><?php echo $user_type['Type_Name'];?></option>
						<?php
						} 
						?>
					</select>					
					</div>
				</div>
				<div class="fldRow selectBox">
					<div class="select-style">
					<select name="school_id" name="school_id" required='required'>
						<option value="">* Select School</option>
						<?php 
						foreach($all_school as $school)
						{
						?>		
							<option value="<?php echo $school['ID'];?>" <?php echo set_select('school_id',  $school['ID']); ?>><?php echo $school['School_Name'];?></option>
						<?php
						} 
						?>
					</select>					
					</div>
				</div>
				<div class="fldRow">					
					<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="* Enter an username" value="<?php echo set_value("username");?>" required='required'>					
				</div>
				<div class="fldRow">					
					<input type="text" id="name" name="name" placeholder="* Enter your name" value="<?php echo set_value("name");?>" required='required'>				
				</div>
				<div class="fldRow">					
					<input type="text" id="mob1" name="mob1" placeholder="* Enter your mobile no" value="<?php echo set_value("mob1");?>" required='required' pattern='[0-9]{10}$' title="Enter 10 digit mobile number">								
				</div>
				<div class="fldRow">					
					<input type="email" id="email" name="email" placeholder="* Enter your email" value="<?php echo set_value("email");?>" required='required' pattern='[^@]+@[^@]+\.[a-zA-Z]{2,6}'>									
				</div>
				<div class="fldRow">					
					<input type="password" id="password" name="password" placeholder="* Enter a password" value="<?php echo set_value("password");?>" required='required'>									
				</div>
				<div class="fldRow">					
					<input type="password" id="password_confirm" name="password_confirm" placeholder="* Confirm your password" value="<?php echo set_value("password_confirm");?>" required='required'>									
				</div>
				<div class="fldRow">					
					<textarea id="address" name="address" placeholder="Enter your address"><?php echo set_value("address");?></textarea>					
				</div>
				<div class="fldRow">					
					<input type="text" id="city" name="city" placeholder="Enter your city" value="<?php echo set_value("city");?>">					
				</div>
				<div class="fldRow">	
					<div class="select-style">
						<select name="state" class="form-control">
							<option selected="" value="selected">* Select a State </option>
							<?php 
							$State_values = $this->config->item('indian_all_states');

							foreach($State_values as $value => $display_text)
							{
								$selected = "";
								if($value == set_value("state"))
									$selected = 'selected="selected"';

								echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
							} 
							?>
						</select>											
					</div>					
				</div>
				<div class="fldRow">					
					<input type="text" id="zipcode" name="zipcode" placeholder="* Enter your zipcode" value="<?php echo set_value("zipcode");?>" required='required'>										
				</div>
				<div class="btmBtns">
					<div class="btmBtnsInner">
						<input type="submit" class="signUpBtn signupSm" name="signup" value="Signup">						
						<a href="<?= base_url("/")?>" class="updateProfileBtn">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>