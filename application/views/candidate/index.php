<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#candidate_list').DataTable({});
	});
</script>
<div class="container tblwrap">
	<a href="<?php echo site_url('candidate/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i>Add</a>
	<table id="candidate_list" class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>RFID NO</td>
				<td>Roll No</td>
				<td>Candidate Name</td>
				<td>Address1</td>
				<td>Address2</td>
				<td>Guardian Name</td>
				<td>Mob1</td>
				<td>Gender</td>
				<td>Age</td>
				<td>IN OUT</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($candidate as $s): ?>
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
				<td><?php echo $s['IN_OUT']; ?></td>
				<td>
					<a href="<?php echo site_url('candidate/addedit/edit/'.$s['Candidate_ID']); ?>" class="btn btn-info">Edit</a> 
					<a href="<?php echo site_url('candidate/remove/'.$s['Candidate_ID']); ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>