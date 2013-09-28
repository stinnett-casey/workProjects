<!DOCTYPE html>
<html>
	<head>
		<title>Calendar</title>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url('css/login.css') ?>>
		<link rel="stylesheet" type="text/css" href=<?php echo base_url('css/global.css') ?>>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src=<?php echo base_url('js/login.js') ?>></script>
	</head>
	<body>
		<div id="login_form">
		<h1>Login</h1>

			<?php
				echo form_open('login/validate_credentials');
				echo form_input_wplaceholder('email', 'Email');
				echo form_password_wplaceholder('password', 'Password');
				echo form_submit(array('name' => 'submit', 'class' => 'submit_button'), 'Submit');
				echo anchor('login/new_user', 'Create Account');
				echo form_close();
			?>
		</div>
		<p><?php 
			if($error){
				echo '<div id="login_error">'.$error.'</div>';
			}
			?>
		</p>
	</body>
</html>