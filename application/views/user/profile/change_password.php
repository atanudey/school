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
  <div class="container headingText">
    <h1>Change Password</h1>
  </div>
  <div class="container tblwrap">    
    <div class="innerPanel">
      <div class="errorBox">
        <ul>
          <?php echo validation_errors('<li>', '</li>'); ?>
        </ul>
      </div>
      <?php echo form_open('user/change_password',array("class"=>"form-horizontal")); ?>
      <div class="form-group">
        <label for="current_password" class="col-md-4 control-label">* Current Password</label>
        <div class="col-md-8">
          <input class="form-control" type="password" id="current_password" name="current_password" placeholder="Enter current password">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-md-4 control-label">* New Password</label>
        <div class="col-md-8">
          <input class="form-control" type="password" id="password" name="password" placeholder="Enter new password">
        </div>
      </div>
      <div class="form-group">
        <label for="password_conf" class="col-md-4 control-label">* Confirm your password</label>
        <div class="col-md-8">
          <input class="form-control" type="password" id="password_conf" name="password_conf" placeholder="Confirm your password">
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
