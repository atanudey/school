<div class="bodyPanel">
  <div class="container headingText">
    <h1>Update Profile</h1>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
      <div class="errorBox">
        <ul>
          <?php echo validation_errors('<li>', '</li>'); ?>
        </ul>
      </div>
      <?php echo form_open('user/profile/',array("class"=>"form-horizontal")); ?>
      <div class="form-group">
        <label class="col-md-4 control-label">User Type</label>
        <div class="col-md-8"> <?php echo $user->Type_Name; ?></div>
      </div>
      <?php if ($session_user['user']->User_Type_ID == "2" || $session_user['user']->User_Type_ID == "3") { ?>
      <div class="form-group">
        <label class="col-md-4 control-label">School</label>
        <div class="col-md-8"> <?php echo $user->school["School_Name"]; ?> </div>
      </div>
      <?php } ?>
      <div class="form-group">
        <label for="username" class="col-md-4 control-label">* Username</label>
        <div class="col-md-8">
          <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $user->User_ID); ?>" class="form-control" id="username" required='required' />
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-md-4 control-label">* Name</label>
        <div class="col-md-8">
          <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user->Name); ?>" required='required'>
        </div>
      </div>
      <div class="form-group">
        <label for="mob1" class="col-md-4 control-label">* Mobile</label>
        <div class="col-md-8">
          <input class="form-control" type="text" id="mob1" name="mob1" placeholder="Enter your mobile no" value="<?php echo ($this->input->post('mob1') ? $this->input->post('mob1') : $user->Mob1); ?>" required='required' pattern='[0-9]{10}$' title="Enter 10 digit mobile number">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-md-4 control-label">* Email</label>
        <div class="col-md-8">
          <input  class="form-control" type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user->Email); ?>" required='required' pattern='[^@]+@[^@]+\.[a-zA-Z]{2,6}'>
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-md-4 control-label">* Address</label>
        <div class="col-md-8">
          <textarea id="address" name="address" placeholder="Enter your address" class="form-control"><?php echo ($this->input->post('address') ? $this->input->post('address') : $user->Address); ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="city" class="col-md-4 control-label">* City</label>
        <div class="col-md-8">
          <input  class="form-control" type="text" id="city" name="city" placeholder="Enter your city" value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $user->City); ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="State" class="col-md-4 control-label">State</label>
        <div class="col-md-8">
          <select name="state" class="form-control">
            <option value="">--- Select ---</option>
            <?php 
						$State_values = $this->config->item('indian_all_states');

						foreach($State_values as $value => $display_text)
						{
							$selected = "";

							echo $check = ($this->input->post('state')) ? $this->input->post('state') : $user->State;

							if($value == $check)
								$selected = 'selected="selected"';

							echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
						} 
						?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-md-4 control-label">* Zipcode</label>
        <div class="col-md-8">
          <input class="form-control" type="text" id="zipcode" name="zipcode" placeholder="Enter your zipcode" value="<?php echo ($this->input->post('zipcode') ? $this->input->post('zipcode') : $user->ZipCode); ?>" required='required'>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="<?= base_url('home'); ?>" class="btn btn-cancel" >Cancel</a> </div>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
