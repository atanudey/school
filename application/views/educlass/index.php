<div class="pull-right">
	<a href="<?php echo site_url('edu_class/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<td>ID</td>
		<td>Name</td>
		<td>Section</td>
		<td>Actions</td>
    </tr>
	<?php foreach($educlasses as $c): ?>
    <tr>
		<td><?php echo $c['ID']; ?></td>
		<td><?php echo $c['Name']; ?></td>
		<td><?php echo $c['Section']; ?></td>
		<td>
            <a href="<?php echo site_url('edu_class/edit/'.$c['ID']); ?>" class="btn btn-info">Edit</a> 
            <a href="<?php echo site_url('edu_class/remove/'.$c['ID']); ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>