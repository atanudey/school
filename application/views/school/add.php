<div class="bodyPanel">
  <div class="headingText">
	<h1>Add School</h1>	
</div>
  <div class="container tblwrap">
    <div class="innerPanel">
      <div class="errorBox"><?php echo validation_errors(); ?></div>
      <?php echo form_open('school/add',array("class"=>"form-horizontal")); ?>
      <div class="form-group">
        <label for="School_Name" class="col-md-3">School Name</label>
        <div class="col-md-8">
          <input type="text" name="School_Name" value="<?php echo $this->input->post('School_Name'); ?>" class="form-control" id="School_Name" />
        </div>
      </div>
      <div class="form-group">
        <label for="Description" class="col-md-3">Description</label>
        <div class="col-md-8">
          <textarea name="Description" class="form-control" id="Description"><?php echo $this->input->post('Description'); ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="Address1" class="col-md-3">Address1</label>
        <div class="col-md-8">
          <input type="text" name="Address1" value="<?php echo $this->input->post('Address1'); ?>" class="form-control" id="Address1" />
        </div>
      </div>
      <div class="form-group">
        <label for="Address2" class="col-md-3">Address2</label>
        <div class="col-md-8">
          <input type="text" name="Address2" value="<?php echo $this->input->post('Address2'); ?>" class="form-control" id="Address2" />
        </div>
      </div>
      <div class="form-group">
        <label for="State" class="col-md-3">State</label>
        <div class="col-md-8">
          <select name="State" class="form-control">
            <option value="">--- Select ---</option>
            <?php 
            $State_values = $this->config->item('indian_all_states');

            foreach($State_values as $value => $display_text)
            {
              $selected = "";
              if($value == $this->input->post('State'))
                $selected = 'selected="selected"';

              echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            } 
            ?>
				  </select>          
        </div>
      </div>
      <div class="form-group">
        <label for="Pin" class="col-md-3">Pin</label>
        <div class="col-md-8">
          <input type="text" name="Pin" value="<?php echo $this->input->post('Pin'); ?>" class="form-control" id="Pin" />
        </div>
      </div>
      <div class="form-group">
        <label for="No_Of_Students" class="col-md-3">No Of Students</label>
        <div class="col-md-8">
          <input type="text" name="No_Of_Students" value="<?php echo $this->input->post('No_Of_Students'); ?>" class="form-control" id="No_Of_Students" />
        </div>
      </div>
      <div class="form-group">
        <label for="No_Of_Machines" class="col-md-3">No Of Machines</label>
        <div class="col-md-8">
          <input type="text" name="No_Of_Machines" value="<?php echo $this->input->post('No_Of_Machines'); ?>" class="form-control" id="No_Of_Machines" />
        </div>
      </div>
      <div class="form-group">
        <label for="Event_Active" class="col-md-3">Event Active</label>
        <div class="col-md-8">
          <select name="Event_Active" class="form-control">
            <option value="">--- Select ---</option>
            <?php 
              $Event_Active_values = array(
                  '0'=>'Inactive',
                  '1'=>'Active',
              );

              foreach($Event_Active_values as $value => $display_text)
              {
                  $selected = "";
                  if($value == $this->input->post('Event_Active'))
                      $selected = 'selected="selected"';

                  echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
              } 
              ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="<?= base_url('school'); ?>" class="btn btn-cancel" >Cancel</a>
        </div>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
