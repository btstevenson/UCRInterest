<!DOCTYPE html>

<html lang = "en">
<head>
	<meta charset="utf-8">
	<style> label{display: block;} .errors {color: red;} </style>
	<title>Registration</title>
</head>

<body>
	<h1>Registration</h1>
	<?php echo form_open('register/validation'); ?>
	
	<p>
		<?php echo form_label('Email:', 'email'); ?>
		<?php echo form_input('email', set_value('email'), 'id = email'); ?>
	</p>

	<p>
		<?php echo form_label('Username:', 'username'); ?>
		<?php echo form_input('username', set_value('username'), 'id = username'); ?>
	</p>

	<p>
		<?php echo form_label('Password:', 'password'); ?>
		<?php echo form_password('password', set_value('password'), 'id = password'); ?>
	</p>

	<p>
		<?php echo form_label('First Name:', 'first_name'); ?>
		<?php echo form_input('first_name', set_value('first_name'), 'id = first_name'); ?>
	</p>

	<p>
		<?php echo form_label('Last Name:', 'last_name'); ?>
		<?php echo form_input('last_name', set_value('last_name'), 'id = last_name'); ?>
	</p>

	<p>
		<?php echo form_label('DOB (YYYY-MM-DD):', 'DOB'); ?>
		<?php echo form_input('DOB', set_value('DOB'), 'id = DOB'); ?>
	</p>


	<p>
		<?php echo form_submit('submit', 'Register'); ?>
	</p>

	<?php echo form_close(); ?>

	<div class="errors"> <?php echo validation_errors(); ?> </div>
</body>
</html>