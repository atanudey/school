<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Login success!</h1>
			</div>
			<?php $user = $this->session->userdata('user'); ?>
			<p>Hi <strong><?php echo $user->Name ?></strong>,</p>
			<p><h3>Welcome to Educare.</h3>	</p>
		</div>
	</div><!-- .row -->
</div><!-- .container -->