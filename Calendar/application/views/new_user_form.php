<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Create an account</h1>		
		<fieldset>
			<legend>Personal Information</legend>

			<?php
				echo form_open('login/create_member');
				echo form_input('first_name', set_value('first_name', 'First Name'));
				echo form_input('last_name', set_value('last_name', 'Last Name'));
				echo form_input('email', set_value('email', 'Email'));
				echo form_password_wplaceholder('password', set_value('password', 'Password'));
				echo form_password_wplaceholder('password_confirm', set_value('password_confirm', 'Confirm Password'));
				echo form_submit('submit', 'Create Account');
			?>


			<?php
				echo form_validation->set_rules('first_name', 'First name', 'required');
				echo form_validation->set_rules('last_name', 'Last name', 'required');
				echo form_validation->set_rules('email', 'Email', 'required');
				echo form_validation->set_rules('password', 'Password', 'required');
				echo form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');
			?>

		</fieldset>
	</body>
</html>