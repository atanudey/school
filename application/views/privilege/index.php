<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#privilege_list').DataTable({
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
    <h1>List of User Privileges</h1>
  </div>
  <div class="container tblwrap">
    <a href="<?php echo site_url('privilege/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
		</div>
    <table id="privilege_list" class="table table-striped table-bordered">
      <thead>
        <tr>
			<th>ID</th>
			<th>Is Active</th>
			<th>Remarks</th>
			<th>Screen Name</th>
			<th>User Type</th>
			<th>Actions</th>
		</tr>
      </thead>
      <tbody>
        <?php foreach($privilege as $s){ ?>
		<tr>
			<td><?php echo $s['ID']; ?></td>
			<td><?php echo ($s['Is_Active'] == '1') ? 'Active':'Inactive'; ?></td>
			<td><?php echo $s['Remarks']; ?></td>
			<td><?php echo $s['Screen_Name']; ?></td>
			<td><?php echo $s['Type_Name']; ?></td>
			<td>
				<a href="<?php echo site_url('privilege/addedit/edit/'.$s['ID']); ?>" class="btn btn-info">Edit</a> 
				<a href="<?php echo site_url('privilege/remove/'.$s['ID']); ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php } ?>
      </tbody>
    </table>
  </div>
</div>