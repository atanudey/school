<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#school_list').DataTable({
			"columns": [
				{ "width": "10%" },
				{ "width": "20%" },
				{ "width": "20%" },
				{ "width": "10%" },
				{ "width": "10%" },
				{ "width": "10%" },
				{ "width": "15%" },
			]
		});
	});
</script>

<div class="container tblwrap">
	<div class="headingText">
		<h1>List of Schools</h1>	
	</div>
	<a href="<?php echo site_url('school/add'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i>
 Add</a>
	<table id="school_list" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>School Name</th>
				<th>Contact</th>
				<th>Address1</th>
				<th>Address2</th>
				<th>No Of Students</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($school as $s): ?>	
		<tr>
			<td><?php echo $s['ID']; ?></td>
			<td><?php echo $s['School_Name']; ?></td>
			<td><?php echo $s['Contact']; ?></td>
			<td><?php echo $s['Address1']; ?></td>
			<td><?php echo $s['Address2']; ?></td>
			<td><?php echo $s['No_Of_Students']; ?></td>
			<td>
				<a href="<?php echo site_url('school/edit/'.$s['ID']); ?>" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a> 
				<a href="<?php echo site_url('school/remove/'.$s['ID']); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>