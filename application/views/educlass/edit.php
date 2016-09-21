<div class="bodyPanel">
  <div class="container tblwrap">
    <div class="innerPanel">
	<div class="errorBox"><?php echo validation_errors(); ?></div>
<?php echo form_open('edu_class/edit/'.$educlass['ID'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="Name" class="col-md-4 control-label">Name</label>
		<div class="col-md-8">
			<input type="text" name="Name" value="<?php echo ($this->input->post('Name') ? $this->input->post('Name') : $educlass['Name']); ?>" class="form-control" id="Name" />
		</div>
	</div>
	<div class="form-group">
		<label for="Section" class="col-md-4 control-label">Section</label>
		<div class="col-md-8">
			<input type="text" name="Section" value="<?php echo ($this->input->post('Section') ? $this->input->post('Section') : $educlass['Section']); ?>" class="form-control" id="Section" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
</div>
  </div>
</div>