<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#timing_list').DataTable({
      		//Set column definition initialisation properties.
			"columnDefs": [
				{ 
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
					"width": "15%",
				},
      		]
    	});
	});
</script>

<div class="bodyPanel">
  <div class="container headingText">
    <h1>List of School Timings</h1>
  </div>
  <div class="container tblwrap">
    <a href="<?php echo site_url('timing/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
		</div>
    <table id="timing_list" class="table table-striped table-bordered">
      <thead>
        <tr>
			<th>ID</th>
			<th>IN/OUT</th>
			<th>Cut Off Time</th>
			<th>Gress Time</th>
			<th>Class Section</th>
			<th>Actions</th>
		</tr>
      </thead>
      <tbody>
        <?php foreach($timing as $s){ ?>
		<tr>
			<td><?php echo $s['ID']; ?></td>
			<td><?php echo $s['IN_OUT']; ?></td>
			<td><?php echo $s['Cut_Off_Time']; ?></td>
			<td><?php echo $s['GressTime_To_InOut']; ?></td>
			<td><?php echo $all_class[$s['Class_ID']]['Name'] . $all_class[$s['Class_ID']]['Section']; ?></td>
			<td>
				<a href="<?php echo site_url('timing/addedit/edit/'.$s['ID']); ?>" class="btn btn-info">Edit</a> 
				<a href="<?php echo site_url('timing/remove/'.$s['ID']); ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php } ?>
      </tbody>
    </table>
  </div>
</div>