<div class="pull-right">
	<a href="<?php echo site_url('sc00001_candidate/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<td>Candidate ID</td>
		<td>CARD NO</td>
		<td>Roll No</td>
		<td>Candidate Name</td>
		<td>Address1</td>
		<td>Address2</td>
		<td>State</td>
		<td>Pin</td>
		<td>Guardian Name</td>
		<td>Email ID</td>
		<td>Mob1</td>
		<td>Mob2</td>
		<td>Blood Group</td>
		<td>Gender</td>
		<td>Age</td>
		<td>Is Admin</td>
		<td>IN OUT</td>
		<td>School ID</td>
		<td>Class ID</td>
		<td>Candidate Type ID</td>
		<td>Actions</td>
    </tr>
	<?php foreach($sc00001_candidate as $s): ?>
    <tr>
		<td><?php echo $s['Candidate_ID']; ?></td>
		<td><?php echo $s['CARD_NO']; ?></td>
		<td><?php echo $s['Roll_No']; ?></td>
		<td><?php echo $s['Candidate_Name']; ?></td>
		<td><?php echo $s['Address1']; ?></td>
		<td><?php echo $s['Address2']; ?></td>
		<td><?php echo $s['State']; ?></td>
		<td><?php echo $s['Pin']; ?></td>
		<td><?php echo $s['Guardian_Name']; ?></td>
		<td><?php echo $s['Email_ID']; ?></td>
		<td><?php echo $s['Mob1']; ?></td>
		<td><?php echo $s['Mob2']; ?></td>
		<td><?php echo $s['Blood_Group']; ?></td>
		<td><?php echo $s['Gender']; ?></td>
		<td><?php echo $s['Age']; ?></td>
		<td><?php echo $s['Is_Admin']; ?></td>
		<td><?php echo $s['IN_OUT']; ?></td>
		<td><?php echo $s['School_ID']; ?></td>
		<td><?php echo $s['Class_ID']; ?></td>
		<td><?php echo $s['Candidate_Type_ID']; ?></td>
		<td>
            <a href="<?php echo site_url('sc00001_candidate/edit/'.$s['Candidate_ID']); ?>" class="btn btn-info">Edit</a> 
            <a href="<?php echo site_url('sc00001_candidate/remove/'.$s['Candidate_ID']); ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>