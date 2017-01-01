<?php echo validation_errors(); ?>
<?php echo form_open('privilege/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
			<label for="Is_Active" class="col-md-4 control-label">Is Active</label>
			<div class="col-md-8">
				<select name="Is_Active" class="form-control">
					<option value="">select</option>
					<?php 
					$Is_Active_values = array(
						'1'=>'Active',
						'0'=>'Inactive',
					);

					foreach($Is_Active_values as $value => $display_text)
					{
						$selected = ($value == $this->input->post('Is_Active')) ? ' selected="selected"' : null;

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
		<label for="Remarks" class="col-md-4 control-label">Remarks</label>
		<div class="col-md-8">
			<input type="text" name="Remarks" value="<?php echo $this->input->post('Remarks'); ?>" class="form-control" id="Remarks" />
		</div>
	</div>
	<div class="form-group">
			<label for="Screen_Master_ID" class="col-md-4 control-label">Screen Master ID</label>
			<div class="col-md-8">
				<select name="Screen_Master_ID" class="form-control">
					<option value="">select screen_master</option>
					<?php 
					foreach($all_screen_master as $screen_master)
					{
						$selected = ($screen_master['ID'] == $this->input->post('Screen_Master_ID')) ? ' selected="selected"' : null;

						echo '<option value="'.$screen_master['ID'].'" '.$selected.'>'.$screen_master['Screen_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
			<label for="User_Type_ID" class="col-md-4 control-label">User Type ID</label>
			<div class="col-md-8">
				<select name="User_Type_ID" class="form-control">
					<option value="">select user_type</option>
					<?php 
					foreach($all_user_type as $user_type)
					{
						$selected = ($user_type['ID'] == $this->input->post('User_Type_ID')) ? ' selected="selected"' : null;

						echo '<option value="'.$user_type['ID'].'" '.$selected.'>'.$user_type['Type_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>