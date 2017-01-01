<?php echo validation_errors(); ?>
<?php echo form_open('sms_provider/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="Provider_Name" class="col-md-4 control-label">Provider Name</label>
		<div class="col-md-8">
			<input type="text" name="Provider_Name" value="<?php echo $this->input->post('Provider_Name'); ?>" class="form-control" id="Provider_Name" />
		</div>
	</div>
	<div class="form-group">
		<label for="SMS_Type" class="col-md-4 control-label">SMS Type</label>
		<div class="col-md-8">
			<input type="text" name="SMS_Type" value="<?php echo $this->input->post('SMS_Type'); ?>" class="form-control" id="SMS_Type" />
		</div>
	</div>
	<div class="form-group">
		<label for="SMS_Count" class="col-md-4 control-label">SMS Count</label>
		<div class="col-md-8">
			<input type="text" name="SMS_Count" value="<?php echo $this->input->post('SMS_Count'); ?>" class="form-control" id="SMS_Count" />
		</div>
	</div>
	<div class="form-group">
		<label for="API_Key" class="col-md-4 control-label">API Key</label>
		<div class="col-md-8">
			<input type="text" name="API_Key" value="<?php echo $this->input->post('API_Key'); ?>" class="form-control" id="API_Key" />
		</div>
	</div>
	<div class="form-group">
		<label for="Route" class="col-md-4 control-label">Route</label>
		<div class="col-md-8">
			<input type="text" name="Route" value="<?php echo $this->input->post('Route'); ?>" class="form-control" id="Route" />
		</div>
	</div>
	<div class="form-group">
		<label for="Recharge_Date" class="col-md-4 control-label">Recharge Date</label>
		<div class="col-md-8">
			<input type="text" name="Recharge_Date" value="<?php echo $this->input->post('Recharge_Date'); ?>" class="form-control" id="Recharge_Date" />
		</div>
	</div>
	<div class="form-group">
		<label for="Provider_Password" class="col-md-4 control-label">Provider Password</label>
		<div class="col-md-8">
			<input type="text" name="Provider_Password" value="<?php echo $this->input->post('Provider_Password'); ?>" class="form-control" id="Provider_Password" />
		</div>
	</div>
	<div class="form-group">
		<label for="Is_Active" class="col-md-4 control-label">Is Active</label>
		<div class="col-md-8">
			<input type="text" name="Is_Active" value="<?php echo $this->input->post('Is_Active'); ?>" class="form-control" id="Is_Active" />
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