<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
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
		<div class="col-md-12">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="usertype">User Type</label>
					<select class="form-control" id="user_type_id" name="user_type_id" placeholder="Enter an user type">
						<option value="">Select user type</option>
						<option value="2" selected>School</option>
					</select>
					<p class="help-block">Based on this type you'll get access to different sections</p>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter an username">
					<p class="help-block">At least 4 characters, letters or numbers only</p>
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<label for="mob1">Phone</label>
					<input type="text" class="form-control" id="mob1" name="mob1" placeholder="Enter your phone">
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
					<p class="help-block">A valid email address</p>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<p class="help-block">At least 6 characters</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<p class="help-block">Must match your password</p>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<textarea class="form-control" id="address" name="address" placeholder="Enter your address"></textarea>					
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<label for="password_confirm">State</label>
					<select name="state" class="form-control" id="state">
						<option selected="" value="selected">Select a State </option>
						<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands </option>
						<option value="Andhra Pradesh">Andhra Pradesh</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh </option>
						<option value="Assam">Assam </option>
						<option value="Bihar">Bihar </option>
						<option value="Chandigarh">Chandigarh </option>
						<option value="Chhatisgarh">Chhatisgarh</option>
						<option value="Dadra and Nagar Haveli">Dadra 
						and Nagar Haveli </option>
						<option value="Daman and Diu">Daman and 
						Diu </option>
						<option value="Delhi">Delhi </option>
						<option value="Goa">Goa </option>
						<option value="Gujarat">Gujarat </option>
						<option value="Haryana">Haryana </option>
						<option value="Himachal Pradesh">Himachal 
						Pradesh </option>
						<option value="Jammu and Kashmir">Jammu 
						and Kashmir </option>
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
					<p class="help-block">Please select your state</p>
				</div>
				<div class="form-group">
					<label for="zipcode">Zip Code</label>
					<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter your zipcode">
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<label for="school_id">School</label>
					<select name="school_id" class="form-control" id="school_id">
						<option value="">Select a School </option>
						<option value="1" selected>South Suburban School (Main)</option>						
					</select>
					<p class="help-block"></p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->