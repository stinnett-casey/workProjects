<!DOCTYPE html>
<html>
	<head>
		<title>Calendar</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<div id="login_form">
		<h1>Login</h1>
			<?php
				echo form_open('login/validate_credentials');
				echo form_input_wplaceholder('username', 'Username');
				echo form_password_wplaceholder('password', 'Password');
				echo form_submit('submit', 'Submit');
				echo anchor('login/new_user', 'Create Account');
			?>
		</div>
	</body>
</html>