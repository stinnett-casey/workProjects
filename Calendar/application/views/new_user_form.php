<!DOCTYPE html>
<html>
	<head>
		<title>Create an Account</title>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url('css/new_user_form.css')?>>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url('css/global.css')?>>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
		$(function(){
			$('[name=first_name]').focus();
		});
		</script>
	</head>
	<body>
		<h1>Create an account</h1>		
		<fieldset id="new_user_form">
			<legend>Personal Information</legend>
			<?php 
				echo form_open('login/create_member');
				echo '<label>First Name</label>';
				echo form_input('first_name', set_value('first_name', 'First Name'));
				echo '<label>Last Name</label>';
				echo form_input('last_name', set_value('last_name', 'Last Name'));
				echo '<label>Email</label>';
				echo form_input('email', set_value('email', 'Email'));
				echo '<label>Password</label>';
				echo form_password('password', set_value('password', 'Password'));
				echo '<label>Confirm Password</label>';
				echo form_password('password_confirm', set_value('password_confirm', 'Confirm Password'));
				echo form_submit(array('name' => 'submit', 'class' => 'submit_button', 'id' => 'smaller_button'), 'Create Account');
			?>
		</fieldset>
		<p><?php echo validation_errors(); ?></p>
	</body>
</html>