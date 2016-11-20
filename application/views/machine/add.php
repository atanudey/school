<?php echo validation_errors(); ?>
<?php echo form_open('machine/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="SIM_No" class="col-md-4 control-label">SIM No</label>
		<div class="col-md-8">
			<input type="text" name="SIM_No" value="<?php echo $this->input->post('SIM_No'); ?>" class="form-control" id="SIM_No" />
		</div>
	</div>
	<div class="form-group">
		<label for="Provider" class="col-md-4 control-label">Provider</label>
		<div class="col-md-8">
			<input type="text" name="Provider" value="<?php echo $this->input->post('Provider'); ?>" class="form-control" id="Provider" />
		</div>
	</div>
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
			<label for="School_ID" class="col-md-4 control-label">School ID</label>
			<div class="col-md-8">
				<select name="School_ID" class="form-control">
					<option value="">select school</option>
					<?php 
					foreach($all_school as $school)
					{
						$selected = ($school['ID'] == $this->input->post('School_ID')) ? ' selected="selected"' : null;

						echo '<option value="'.$school['ID'].'" '.$selected.'>'.$school['School_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
		<label for="Added_On" class="col-md-4 control-label">Added On</label>
		<div class="col-md-8">
			<input type="text" name="Added_On" value="<?php echo $this->input->post('Added_On'); ?>" class="form-control" id="Added_On" />
		</div>
	</div>
	<div class="form-group">
		<label for="Updated_On" class="col-md-4 control-label">Updated On</label>
		<div class="col-md-8">
			<input type="text" name="Updated_On" value="<?php echo $this->input->post('Updated_On'); ?>" class="form-control" id="Updated_On" />
		</div>
	</div>
	<div class="form-group">
		<label for="Updated_By" class="col-md-4 control-label">Updated By</label>
		<div class="col-md-8">
			<input type="text" name="Updated_By" value="<?php echo $this->input->post('Updated_By'); ?>" class="form-control" id="Updated_By" />
		</div>
	</div>
	<div class="form-group">
		<label for="Is_Deleted" class="col-md-4 control-label">Is Deleted</label>
		<div class="col-md-8">
			<input type="text" name="Is_Deleted" value="<?php echo $this->input->post('Is_Deleted'); ?>" class="form-control" id="Is_Deleted" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>