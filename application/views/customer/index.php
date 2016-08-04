<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">			
			<div class="pull-right">
				<a href="<?php echo site_url('customer/add'); ?>" class="btn btn-success">Add</a> 
			</div>

			<table class="table table-striped table-bordered">
				<tr>
					<td>CustomerNumber</td>
					<td>CustomerName</td>
					<td>ContactLastName</td>
					<td>ContactFirstName</td>
					<td>Phone</td>
					<td>AddressLine1</td>
					<td>AddressLine2</td>
					<td>City</td>
					<td>State</td>
					<td>PostalCode</td>
					<td>Country</td>
					<td>SalesRepEmployeeNumber</td>
					<td>CreditLimit</td>
					<td>Actions</td>
				</tr>
				<?php foreach($customers as $c): ?>
				<tr>
					<td><?php echo $c['customerNumber']; ?></td>
					<td><?php echo $c['customerName']; ?></td>
					<td><?php echo $c['contactLastName']; ?></td>
					<td><?php echo $c['contactFirstName']; ?></td>
					<td><?php echo $c['phone']; ?></td>
					<td><?php echo $c['addressLine1']; ?></td>
					<td><?php echo $c['addressLine2']; ?></td>
					<td><?php echo $c['city']; ?></td>
					<td><?php echo $c['state']; ?></td>
					<td><?php echo $c['postalCode']; ?></td>
					<td><?php echo $c['country']; ?></td>
					<td><?php echo $c['salesRepEmployeeNumber']; ?></td>
					<td><?php echo $c['creditLimit']; ?></td>
					<td>
						<a href="<?php echo site_url('customer/edit/'.$c['customerNumber']); ?>" class="btn btn-info">Edit</a> 
						<a href="<?php echo site_url('customer/remove/'.$c['customerNumber']); ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>