<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#candidate_list').DataTable({ 
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('candidate/ajax_list') ?>",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [
				{ 
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
					"width": "15%",
				},
				{ 
					"targets": [ 4 ],
					"orderable": false, //set not orderable
				},
				{ 
					"targets": [ 6 ],
					"orderable": false, //set not orderable
				},
				{ 
					"targets": [ 7 ],
					"orderable": false, //set not orderable
				},
				{ 
					"targets": [ 8 ],
					"orderable": false, //set not orderable
				},
			],
    	});
	});
</script>

<div class="bodyPanel">
  	<div class="container headingText">
    	<h1>List of Candidates</h1>
    </div>
  <div class="container tblwrap">
	  <a href="<?php echo site_url('candidate/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
	  <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <span> <?php echo $this->session->flashdata('flashInfo'); ?> </span> </p>
      <?php endif ?>
		</div>		
    <table id="candidate_list" class="table table-striped table-bordered">
      <thead>
        <tr>
          <td>RFID #</td>
          <td>Roll #</td>
          <td>Name</td>
          <td>Address1</td>
          <td>Address2</td>
          <td>Guardian</td>
          <td>Mobile</td>
          <td>Gender</td>
          <td>Age</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php /* foreach($candidate as $s): ?>
			<tr>
				<td><?php echo $s['RFID_NO']; ?></td>
				<td><?php echo $s['Roll_No']; ?></td>
				<td><?php echo $s['Candidate_Name']; ?></td>
				<td><?php echo $s['Address1']; ?></td>
				<td><?php echo $s['Address2']; ?></td>
				<td><?php echo $s['Guardian_Name']; ?></td>
				<td><?php echo $s['Mob1']; ?></td>
				<td><?php echo $s['Gender']; ?></td>
				<td><?php echo $s['Age']; ?></td>
				<td>
					<a href="<?php echo site_url('candidate/addedit/edit/'.$s['Candidate_ID']); ?>" class="btn btn-info">Edit</a> 
					<a href="<?php echo site_url('candidate/remove/'.$s['Candidate_ID']); ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php endforeach; */ ?>
      </tbody>
    </table>
  </div>
</div>
