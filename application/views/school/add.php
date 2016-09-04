<?php echo validation_errors(); ?>
<div class="container tblwrap">
<?php echo form_open('school/add',array("class"=>"form-horizontal")); ?>
	<div class="form-group">
		<label for="School_Name" class="col-md-4 control-label">School Name</label>
		<div class="col-md-8">
			<input type="text" name="School_Name" value="<?php echo $this->input->post('School_Name'); ?>" class="form-control" id="School_Name" />
		</div>
	</div>
	<div class="form-group">
		<label for="Description" class="col-md-4 control-label">Description</label>
		<div class="col-md-8">
			<textarea name="Description" class="form-control" id="Description"><?php echo $this->input->post('Description'); ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="Address1" class="col-md-4 control-label">Address1</label>
		<div class="col-md-8">
			<input type="text" name="Address1" value="<?php echo $this->input->post('Address1'); ?>" class="form-control" id="Address1" />
		</div>
	</div>
	<div class="form-group">
		<label for="Address2" class="col-md-4 control-label">Address2</label>
		<div class="col-md-8">
			<input type="text" name="Address2" value="<?php echo $this->input->post('Address2'); ?>" class="form-control" id="Address2" />
		</div>
	</div>
	<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
				<select name="State" class="form-control">
					<option value="">select</option>
					<?php 
					$State_values = array(
						"Andaman and Nicobar Islands"=>"Andaman and Nicobar Islands",
						"Andhra Pradesh"=>"Andhra Pradesh",
						"Arunachal Pradesh"=>"Arunachal Pradesh",
						"Assam"=>"Assam",
						"Bihar"=>"Bihar",
						"Chandigarh"=>"Chandigarh",
						"Chhatisgarh"=>"Chhatisgarh",
						"Dadra and Nagar Haveli"=>"Dadra and Nagar Haveli",
						"Daman and Diu"=>"Daman and Diu",
						"Delhi"=>"Delhi",
						"Goa"=>"Goa",
						"Gujarat"=>"Gujarat",
						"Haryana"=>"Haryana",
						"Himachal Pradesh"=>"Himachal Pradesh",
						"Jammu and Kashmir"=>"Jammu and Kashmir",
						"Jharkhand"=>"Jharkhand",
						"Karnataka"=>"Karnataka",
						"Kerala"=>"Kerala",
						"Lakshadweep"=>"Lakshadweep",
						"Madhya Pradesh"=>"Madhya Pradesh",
						"Maharashtra"=>"Maharashtra",
						"Manipur"=>"Manipur",
						"Meghalaya"=>"Meghalaya",
						"Mizoram"=>"Mizoram",
						"Nagaland"=>"Nagaland",
						"Orissa"=>"Orissa",
						"Pondicherry"=>"Pondicherry",
						"Punjab"=>"Punjab",
						"Rajasthan"=>"Rajasthan",
						"Sikkim"=>"Sikkim",
						"Tamil Nadu"=>"Tamil Nadu",
						"Tripura"=>"Tripura",
						"Uttaranchal"=>"Uttaranchal",
						"Uttar Pradesh"=>"Uttar Pradesh",
						"West Bengal"=>"West Bengal",
					);

					foreach($State_values as $value => $display_text)
					{
						$selected = "";
						if($value == $this->input->post('State'))
							$selected = 'selected="selected"';

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
		<label for="Pin" class="col-md-4 control-label">Pin</label>
		<div class="col-md-8">
			<input type="text" name="Pin" value="<?php echo $this->input->post('Pin'); ?>" class="form-control" id="Pin" />
		</div>
	</div>
	<div class="form-group">
		<label for="No_Of_Students" class="col-md-4 control-label">No Of Students</label>
		<div class="col-md-8">
			<input type="text" name="No_Of_Students" value="<?php echo $this->input->post('No_Of_Students'); ?>" class="form-control" id="No_Of_Students" />
		</div>
	</div>
	<div class="form-group">
		<label for="No_Of_Machines" class="col-md-4 control-label">No Of Machines</label>
		<div class="col-md-8">
			<input type="text" name="No_Of_Machines" value="<?php echo $this->input->post('No_Of_Machines'); ?>" class="form-control" id="No_Of_Machines" />
		</div>
	</div>
	<div class="form-group">
			<label for="Event_Active" class="col-md-4 control-label">Event Active</label>
			<div class="col-md-8">
				<select name="Event_Active" class="form-control">
					<option value="">select</option>
					<?php 
					$Event_Active_values = array(
						'0'=>'Inactive',
						'1'=>'Active',
					);

					foreach($Event_Active_values as $value => $display_text)
					{
						$selected = "";
						if($value == $this->input->post('Event_Active'))
							$selected = 'selected="selected"';

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
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
</div>