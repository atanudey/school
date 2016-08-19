
<?php echo form_open('candidate_type/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="Type_Name" class="col-md-4 control-label">Type Name</label>
		<div class="col-md-8">
			<input type="text" name="Type_Name" value="<?php echo $this->input->post('Type_Name'); ?>" class="form-control" id="Type_Name" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>