<div class="bodyPanel">
  <div class="container headingText">
	<?php if (!empty($machine['ID'])) { ?>
		<h1>Edit School Machine</h1>
	<?php } else { ?>
		<h1>Add School Machine</h1>
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
		<?php echo form_open('machine/addedit/edit/'.$machine['ID'], array("class"=>"form-horizontal")); ?>
		<?php } else { ?>
		<?php echo form_open('machine/addedit/', array("class"=>"form-horizontal")); ?>
		<?php } ?>
		<div class="form-group">
			<label for="SIM_No" class="col-md-4 control-label">* SIM No</label>
			<div class="col-md-8">
				<input type="text" name="SIM_No" value="<?php echo ($this->input->post('SIM_No') ? $this->input->post('SIM_No') : $machine['SIM_No']); ?>" class="form-control" id="SIM_No" required="required" />
			</div>
		</div>
		<div class="form-group">
			<label for="Provider" class="col-md-4 control-label">Provider</label>
			<div class="col-md-8">
				<input type="text" name="Provider" value="<?php echo ($this->input->post('Provider') ? $this->input->post('Provider') : $machine['Provider']); ?>" class="form-control" id="Provider" />
			</div>
		</div>
		<div class="form-group">
			<label for="Is_Active" class="col-md-4 control-label">Is Active</label>
			<div class="col-md-8">
				<select name="Is_Active" class="form-control">
					<option value="">--- Select ---</option>
					<?php 
					$Is_Active_values = array(
						'1'=>'Active',
						'0'=>'Inactive',
					);

					foreach($Is_Active_values as $value => $display_text)
					{
						$selected = ($value == $machine['Is_Active']) ? ' selected="selected"' : null;

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
		<input type="hidden" name="School_ID" value="<?php echo (!empty($session_user["school_id"])) ? $session_user["school_id"]:"" ?>">
		<!--<div class="form-group">
			<label for="School_ID" class="col-md-4 control-label">School ID</label>
			<div class="col-md-8">
				<select name="School_ID" class="form-control">
					<option value="">select school</option>
					<?php 
					foreach($all_school as $school)
					{
						$selected = ($school['ID'] == $machine['School_ID']) ? ' selected="selected"' : null;

						echo '<option value="'.$school['ID'].'" '.$selected.'>'.$school['School_Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>-->
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success school_choose_submit">Save</button>
				<a href="<?= base_url('machine'); ?>" class="btn btn-cancel" >Cancel</a> </div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>