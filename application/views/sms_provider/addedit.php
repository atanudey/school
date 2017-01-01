<script type="text/javascript">
$(function() {
    $("#Recharge_Date").datepicker({
        format: "dd/mm/yyyy",        
        autoclose: true,
		endDate: "today"
    });

	$("#copy_information").on("click", function(){
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('sms_provider/get_provider_info'); ?>",
			data: { "ID": $('#Copy_Provider').val() },
			dataType: "json",
		})
		.done(function( data ) {
			//console.log(data);
			$.each(data, function(item, info){
				if (item != "Recharge_Date")
					$("[name='" + item + "']").val(info);				
			});
		});
	});
});
</script>
<div class="bodyPanel">
  <div class="container headingText">
	<?php if (!empty($sms_provider['ID'])) { ?>
		<h1>Edit SMS Providers</h1>
	<?php } else { ?>
		<h1>Add SMS Providers</h1>
	<?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
		<div class="errorBox">
        	<ul>
          		<?php echo validation_errors('<li>', '</li>'); ?>
        	</ul>
      	</div>
		<form name="copy" class="form-horizontal">
		<div class="form-group">
			<label for="Provider_Name" class="col-md-4 control-label">* Copy From</label>
			<div class="col-md-8">
				<select name="Copy_Provider" id="Copy_Provider" class="form-control">
					<option value="">--- Select ---</option>
					<?php 
					foreach($predefined_sms_provider as $value => $display_text)
					{
						$selected = "";
						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<a href="javascript:void(0)" class="btn btn-success" id="copy_information" >Copy Info</a> </div>
			</div>
		</div>
		<hr />
		</form>
		<?php if (!empty($sms_provider['ID'])) { ?>
		<?php echo form_open('sms_provider/addedit/edit/'.$sms_provider['ID'], array("class"=>"form-horizontal")); ?>
		<?php } else { ?>
		<?php echo form_open('sms_provider/addedit/', array("class"=>"form-horizontal")); ?>
		<?php } ?>		
		<div class="form-group">
			<label for="Provider_Name" class="col-md-4 control-label">* Provider Name</label>
			<div class="col-md-8">
				<input type="text" name="Provider_Name" value="<?php echo ($this->input->post('Provider_Name') ? $this->input->post('Provider_Name') : $sms_provider['Provider_Name']); ?>" required="required" class="form-control" id="Provider_Name" />
			</div>
		</div>
		<div class="form-group">
			<label for="SMS_Type" class="col-md-4 control-label">* SMS Type</label>
			<div class="col-md-8">
				<select name="SMS_Type" class="form-control">
					<option value="">--- Select ---</option>
					<?php $SMS_Type_values = array(
						'Promotion'=>'Promotion',
						'Transaction'=>'Transaction',
					);

					foreach($SMS_Type_values as $value => $display_text)
					{
						$selected = ($value == $sms_provider['SMS_Type']) ? ' selected="selected"' : null;
						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="SMS_Count" class="col-md-4 control-label">* SMS Count</label>
			<div class="col-md-8">
				<input type="text" name="SMS_Count" value="<?php echo ($this->input->post('SMS_Count') ? $this->input->post('SMS_Count') : $sms_provider['SMS_Count']); ?>" required="required" class="form-control" id="SMS_Count" />
			</div>
		</div>
		<div class="form-group">
			<label for="API_Key" class="col-md-4 control-label">* API Key</label>
			<div class="col-md-8">
				<input type="text" name="API_Key" value="<?php echo ($this->input->post('API_Key') ? $this->input->post('API_Key') : $sms_provider['API_Key']); ?>" required="required" class="form-control" id="API_Key" />
			</div>
		</div>
		<div class="form-group">
			<label for="Route" class="col-md-4 control-label">* Route</label>
			<div class="col-md-8">
				<input type="text" name="Route" value="<?php echo ($this->input->post('Route') ? $this->input->post('Route') : $sms_provider['Route']); ?>" required="required" class="form-control" id="Route" />
			</div>
		</div>
		<div class="form-group">
			<label for="Recharge_Date" class="col-md-4 control-label">* Recharge Date</label>
			<div class="col-md-8">
				<input type="text" name="Recharge_Date" id="Recharge_Date" value="<?php echo ($this->input->post('Recharge_Date') ? convert_to_default_date($this->input->post('Recharge_Date')) : convert_to_default_date($sms_provider['Recharge_Date'])); ?>" required="required" class="form-control" id="Recharge_Date" />
			</div>
		</div>
		<div class="form-group">
			<label for="Provider_Password" class="col-md-4 control-label">Provider Password</label>
			<div class="col-md-8">
				<input type="text" name="Provider_Password" value="<?php echo ($this->input->post('Provider_Password') ? $this->input->post('Provider_Password') : $sms_provider['Provider_Password']); ?>" class="form-control" id="Provider_Password" />
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
						$selected = ($value == $sms_provider['Is_Active']) ? ' selected="selected"' : null;
						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<!--<input type="hidden" name="School_ID" value="<?php echo (!empty($session_user["school_id"])) ? $session_user["school_id"]:"" ?>">-->
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-8">
				<button type="submit" class="btn btn-success school_choose_submit">Save</button>
				<a href="<?= base_url('sms_provider'); ?>" class="btn btn-cancel" >Cancel</a> </div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
	</div>
</div>