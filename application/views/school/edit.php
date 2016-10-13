<div class="bodyPanel">
  
  <div class="container tblwrap"> 
    <div class="headingText">
      <h1>Edit School</h1>  
    </div>

    <?php echo form_open('school/edit/'.$school['ID'],array("class"=>"form-horizontal")); ?>
    <div class="innerPanel">
      <div class="errorBox"><?php echo validation_errors(); ?></div>
      <div class="form-group">
        <label for="School_Name" class="col-md-3">School Name</label>
        <div class="col-md-8">
          <input type="text" name="School_Name" value="<?php echo ($this->input->post('School_Name') ? $this->input->post('School_Name') : $school['School_Name']); ?>" class="form-control" id="School_Name" />
        </div>
      </div>
      <div class="form-group">
        <label for="Description" class="col-md-3">Description</label>
        <div class="col-md-8">
          <textarea name="Description" class="form-control"><?php echo ($this->input->post('Description') ? $this->input->post('Description') : $school['Description']); ?></textarea>
        </div>
      </div>
      <div class="form-group">
        <label for="Address1" class="col-md-3">Address 1</label>
        <div class="col-md-8">
          <input type="text" name="Address1" value="<?php echo ($this->input->post('Address1') ? $this->input->post('Address1') : $school['Address1']); ?>" class="form-control" id="Address1" />
        </div>
      </div>
      <div class="form-group">
        <label for="Address2" class="col-md-3">Address 2</label>
        <div class="col-md-8">
          <input type="text" name="Address2" value="<?php echo ($this->input->post('Address2') ? $this->input->post('Address2') : $school['Address2']); ?>" class="form-control" id="Address2" />
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
              if($value == $school['State'])
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
          <input type="text" name="Pin" value="<?php echo ($this->input->post('Pin') ? $this->input->post('Pin') : $school['Pin']); ?>" class="form-control" id="Pin" />
        </div>
      </div>
      <div class="form-group">
        <label for="No_Of_Students" class="col-md-3">No Of Students</label>
        <div class="col-md-8">
          <input type="text" name="No_Of_Students" value="<?php echo ($this->input->post('No_Of_Students') ? $this->input->post('No_Of_Students') : $school['No_Of_Students']); ?>" class="form-control" id="No_Of_Students" />
        </div>
      </div>
      <div class="form-group">
        <label for="No_Of_Machines" class="col-md-3">No Of Machines</label>
        <div class="col-md-8">
          <input type="text" name="No_Of_Machines" value="<?php echo ($this->input->post('No_Of_Machines') ? $this->input->post('No_Of_Machines') : $school['No_Of_Machines']); ?>" class="form-control" id="No_Of_Machines" />
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
            if($value == $school['Event_Active'])
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
