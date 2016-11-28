
<?php echo form_open('timing/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
			<label for="IN_OUT" class="col-md-4 control-label">IN OUT</label>
			<div class="col-md-8">
				<select name="IN_OUT" class="form-control">
					<option value="">select</option>
					<?php 
					$IN_OUT_values = array(
						'IN'=>'IN',
						'OUT'=>'OUT',
					);

					foreach($IN_OUT_values as $value => $display_text)
					{
						$selected = ($value == $this->input->post('IN_OUT')) ? ' selected="selected"' : null;

						echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
		<label for="Cut_Off_Time" class="col-md-4 control-label">Cut Off Time</label>
		<div class="col-md-8">
			<input type="text" name="Cut_Off_Time" value="<?php echo $this->input->post('Cut_Off_Time'); ?>" class="form-control" id="Cut_Off_Time" />
		</div>
	</div>
	<div class="form-group">
		<label for="GressTime_To_InOut" class="col-md-4 control-label">GressTime To InOut</label>
		<div class="col-md-8">
			<input type="text" name="GressTime_To_InOut" value="<?php echo $this->input->post('GressTime_To_InOut'); ?>" class="form-control" id="GressTime_To_InOut" />
		</div>
	</div>
	<div class="form-group">
			<label for="Class_ID" class="col-md-4 control-label">Class ID</label>
			<div class="col-md-8">
				<select name="Class_ID" class="form-control">
					<option value="">select clas</option>
					<?php 
					foreach($all_class as $clas)
					{
						$selected = ($clas['ID'] == $this->input->post('Class_ID')) ? ' selected="selected"' : null;

						echo '<option value="'.$clas['ID'].'" '.$selected.'>'.$clas['Name'].'</option>';
					} 
					?>
				</select>
			</div>
		</div>
	<div class="form-group">
		<label for="School_ID" class="col-md-4 control-label">School ID</label>
		<div class="col-md-8">
			<input type="text" name="School_ID" value="<?php echo $this->input->post('School_ID'); ?>" class="form-control" id="School_ID" />
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