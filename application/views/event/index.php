<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#event_list').DataTable({
      "columns": [
          { "width": "20%" },
          { "width": "20%" },
          { "width": "32%" },
          { "width": "10%" },
          { 
            "width": "18%",
            "orderable": false, //set not orderable
          },          
      ],
    });
	});
</script>

<div class="bodyPanel">
  <div class="container headingText">
    <h1>List of Events</h1>
  </div>
  <div class="container tblwrap">
    <a href="<?php echo site_url('event/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
		</div>
    <table id="event_list" class="table table-striped table-bordered">
      <thead>
        <tr>          
          <th>Event Type</th>
          <th>Title</th>
          <th>Description</th>          
          <th>Date</th>          
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($event as $e): ?>
        <tr>          
          <td><?php echo $e['Event_Type']; ?></td>
          <td><?php echo $e['Title']; ?></td>
          <td><?php echo $e['Description']; ?></td>          
          <td><?php echo $e['Date']; ?></td>          
          <td>
            <a href="<?php echo site_url('event/addedit/edit/'.$e['ID']); ?>" class="btn btn-info">Edit</a>
            <a href="<?php echo site_url('event/notify/'.$e['ID']); ?>" class="btn btn-info">Notify</a>             
            <a href="<?php echo site_url('event/remove/'.$e['ID']); ?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
