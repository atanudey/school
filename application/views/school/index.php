<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#school_list').DataTable({});
	});
</script>
<div class="container tblwrap">
	<a href="<?php echo site_url('school/add'); ?>" class="btn btn-success">Add</a>
	<table id="school_list" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>School Name</th>
				<th>Description</th>
				<th>Address1</th>
				<th>Address2</th>
				<th>State</th>
				<th>Pin</th>
				<th>No Of Students</th>
				<th>No Of Machines</th>
				<th>Event Active</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($school as $s): ?>	
		<tr>
			<td><?php echo $s['ID']; ?></td>
			<td><?php echo $s['School_Name']; ?></td>
			<td><?php echo $s['Description']; ?></td>
			<td><?php echo $s['Address1']; ?></td>
			<td><?php echo $s['Address2']; ?></td>
			<td><?php echo $s['State']; ?></td>
			<td><?php echo $s['Pin']; ?></td>
			<td><?php echo $s['No_Of_Students']; ?></td>
			<td><?php echo $s['No_Of_Machines']; ?></td>
			<td><?php echo $s['Event_Active']; ?></td>
			<td>
				<a href="<?php echo site_url('school/edit/'.$s['ID']); ?>" class="btn btn-info">Edit</a> 
				<a href="<?php echo site_url('school/remove/'.$s['ID']); ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>