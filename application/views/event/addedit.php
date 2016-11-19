<script type="text/javascript">
$(function() {
    $(".event_date").datepicker({
        format: "dd/mm/yyyy",        
        autoclose: true
    });
});
</script>

<div class="bodyPanel">
  <div class="container headingText">
    <?php if (!empty($event['ID'])) { ?>
    <h1>Edit Event</h1>
    <?php } else { ?>
    <h1>Add Event</h1>
    <?php } ?>
  </div>
  <div class="container tblwrap">
    <div class="innerPanel">
      <div class="errorBox">
        <ul>
          <?php echo validation_errors('<li>', '</li>'); ?>
        </ul>
      </div>
      <?php if (!empty($event['ID'])) { ?>
      <?php /*echo form_open_multipart('event/addedit/edit/'.$event['ID'], array("id" => "event_frm", "class"=>"form-horizontal"));*/ ?>
        <form method="post" action="<?php echo site_url('event/addedit/edit/'.$event['ID']);?>" id="event_frm" class="form-horizontal" enctype="multipart/form-data">
      <?php } else { ?>
        <form method="post" action="<?php echo site_url('event/addedit/');?>" id="event_frm" class="form-horizontal" enctype="multipart/form-data">
      <?php /*echo form_open('event/addedit/',array("id" => "event_frm", "class"=>"form-horizontal"));*/ ?>
      <?php } ?>    
      <input type="hidden" name="School_ID" value="<?php echo $session_user["school_id"]; ?>">
      <div class="form-group">
				<label for="Name" class="col-md-3">* Event & Guardian Call / Notice Type</label> 
        <div class="col-md-8">
          <select name="Event_Type_ID" required="required">
            <option value="">---Select---</option>
            <?php 
            foreach($all_event_type as $event_type)
            {
              $selected = ($event_type['ID'] == $this->input->post('Event_Type_ID')) ? ' selected="selected"' : null;
              if (!empty($event['ID']))
                $selected = ($event_type['ID'] == $event['Event_Type_ID']) ? ' selected="selected"' : null;
              echo '<option value="'.$event_type['ID'].'" '.$selected.'>'.$event_type['Type_Name'].'</option>';
            } 
            ?>
				  </select>
        </div>
		  </div>  
      <div class="form-group">
        <label for="Title" class="col-md-3">* Title</label>
        <div class="col-md-8">
          <input type="text" name="Title" value="<?php echo ($this->input->post('Title') ? $this->input->post('Title') : $event['Title']); ?>" class="form-control" id="Title" required="required" />          
        </div>
      </div>
      <div class="form-group">
        <label for="Description" class="col-md-3">Description</label>
        <div class="col-md-8">
          <textarea name="Description" class="form-control"><?php echo ($this->input->post('Description') ? $this->input->post('Description') : $event['Description']); ?></textarea>
        </div>
      </div> 
      <div class="form-group">
          <label for="Date" class="col-md-3">* Date </label>              
          <div class="col-md-8">              
              <div class="input-append date event_date">
                <input type="text" style="width:150px" name="Date" value="<?php echo ($this->input->post('Date') ? $this->input->post('Date') : convert_to_default_date($event['Date'])); ?>" class="form-control" id="Date"  class="datetimepicker-input" required="required" />
                <span class="add-on"><span class="glyphicon glyphicon-calendar"></span></span>                
              </div>              
          </div>            
      </div>
      <div class="form-group">
        <label for="Description" class="col-md-3">Upload File</label>
        <div class="col-md-8">
          <?php if (!empty($event['File_Name'])) { ?>
          <span>
            <a href="<?php echo base_url("assets/sitedata/".$this->session->userdata('school_id')."/events/".$event['File_Name']); ?>">
              <?php echo $event['File_Name']; ?>
            </a>
          </span>
          <?php } ?>
          <input type="file" name="event_file" id="event_file">
        </div>
      </div> 
      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-success school_choose_submit">Save</button>
          <a href="<?= base_url('event'); ?>" class="btn btn-cancel" >Cancel</a> </div>
      </div>
      <?php echo form_close(); ?> </div>
  </div>
</div>
