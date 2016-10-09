<div class="headingText">
	<h1>List of Classes</h1>	
</div>

<div class="pull-right">
	<a href="<?php echo site_url('class/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<td>ID</td>
		<td>Name</td>
		<td>Section</td>
		<td>Actions</td>
    </tr>
	<?php foreach($class as $c): ?>
    <tr>
		<td><?php echo $c['ID']; ?></td>
		<td><?php echo $c['Name']; ?></td>
		<td><?php echo $c['Section']; ?></td>
		<td>
            <a href="<?php echo site_url('class/edit/'.$c['ID']); ?>" class="btn btn-info">Edit</a> 
            <a href="<?php echo site_url('class/remove/'.$c['ID']); ?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
	<?php endforeach; ?>
</table>