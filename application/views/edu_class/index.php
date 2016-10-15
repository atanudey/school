<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#educlass_list').DataTable({});
	});
</script>

<div class="bodyPanel">
  <div class="container tblwrap"> <a href="<?php echo site_url('edu_class/add'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <table id="educlass_list" class="table table-striped table-bordered">
      <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Section</td>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach($educlasses as $c): ?>
        <tr>
          <td><?php echo $c['ID']; ?></td>
          <td><?php echo $c['Name']; ?></td>
          <td><?php echo $c['Section']; ?></td>
          <td align="center"><a href="<?php echo site_url('edu_class/edit/'.$c['ID']); ?>" class="btn btn-info">Edit</a> <a href="<?php echo site_url('edu_class/remove/'.$c['ID']); ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
