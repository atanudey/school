<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#educlass_list').DataTable({
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
    <a href="<?php echo site_url('edu_class/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
		</div>
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
          <td align="center"><a href="<?php echo site_url('edu_class/addedit/edit/'.$c['ID']); ?>" class="btn btn-info">Edit</a> <a href="<?php echo site_url('edu_class/remove/'.$c['ID']); ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
