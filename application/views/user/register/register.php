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
						<select name="state" id="state" required='required'>
							<option selected="" value="selected">* Select a State </option>
							<option value="Andaman and Nicobar Islands" <?php echo set_select('state','Andaman and Nicobar Islands'); ?>>Andaman and Nicobar Islands </option>
							<option value="Andhra Pradesh" <?php echo set_select('state','Andhra Pradesh'); ?>>Andhra Pradesh</option>
							<option value="Arunachal Pradesh" <?php echo set_select('state','Arunachal Pradesh'); ?>>Arunachal Pradesh </option>
							<option value="Assam" <?php echo set_select('state','Assam'); ?>>Assam </option>
							<option value="Bihar" <?php echo set_select('state','Bihar'); ?>>Bihar </option>
							<option value="Chandigarh" <?php echo set_select('state','Chandigarh'); ?>>Chandigarh </option>
							<option value="Chhatisgarh" <?php echo set_select('state','Chhatisgarh'); ?>>Chhatisgarh</option>
							<option value="Dadra and Nagar Haveli" <?php echo set_select('state','Dadra and Nagar Haveli'); ?>>Dadra and Nagar Haveli </option>
							<option value="Daman and Diu" <?php echo set_select('state','Daman and Diu'); ?>>Daman and Diu </option>
							<option value="Delhi" <?php echo set_select('state','Delhi'); ?>>Delhi </option>
							<option value="Goa" <?php echo set_select('state','Goa'); ?>>Goa </option>
							<option value="Gujarat" <?php echo set_select('state','Gujarat'); ?>>Gujarat </option>
							<option value="Haryana" <?php echo set_select('state','Haryana'); ?>>Haryana </option>
							<option value="Himachal Pradesh" <?php echo set_select('state','Himachal Pradesh'); ?>>Himachal 
							Pradesh </option>
							<option value="Jammu and Kashmir" <?php echo set_select('state','Jammu and Kashmir'); ?>>Jammu and Kashmir </option>
							<option value="Jharkhand" <?php echo set_select('state','Jharkhand'); ?>>Jharkhand</option>
							<option value="Karnataka" <?php echo set_select('state','Karnataka'); ?>>Karnataka </option>
							<option value="Kerala" <?php echo set_select('state','Kerala'); ?>>Kerala </option>
							<option value="Lakshadweep" <?php echo set_select('state','Lakshadweep'); ?>>Lakshadweep 
							</option>
							<option value="Madhya Pradesh" <?php echo set_select('state','Madhya Pradesh'); ?>>Madhya Pradesh 
							</option>
							<option value="Maharashtra" <?php echo set_select('state','Maharashtra'); ?>>Maharashtra 
							</option>
							<option value="Manipur" <?php echo set_select('state','Manipur'); ?>>Manipur </option>
							<option value="Meghalaya" <?php echo set_select('state','Meghalaya'); ?>>Meghalaya </option>
							<option value="Mizoram" <?php echo set_select('state','Mizoram'); ?>>Mizoram </option>
							<option value="Nagaland" <?php echo set_select('state','Nagaland'); ?>>Nagaland </option>
							<option value="Orissa" <?php echo set_select('state','Orissa'); ?>>Orissa </option>
							<option value="Pondicherry" <?php echo set_select('state','Pondicherry'); ?>>Pondicherry 
							</option>
							<option value="Punjab" <?php echo set_select('state','Punjab'); ?>>Punjab </option>
							<option value="Rajasthan" <?php echo set_select('state','Rajasthan'); ?>>Rajasthan </option>
							<option value="Sikkim" <?php echo set_select('state','Sikkim'); ?>>Sikkim </option>
							<option value="Tamil Nadu" <?php echo set_select('state','Tamil Nadu'); ?>>Tamil Nadu </option>
							<option value="Tripura" <?php echo set_select('state','Tripura'); ?>>Tripura </option>
							<option value="Uttaranchal" <?php echo set_select('state','Uttaranchal'); ?>>Uttaranchal</option>
							<option value="Uttar Pradesh" <?php echo set_select('state','Uttar Pradesh'); ?>>Uttar Pradesh 
							</option>
							<option value="West Bengal" <?php echo set_select('state','West Bengal'); ?>>West Bengal 
							</option>
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