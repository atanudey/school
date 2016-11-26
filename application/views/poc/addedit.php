<div class="bodyPanel">
  <div class="container headingText">
	<?php if (!empty($poc['ID'])) { ?>
		<h1>Edit Point Of Contact</h1>
	<?php } else { ?>
		<h1>Add Point Of Contact</h1>
	<?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
		<div class="errorBox">
        	<ul>
          		<?php echo validation_errors('<li>', '</li>'); ?>
        	</ul>
      	</div>
		<?php if (!empty($poc['ID'])) { ?>
		<?php echo form_open('poc/addedit/edit/'.$poc['ID'], array("class"=>"form-horizontal")); ?>
		<?php } else { ?>
		<?php echo form_open('poc/addedit/', array("class"=>"form-horizontal")); ?>
		<?php } ?>
		<div class="form-group">
			<label for="PointOfContact_Name" class="col-md-4 control-label">* Contact Name</label>
			<div class="col-md-8">
				<input type="text" name="PointOfContact_Name" value="<?php echo ($this->input->post('PointOfContact_Name') ? $this->input->post('PointOfContact_Name') : $poc['PointOfContact_Name']); ?>" class="form-control" id="PointOfContact_Name"  required='required' pattern='[a-zA-Z .]+$' title="Enter only alphabets and spaces" />
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
				<input type="text" name="Address" value="<?php echo ($this->input->post('Address') ? $this->input->post('Address') : $poc['Address']); ?>" class="form-control" id="Address" />
			</div>
		</div>
		<div class="form-group">
			<label for="Mob1" class="col-md-4 control-label">* Mobile 1</label>
			<div class="col-md-8">
				<input type="text" name="Mob1" value="<?php echo ($this->input->post('Mob1') ? $this->input->post('Mob1') : $poc['Mob1']); ?>" class="form-control" id="Mob1" required='required' pattern='[+0-9]{3}[0-9]{10}$' title="Enter 10 digit mobile number. Eg: +919000000000" />
			</div>
		</div>
		<div class="form-group">
			<label for="Mob2" class="col-md-4 control-label">Mobile 2</label>
			<div class="col-md-8">
				<input type="text" name="Mob2" value="<?php echo ($this->input->post('Mob2') ? $this->input->post('Mob2') : $poc['Mob2']); ?>" class="form-control" id="Mob2" pattern='[+0-9]{3}[0-9]{10}$' title="Enter 10 digit mobile number. Eg: +919000000000" />
			</div>
		</div>
		<div class="form-group">
			<label for="Email_ID" class="col-md-4 control-label">* Email ID</label>
			<div class="col-md-8">
				<input type="text" name="Email_ID" value="<?php echo ($this->input->post('Email_ID') ? $this->input->post('Email_ID') : $poc['Email_ID']); ?>" class="form-control" id="Email_ID" required='required' pattern='[^@]+@[^@]+\.[a-zA-Z]{2,6}' />
			</div>
		</div>
		<input type="hidden" name="School_ID" value="<?php echo (!empty($session_user["school_id"])) ? $session_user["school_id"]:"" ?>">
		<!--<div class="form-group">
			<label for="School_ID" class="col-md-4 control-label">* Choose School</label>
			<div class="col-md-8">
				<select name="School_ID" class="form-control" required="required">
					<option value="">--- Select ---</option>
					<?php 
					foreach($all_school as $school)
					{
						$selected = ($school['ID'] == $poc['School_ID']) ? ' selected="selected"' : null;
						echo '<option value="'.$school['ID'].'" '.$selected.'>'.$school['School_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>-->
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success school_choose_submit">Save</button>
				<a href="<?= base_url('poc'); ?>" class="btn btn-cancel" >Cancel</a> </div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>