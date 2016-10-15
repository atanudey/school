<div class="container headingText">
	<h1>Add Class</h1>	
</div>
<?php echo form_open('class/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="Name" class="col-md-4 control-label">Name</label>
		<div class="col-md-8">
			<input type="text" name="Name" value="<?php echo $this->input->post('Name'); ?>" class="form-control" id="Name" />
		</div>
	</div>
	<div class="form-group">
		<label for="Section" class="col-md-4 control-label">Section</label>
		<div class="col-md-8">
			<input type="text" name="Section" value="<?php echo $this->input->post('Section'); ?>" class="form-control" id="Section" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
			<a href="<?= base_url('class'); ?>" class="btn btn-cancel" >Cancel</a>
        </div>
	</div>

<?php echo form_close(); ?>