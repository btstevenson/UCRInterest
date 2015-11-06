<style> .errors {color: red;} </style>

<div class="modal-header">
	<h1>Change Your Password</h1>
</div>
	
<div class="modal-body">
	<!-- Login for user enters EMAIL and PASSWORD -->
	<div class="errors"> <?php echo validation_errors(); ?> </div>
	<?php echo form_open(); ?>
	
	<table class="table">
		<tr>
			<td>
				Old Password: 
			</td>
			<td>
				<?php echo form_password('old_password', '', 'id = old_password'); ?>
			</td>
		</tr>

		<tr>
			<td>New Password:</td>
			<td>
				<?php echo form_password('new_password', '', 'id = new_password'); ?>
			</td>
		</tr>

		<tr>
			<td>Confirm Password:</td>
			<td>
				<?php echo form_password('c_password', '', 'id = c_password'); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
                <?php echo form_submit('pass_edit', 'Cancel', 'class="btn btn-danger"'); ?>

				<?php echo form_submit('pass_edit', 'Change Password', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>
</html>