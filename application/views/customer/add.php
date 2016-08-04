<?php echo validation_errors(); ?>
<?php echo form_open('customer/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="customerName" class="col-md-4 control-label">CustomerName</label>
		<div class="col-md-8">
			<input type="text" name="customerName" value="<?php echo $this->input->post('customerName'); ?>" class="form-control" id="customerName" />
		</div>
	</div>
	<div class="form-group">
		<label for="contactLastName" class="col-md-4 control-label">ContactLastName</label>
		<div class="col-md-8">
			<input type="text" name="contactLastName" value="<?php echo $this->input->post('contactLastName'); ?>" class="form-control" id="contactLastName" />
		</div>
	</div>
	<div class="form-group">
		<label for="contactFirstName" class="col-md-4 control-label">ContactFirstName</label>
		<div class="col-md-8">
			<input type="text" name="contactFirstName" value="<?php echo $this->input->post('contactFirstName'); ?>" class="form-control" id="contactFirstName" />
		</div>
	</div>
	<div class="form-group">
		<label for="phone" class="col-md-4 control-label">Phone</label>
		<div class="col-md-8">
			<input type="text" name="phone" value="<?php echo $this->input->post('phone'); ?>" class="form-control" id="phone" />
		</div>
	</div>
	<div class="form-group">
		<label for="addressLine1" class="col-md-4 control-label">AddressLine1</label>
		<div class="col-md-8">
			<input type="text" name="addressLine1" value="<?php echo $this->input->post('addressLine1'); ?>" class="form-control" id="addressLine1" />
		</div>
	</div>
	<div class="form-group">
		<label for="addressLine2" class="col-md-4 control-label">AddressLine2</label>
		<div class="col-md-8">
			<input type="text" name="addressLine2" value="<?php echo $this->input->post('addressLine2'); ?>" class="form-control" id="addressLine2" />
		</div>
	</div>
	<div class="form-group">
		<label for="city" class="col-md-4 control-label">City</label>
		<div class="col-md-8">
			<input type="text" name="city" value="<?php echo $this->input->post('city'); ?>" class="form-control" id="city" />
		</div>
	</div>
	<div class="form-group">
		<label for="state" class="col-md-4 control-label">State</label>
		<div class="col-md-8">
			<input type="text" name="state" value="<?php echo $this->input->post('state'); ?>" class="form-control" id="state" />
		</div>
	</div>
	<div class="form-group">
		<label for="postalCode" class="col-md-4 control-label">PostalCode</label>
		<div class="col-md-8">
			<input type="text" name="postalCode" value="<?php echo $this->input->post('postalCode'); ?>" class="form-control" id="postalCode" />
		</div>
	</div>
	<div class="form-group">
		<label for="country" class="col-md-4 control-label">Country</label>
		<div class="col-md-8">
			<input type="text" name="country" value="<?php echo $this->input->post('country'); ?>" class="form-control" id="country" />
		</div>
	</div>
	<div class="form-group">
		<label for="salesRepEmployeeNumber" class="col-md-4 control-label">SalesRepEmployeeNumber</label>
		<div class="col-md-8">
			<input type="text" name="salesRepEmployeeNumber" value="<?php echo $this->input->post('salesRepEmployeeNumber'); ?>" class="form-control" id="salesRepEmployeeNumber" />
		</div>
	</div>
	<div class="form-group">
		<label for="creditLimit" class="col-md-4 control-label">CreditLimit</label>
		<div class="col-md-8">
			<input type="text" name="creditLimit" value="<?php echo $this->input->post('creditLimit'); ?>" class="form-control" id="creditLimit" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>