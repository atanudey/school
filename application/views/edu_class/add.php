<div class="bodyPanel">
  <div class="container headingText">
    <?php if (!empty($candidate['Candidate_ID'])) { ?>
    <h1>Edit Class & Section</h1>
    <?php } else { ?>
    <h1>Add Class & Section</h1>
    <?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
      <div class="errorBox">
        <ul>
          <?php echo validation_errors('<li>', '</li>'); ?>
        </ul>
      </div>
      <?php echo form_open('edu_class/add/', array("class"=>"form-horizontal")); ?>
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
          <a href="<?= base_url('edu_class'); ?>" class="btn btn-cancel" >Cancel</a> </div>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
