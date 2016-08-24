<div class="pull-right">
	<a href="<?php echo site_url('user_type/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<td>ID</td>
		<td>Type Name</td>
		<td>Actions</td>
    </tr>
	<?php foreach($user_type as $u): ?>
    <tr>
		<td><?php echo $u['ID']; ?></td>
		<td><?php echo $u['Type_Name']; ?></td>
		<td>
            <a href="<?php echo site_url('user_type/edit/'.$u['ID']); ?>" class="btn btn-info">Edit</a> 
            <a href="<?php echo site_url('user_type/remove/'.$u['ID']); ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>