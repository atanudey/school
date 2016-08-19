<div class="pull-right">
	<a href="<?php echo site_url('candidate_type/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<td>ID</td>
		<td>Type Name</td>
		<td>Actions</td>
    </tr>
	<?php foreach($candidate_type as $c): ?>
    <tr>
		<td><?php echo $c['ID']; ?></td>
		<td><?php echo $c['Type_Name']; ?></td>
		<td>
            <a href="<?php echo site_url('candidate_type/edit/'.$c['ID']); ?>" class="btn btn-info">Edit</a> 
            <a href="<?php echo site_url('candidate_type/remove/'.$c['ID']); ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>