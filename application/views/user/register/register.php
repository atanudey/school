<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--body panel starts -->
<div class="bodyPanel">
	<div class="loginPanelOuter">
		<h1>Sign Up</h1>
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
				<div class="fldRow selectBox">
					<span class="selectArrow"></span>
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
				<div class="fldRow selectBox">
					<div class="select-style">
					<select name="school_id" name="school_id">
						<option value="">Select School</option>
						<?php 
						foreach($all_school as $school)
						{
							$selected = "";							
							echo '<option value="'.$school['ID'].'" $"."selected>'.$school['School_Name'].'</option>';
						} 
						?>
					</select>
					</div>
				</div>
				<div class="fldRow">					
					<input type="text" id="username" name="username" placeholder="Enter an username">					
				</div>
				<div class="fldRow">					
					<input type="text" id="name" name="name" placeholder="Enter your name">					
				</div>
				<div class="fldRow">					
					<input type="text" id="mob1" name="mob1" placeholder="Enter your phone">				
				</div>
				<div class="fldRow">					
					<input type="email" id="email" name="email" placeholder="Enter your email">					
				</div>
				<div class="fldRow">					
					<input type="password" id="password" name="password" placeholder="Enter a password">					
				</div>
				<div class="fldRow">					
					<input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your password">					
				</div>
				<div class="fldRow">					
					<textarea id="address" name="address" placeholder="Enter your address"></textarea>					
				</div>
				<div class="fldRow">					
					<input type="text" id="city" name="city" placeholder="Enter your city">					
				</div>
				<div class="fldRow">	
					<div class="select-style">				
						<select name="state" id="state">
							<option selected="" value="selected">Select a State </option>
							<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands </option>
							<option value="Andhra Pradesh">Andhra Pradesh</option>
							<option value="Arunachal Pradesh">Arunachal Pradesh </option>
							<option value="Assam">Assam </option>
							<option value="Bihar">Bihar </option>
							<option value="Chandigarh">Chandigarh </option>
							<option value="Chhatisgarh">Chhatisgarh</option>
							<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli </option>
							<option value="Daman and Diu">Daman and Diu </option>
							<option value="Delhi">Delhi </option>
							<option value="Goa">Goa </option>
							<option value="Gujarat">Gujarat </option>
							<option value="Haryana">Haryana </option>
							<option value="Himachal Pradesh">Himachal 
							Pradesh </option>
							<option value="Jammu and Kashmir">Jammu and Kashmir </option>
							<option value="Jharkhand">Jharkhand</option>
							<option value="Karnataka">Karnataka </option>
							<option value="Kerala">Kerala </option>
							<option value="Lakshadweep">Lakshadweep 
							</option>
							<option value="Madhya Pradesh">Madhya Pradesh 
							</option>
							<option value="Maharashtra">Maharashtra 
							</option>
							<option value="Manipur">Manipur </option>
							<option value="Meghalaya">Meghalaya </option>
							<option value="Mizoram">Mizoram </option>
							<option value="Nagaland">Nagaland </option>
							<option value="Orissa">Orissa </option>
							<option value="Pondicherry">Pondicherry 
							</option>
							<option value="Punjab">Punjab </option>
							<option value="Rajasthan">Rajasthan </option>
							<option value="Sikkim">Sikkim </option>
							<option value="Tamil Nadu">Tamil Nadu </option>
							<option value="Tripura">Tripura </option>
							<option value="Uttaranchal">Uttaranchal</option>
							<option value="Uttar Pradesh">Uttar Pradesh 
							</option>
							<option value="West Bengal">West Bengal 
							</option>
						</select>
					</div>					
				</div>
				<div class="fldRow">					
					<input type="text" id="zipcode" name="zipcode" placeholder="Enter your zipcode">					
				</div>
				<div class="btmBtns">
					<div class="btmBtnsInner">
						<input type="submit" class="signUpBtn" name="signup" value="Save">						
						<a href="<?= base_url("/")?>" class="updateProfileBtn">Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>