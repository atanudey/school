<script type="text/javascript">
	$(document).ready(function(){

		var options_cutoff = {
			now: "00:00:00",
        	twentyFour: true,
			showSeconds: true,
		};

		var options_gress = {
			now: "00:00:00",
        	twentyFour: true,
			showSeconds: true,
		};

		<?php if (!empty($timing['Cut_Off_Time'])) { ?>
			options_cutoff.now = "<?php echo $timing['Cut_Off_Time']; ?>";
		<?php } ?>

		<?php if (!empty($timing['GressTime_To_InOut'])) { ?>
			options_gress.now = "<?php echo $timing['GressTime_To_InOut']; ?>";
		<?php } ?>

		$("#Cut_Off_Time").wickedpicker(options_cutoff);
		$("#GressTime_To_InOut").wickedpicker(options_gress);
	});
	
</script>

<div class="bodyPanel">
  <div class="container headingText">
	<?php if (!empty($timing['ID'])) { ?>
		<h1>Edit School Timing</h1>
	<?php } else { ?>
		<h1>Add School Timing</h1>
	<?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
		<div class="errorBox">
        	<ul>
          		<?php echo validation_errors('<li>', '</li>'); ?>
        	</ul>
      	</div>
		<?php if (!empty($timing['ID'])) { ?>
		<?php echo form_open('timing/addedit/edit/'.$timing['ID'], array("class"=>"form-horizontal")); ?>
		<?php } else { ?>
		<?php echo form_open('timing/addedit/', array("class"=>"form-horizontal")); ?>
		<?php } ?>
		<div class="form-group">
			<label for="IN_OUT" class="col-md-4 control-label">IN/OUT</label>
			<div class="col-md-8">
				<select name="IN_OUT" class="form-control" required="required">
					<option value="">--- Select ---</option>
					<?php 
					$IN_OUT_values = array(
						'IN'=>'IN',
						'OUT'=>'OUT',
					);

					foreach($IN_OUT_values as $value => $display_text)
					{
						$selected = ($value == $timing['IN_OUT']) ? ' selected="selected"' : null;

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="Cut_Off_Time" class="col-md-4 control-label">Cut Off Time</label>
			<div class="col-md-8">
				<input type="text" name="Cut_Off_Time" id="Cut_Off_Time" required="required" value="<?php echo ($this->input->post('Cut_Off_Time') ? $this->input->post('Cut_Off_Time') : $timing['Cut_Off_Time']); ?>" class="form-control" id="Cut_Off_Time" />
			</div>
		</div>
		<div class="form-group">
			<label for="GressTime_To_InOut" class="col-md-4 control-label">Gress Time To In/Out</label>
			<div class="col-md-8">
				<input type="text" name="GressTime_To_InOut" id="GressTime_To_InOut" required="required" value="<?php echo ($this->input->post('GressTime_To_InOut') ? $this->input->post('GressTime_To_InOut') : $timing['GressTime_To_InOut']); ?>" class="form-control" id="GressTime_To_InOut" />
			</div>
		</div>
		<div class="form-group">
			<label for="Class_ID" class="col-md-4 control-label">Class & Section</label>
			<div class="col-md-8">
				<select name="Class_ID" class="form-control" required="required">
					<option value="">--- Select ---</option>
					<?php 
					foreach($all_class as $clas)
					{
						$selected = ($clas['ID'] == $timing['Class_ID']) ? ' selected="selected"' : null;

						echo '<option value="'.$clas['ID'].'" '.$selected.'>'.$clas['Name'].' - ' . $clas['Section'] . '</option>';
					} 
					?>
				</select>
			</div>
		</div>
		<input type="hidden" name="School_ID" value="<?php echo (!empty($session_user["school_id"])) ? $session_user["school_id"]:"" ?>">
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success school_choose_submit">Save</button>
				<a href="<?= base_url('timing'); ?>" class="btn btn-cancel" >Cancel</a> </div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>