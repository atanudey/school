Hi <?php echo $name ?>,
<br /><br />
To reset your password please click the link below and follow the instructions:
<br /><br />      
<?php echo base_url('user/reset/'. $user_id .'/'. $slug); ?>
<br /><br />  
If you did not request to reset your password then please just ignore this email and no changes will occur.
<br /><br />  
<strong>Note:</strong>&nbsp;This reset code will expire after <?php echo  date('j M Y'); ?>
<br /><br />
Thanks, <br/>
Team Educare