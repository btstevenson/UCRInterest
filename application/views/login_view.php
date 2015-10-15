<!DOCTYPE html>

<html lang = "en">
<head>
	<meta charset="utf-8">
	<style> label{display: block;} .errors {color: red;} </style>
	<title>Login</title>
</head>

<body>
	<h1>Login</h1>

	<!-- Login for user enters EMAIL and PASSWORD -->
	<?php echo form_open('login/validation'); ?>
	
	<p>
		<?php echo form_label('Email:', 'email'); ?>
		<?php echo form_input('email', set_value('email'), 'id = email'); ?>
	</p>

	<p>
		<?php echo form_label('Password:', 'password'); ?>
		<?php echo form_password('password', set_value('password'), 'id = password'); ?>
	</p>
	<p>
		<?php echo form_submit('submit', 'Login'); ?>
	</p>

	<?php echo form_close(); ?>

	<div class="errors"> <?php echo validation_errors(); ?> </div>
</body>
</html>