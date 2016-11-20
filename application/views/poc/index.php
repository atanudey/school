<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#poc_list').DataTable({
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
    <h1>List of Class & Section</h1>
  </div>
  <div class="container tblwrap">
    <a href="<?php echo site_url('poc/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
		</div>
    <table id="poc_list" class="table table-striped table-bordered">
      <thead>
        <tr>
			<th>ID</th>
			<th>Name</th>
			<th>Address</th>
			<th>Mob1</th>
			<th>Mob2</th>
			<th>Email ID</th>
			<th>Actions</th>
		</tr>
      </thead>
      <tbody>
        <?php foreach($poc as $s){ ?>
		<tr>
			<td><?php echo $s['ID']; ?></td>
			<td><?php echo $s['PointOfContact_Name']; ?></td>
			<td><?php echo $s['Address']; ?></td>
			<td><?php echo $s['Mob1']; ?></td>
			<td><?php echo $s['Mob2']; ?></td>
			<td><?php echo $s['Email_ID']; ?></td>
			<td>
				<a href="<?php echo site_url('poc/addedit/edit/'.$s['ID']); ?>" class="btn btn-info">Edit</a> 
				<a href="<?php echo site_url('poc/remove/'.$s['ID']); ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php } ?>
      </tbody>
    </table>
  </div>
</div>