<div class="modal-header">
	<p>Please enter your information</p>
</div>

<div> <?php echo validation_errors(); ?> </div>
	<?php echo form_open_multipart("edit_profile"); ?>
	<table class="table">
		<tr>
			<td>Profile Picture</td>
			<td>
				<?php  
				if($profile_pic != "")
				{
				?>
					<img src= "<?php echo base_url($profile_pic); ?>" class="img-circle" height="100" width="100">
				<?php
				}
				else
				{
				?>
					<img src= "<?php echo base_url('assets/img/standard.jpg'); ?>" class="img-circle" height="100" width="100">
				<?php
				}
				?>
				<p><?php echo form_upload('pic_dir', '', 'id=pic'); ?></p>
			</td>
		</tr>

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
				<?php echo form_input('website', $website, 'id = website'); ?>
			</td>
		</tr>

		<tr>
		<tr>
			<td>Nick Name</td>
			<td>
				<?php echo form_input('nick_name', $nick_name, 'id = nick_name'); ?>
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