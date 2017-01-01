<div class="bodyPanel">
  <div class="container headingText">
    <?php if (!empty($educlass['ID'])) { ?>
    <h1>Edit Class & Section</h1>
    <?php } else { ?>
    <h1>Add Class &  Section</h1>
    <?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
      <div class="errorBox">
        <ul>
          <?php echo validation_errors('<li>', '</li>'); ?>
        </ul>
      </div>
      <?php if (!empty($educlass['ID'])) { ?>
      <?php echo form_open('edu_class/addedit/edit/'.$educlass['ID'], array("id" => "class_frm", "class"=>"form-horizontal")); ?>
      <?php } else { ?>
      <?php echo form_open('edu_class/addedit/',array("id" => "class_frm", "class"=>"form-horizontal")); ?>
      <?php } ?>    
      <input type="hidden" name="School_ID" value="<?php echo $session_user["school_id"]; ?>">  
      <div class="form-group">
        <label for="Name" class="col-md-4 control-label">Class</label>
        <div class="col-md-8">
          <input type="text" name="Name" value="<?php echo ($this->input->post('Name') ? $this->input->post('Name') : $educlass['Name']); ?>" class="form-control" id="Name" required="required" />
        </div>
      </div>
      <div class="form-group">
        <label for="Section" class="col-md-4 control-label">Section</label>
        <div class="col-md-8">
          <input type="text" name="Section" value="<?php echo ($this->input->post('Section') ? $this->input->post('Section') : $educlass['Section']); ?>" class="form-control" id="Section" required="required" />
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
