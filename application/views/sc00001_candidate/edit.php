<?php echo validation_errors(); ?>
<?php echo form_open('sc00001_candidate/edit/'.$sc00001_candidate['Candidate_ID'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="CARD_NO" class="col-md-4 control-label">CARD NO</label>
		<div class="col-md-8">
			<input type="text" name="CARD_NO" value="<?php echo ($this->input->post('CARD_NO') ? $this->input->post('CARD_NO') : $sc00001_candidate['CARD_NO']); ?>" class="form-control" id="CARD_NO" />
		</div>
	</div>
	<div class="form-group">
		<label for="Roll_No" class="col-md-4 control-label">Roll No</label>
		<div class="col-md-8">
			<input type="text" name="Roll_No" value="<?php echo ($this->input->post('Roll_No') ? $this->input->post('Roll_No') : $sc00001_candidate['Roll_No']); ?>" class="form-control" id="Roll_No" />
		</div>
	</div>
	<div class="form-group">
		<label for="Candidate_Name" class="col-md-4 control-label">Candidate Name</label>
		<div class="col-md-8">
			<input type="text" name="Candidate_Name" value="<?php echo ($this->input->post('Candidate_Name') ? $this->input->post('Candidate_Name') : $sc00001_candidate['Candidate_Name']); ?>" class="form-control" id="Candidate_Name" />
		</div>
	</div>
	<div class="form-group">
		<label for="Address1" class="col-md-4 control-label">Address1</label>
		<div class="col-md-8">
			<input type="text" name="Address1" value="<?php echo ($this->input->post('Address1') ? $this->input->post('Address1') : $sc00001_candidate['Address1']); ?>" class="form-control" id="Address1" />
		</div>
	</div>
	<div class="form-group">
		<label for="Address2" class="col-md-4 control-label">Address2</label>
		<div class="col-md-8">
			<input type="text" name="Address2" value="<?php echo ($this->input->post('Address2') ? $this->input->post('Address2') : $sc00001_candidate['Address2']); ?>" class="form-control" id="Address2" />
		</div>
	</div>
	<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
				<select name="State" class="form-control">
					<option value="">select</option>
					<?php 
					$State_values = array(
					);

					foreach($State_values as $value => $display_text)
					{
						$selected = "";
						if($value == $sc00001_candidate['State'])
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
			<input type="text" name="Pin" value="<?php echo ($this->input->post('Pin') ? $this->input->post('Pin') : $sc00001_candidate['Pin']); ?>" class="form-control" id="Pin" />
		</div>
	</div>
	<div class="form-group">
		<label for="Guardian_Name" class="col-md-4 control-label">Guardian Name</label>
		<div class="col-md-8">
			<input type="text" name="Guardian_Name" value="<?php echo ($this->input->post('Guardian_Name') ? $this->input->post('Guardian_Name') : $sc00001_candidate['Guardian_Name']); ?>" class="form-control" id="Guardian_Name" />
		</div>
	</div>
	<div class="form-group">
		<label for="Email_ID" class="col-md-4 control-label">Email ID</label>
		<div class="col-md-8">
			<input type="text" name="Email_ID" value="<?php echo ($this->input->post('Email_ID') ? $this->input->post('Email_ID') : $sc00001_candidate['Email_ID']); ?>" class="form-control" id="Email_ID" />
		</div>
	</div>
	<div class="form-group">
		<label for="Mob1" class="col-md-4 control-label">Mob1</label>
		<div class="col-md-8">
			<input type="text" name="Mob1" value="<?php echo ($this->input->post('Mob1') ? $this->input->post('Mob1') : $sc00001_candidate['Mob1']); ?>" class="form-control" id="Mob1" />
		</div>
	</div>
	<div class="form-group">
		<label for="Mob2" class="col-md-4 control-label">Mob2</label>
		<div class="col-md-8">
			<input type="text" name="Mob2" value="<?php echo ($this->input->post('Mob2') ? $this->input->post('Mob2') : $sc00001_candidate['Mob2']); ?>" class="form-control" id="Mob2" />
		</div>
	</div>
	<div class="form-group">
		<label for="Blood_Group" class="col-md-4 control-label">Blood Group</label>
		<div class="col-md-8">
			<input type="text" name="Blood_Group" value="<?php echo ($this->input->post('Blood_Group') ? $this->input->post('Blood_Group') : $sc00001_candidate['Blood_Group']); ?>" class="form-control" id="Blood_Group" />
		</div>
	</div>
	<div class="form-group">
		<label for="Gender" class="col-md-4 control-label">Gender</label>
		<div class="col-md-8">
			<input type="text" name="Gender" value="<?php echo ($this->input->post('Gender') ? $this->input->post('Gender') : $sc00001_candidate['Gender']); ?>" class="form-control" id="Gender" />
		</div>
	</div>
	<div class="form-group">
		<label for="Age" class="col-md-4 control-label">Age</label>
		<div class="col-md-8">
			<input type="text" name="Age" value="<?php echo ($this->input->post('Age') ? $this->input->post('Age') : $sc00001_candidate['Age']); ?>" class="form-control" id="Age" />
		</div>
	</div>
	<div class="form-group">
			<label for="Is_Admin" class="col-md-4 control-label">Is Admin</label>
			<div class="col-md-8">
				<select name="Is_Admin" class="form-control">
					<option value="">select</option>
					<?php 
					$Is_Admin_values = array(
						'0'=>'No',
						'1'=>'Yes',
					);

					foreach($Is_Admin_values as $value => $display_text)
					{
						$selected = "";
						if($value == $sc00001_candidate['Is_Admin'])
							$selected = 'selected="selected"';

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
			<label for="IN_OUT" class="col-md-4 control-label">IN OUT</label>
			<div class="col-md-8">
				<select name="IN_OUT" class="form-control">
					<option value="">select</option>
					<?php 
					$IN_OUT_values = array(
						'In'=>'In',
						'Out'=>'Out',
					);

					foreach($IN_OUT_values as $value => $display_text)
					{
						$selected = "";
						if($value == $sc00001_candidate['IN_OUT'])
							$selected = 'selected="selected"';

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
						$selected = "";
						if($school['ID'] == $sc00001_candidate['School_ID'])
							$selected = 'selected="selected"';

						echo "<option value='".$school['ID']."' $selected>".$school['School_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
			<label for="Class_ID" class="col-md-4 control-label">Class ID</label>
			<div class="col-md-8">
				<select name="Class_ID" class="form-control">
					<option value="">select educlass</option>
					<?php 
					foreach($all_educlasses as $educlass)
					{
						$selected = "";
						if($educlass['ID'] == $sc00001_candidate['Class_ID'])
							$selected = 'selected="selected"';

						echo "<option value='".$educlass['ID']."' $selected>".$educlass['Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
			<label for="Candidate_Type_ID" class="col-md-4 control-label">Candidate Type ID</label>
			<div class="col-md-8">
				<select name="Candidate_Type_ID" class="form-control">
					<option value="">select candidate_type</option>
					<?php 
					foreach($all_candidate_type as $candidate_type)
					{
						$selected = "";
						if($candidate_type['ID'] == $sc00001_candidate['Candidate_Type_ID'])
							$selected = 'selected="selected"';

						echo "<option value='".$candidate_type['ID']."' $selected>".$candidate_type['Type_Name'].'</option>';
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