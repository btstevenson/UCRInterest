<style> .errors {color: red;} </style>

<div class="modal-header">
	<p>Please enter your information</p>
</div>

<div class="errors"> <?php echo validation_errors(); ?> </div>
	
	<?php echo form_open(); ?>
	<table class="table">
		<tr>
			<td>Email</td>
			<td>
				<?php echo form_input('email', set_value('email',$email), 'id=email'); ?>
			</td>
		</tr>

		<tr>
			<td>Username</td>
			<td>
				<?php echo form_input('username', set_value('username', $username), 'id = username'); ?>
			</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>
				<?php echo form_password('password', $password, 'id = password'); ?>
			</td>
		</tr>

		<tr>
			<td>First Name</td>
			<td>
				<?php echo form_input('first_name', $first_name, 'id = first_name'); ?>
			</td>
		</tr>

		<tr>
			<td>Last Name</td>
			<td>
				<?php echo form_input('last_name', $last_name, 'id = last_name'); ?>
			</td>
		</tr>
			
		<tr>
			<td>DOB (YYYY-MM-DD)</td>
			<td>
				<?php echo form_input('DOB', $DOB, 'id = DOB'); ?>
			</td>
		</tr>
		<tr>
			<td>About You</td>
			<td>
				<?php echo form_textarea('about_you', $about_you, 'id = about_you'); ?>
			</td>
		</tr>
		<tr>
			<td>Location</td>
			<td>
				<?php echo form_input('Location', $location, 'id = Location'); ?>
			</td>
		</tr>
		<tr>
			<td>Website</td>
			<td>
				<?php echo form_input('about_you', $website, 'id = website'); ?>
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<?php echo form_submit('submit', 'Update Profile', 'class="btn btn-primary"'); ?>
			</td>
		</tr>
	<?php echo form_close(); ?>

	</table>

