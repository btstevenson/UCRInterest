<style> .errors {color: red;} </style>

<div class="modal-header">
	<h1>Log in</h1>
	<p>Please enter your credentials</p>
</div>
	
<div class="modal-body">
	<!-- Login for user enters EMAIL and PASSWORD -->
	<div class="errors"> <?php echo validation_errors(); ?> </div>
	<?php echo form_open(); ?>
	
	<table class="table">
		<tr>
			<td>
				Email: 
			</td>
			<td>
				<?php echo form_input('email', set_value('email'), 'id = email'); ?>
			</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>
				<?php echo form_password('password', set_value('password'), 'id = password'); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<?php echo form_submit('submit', 'Login', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>
</html>