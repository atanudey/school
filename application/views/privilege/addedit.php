<div class="bodyPanel">
  <div class="container headingText">
	<?php if (!empty($machine['ID'])) { ?>
		<h1>Edit User Privileges</h1>
	<?php } else { ?>
		<h1>Add User Privileges</h1>
	<?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
		<div class="errorBox">
        	<ul>
          		<?php echo validation_errors('<li>', '</li>'); ?>
        	</ul>
      	</div>
		<?php if (!empty($machine['ID'])) { ?>
		<?php echo form_open('privilege/addedit/edit/'.$machine['ID'], array("class"=>"form-horizontal")); ?>
		<?php } else { ?>
		<?php echo form_open('privilege/addedit/', array("class"=>"form-horizontal")); ?>
		<?php } ?>
		<div class="form-group">
			<label for="Is_Active" class="col-md-4 control-label">Is Active</label>
			<div class="col-md-8">
				<select name="Is_Active" class="form-control" required="required">
					<option value="">--- Select ---</option>
					<?php 
					$Is_Active_values = array(
						'1'=>'Active',
						'0'=>'Inactive',
					);

					foreach($Is_Active_values as $value => $display_text)
					{
						$selected = ($value == $privilege['Is_Active']) ? ' selected="selected"' : null;
						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
		<label for="Remarks" class="col-md-4 control-label">Remarks</label>
		<div class="col-md-8">
			<input type="text" name="Remarks" value="<?php echo ($this->input->post('Remarks') ? $this->input->post('Remarks') : $privilege['Remarks']); ?>" class="form-control" id="Remarks" />
		</div>
	</div>
	<div class="form-group">
			<label for="Screen_Master_ID" class="col-md-4 control-label">Screen Name</label>
			<div class="col-md-8">
				<select name="Screen_Master_ID" class="form-control" required="required">
					<option value="">--- Select ---</option>
					<?php 
					foreach($all_screen_master as $screen_master)
					{
						$selected = ($screen_master['ID'] == $privilege['Screen_Master_ID']) ? ' selected="selected"' : null;

						echo '<option value="'.$screen_master['ID'].'" '.$selected.'>'.$screen_master['Screen_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
			<label for="User_Type_ID" class="col-md-4 control-label" required="required">User Type</label>
			<div class="col-md-8">
				<select name="User_Type_ID" class="form-control">
					<option value="">--- Select ---</option>
					<?php 
					foreach($all_user_type as $user_type)
					{
						$selected = ($user_type['ID'] == $privilege['User_Type_ID']) ? ' selected="selected"' : null;

						echo '<option value="'.$user_type['ID'].'" '.$selected.'>'.$user_type['Type_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
			<a href="<?= base_url('privilege'); ?>" class="btn btn-cancel" >Cancel</a> </div>
        </div>
	</div>
	<?php echo form_close(); ?>
</div>
	</div>
</div>