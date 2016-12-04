<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$('#sms_provider_list').DataTable({
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
    <h1>List of SMS Providers</h1>
  </div>
  <div class="container tblwrap">
    <a href="<?php echo site_url('sms_provider/addedit'); ?>" class="btn btn-success add"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
    <div class="innerPanel">			
      <?php if($this->session->flashdata('flashInfo')): ?>
      <p class='flashMsg flashInfo'> <?php echo $this->session->flashdata('flashInfo'); ?> </p>
      <?php endif ?>
		</div>
		<table id="sms_provider_list" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Provider</th>
				<th>Type</th>
				<th>Count</th>			
				<th>Route</th>
				<th>Recharge Date</th>
				<th>Active?</th>			
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($sms_provider as $s){ ?>
			<tr>
				<td><?php echo $s['ID']; ?></td>
				<td><?php echo $s['Provider_Name']; ?></td>
				<td><?php echo $s['SMS_Type']; ?></td>
				<td><?php echo $s['SMS_Count']; ?></td>				
				<td><?php echo $s['Route']; ?></td>
				<td><?php echo convert_to_default_date($s['Recharge_Date']); ?></td>				
				<td><?php echo ($s['Is_Active'] == '1') ? 'Active':'Inactive'; ?></td>
				<td>
					<a href="<?php echo site_url('sms_provider/addedit/edit/'.$s['ID']); ?>" class="btn btn-info">Edit</a> 
					<a href="<?php echo site_url('sms_provider/remove/'.$s['ID']); ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php } ?>
      </tbody>
    </table>
  </div>
</div>