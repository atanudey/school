<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--body panel starts -->
<div class="bodyPanel">
	<div class="loginPanelOuter">
		<h1>Login Success!</h1>
		<div>
			<?php $user = $this->session->userdata('user'); ?>
			<p>Hi <strong><?php echo $user->Name ?></strong>,</p>
			<p><h3>Welcome to Educare.</h3>	</p>
		</div>
	</div><!-- .loginPanelOuter -->
</div>
<!--body panel ends--> 