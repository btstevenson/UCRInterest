<style>
  .errors {
    color: red;
  } 
</style>

<div class="modal-header">
  <h1>
    Register!
  </h1>
  <p>
    Please enter your information
  </p>
</div>

<div class="modal-body">
  <div class="errors">
    
    <?php echo validation_errors(); ?>
    
  </div>
  
  <?php echo form_open(); ?>
  <table class="table">
    <tr>
      <td>
        Email
      </td>
      <td>
        <?php echo form_input('email', set_value('email'), 'id = email'); ?>
      </td>
    </tr>
    
    <tr>
      <td>
        Username
      </td>
      <td>
        <?php echo form_input('username', set_value('username'), 'id = username'); ?>
      </td>
    </tr>
    
    <tr>
      <td>
        Password
      </td>
      <td>
        <?php echo form_password('password', set_value('password'), 'id = password'); ?>
      </td>
    </tr>
    
    <tr>
      <td>
        First Name
      </td>
      <td>
        <?php echo form_input('first_name', set_value('first_name'), 'id = first_name'); ?>
      </td>
    </tr>
    
    <tr>
      <td>
        Last Name
      </td>
      <td>
        <?php echo form_input('last_name', set_value('last_name'), 'id = last_name'); ?>
      </td>
    </tr>
    
    <tr>
      <td>
        DOB (YYYY-MM-DD)
      </td>
      <td>
        <?php echo form_input('DOB', set_value('DOB'), 'id = DOB'); ?>
      </td>
    </tr>
    
    <tr>
      <td>
        Interests
      </td>
      <td>
      
		<?php
        for( $i = 0; $i<count($interests); $i++){ 
		
			$data = array(
				'name'          => "interests[]",
		        'id'            => $interests[$i],
		        'value'         => $interests[$i],
		        'checked'       => FALSE,
		        'style'         => 'margin:0px'
			);         
		   echo form_checkbox( $data);// 'interests[]', 'accept', FALSE);
		   echo $interestLabels[$i];echo "<br>";
        }
		?>
	  </td>
	</tr>
    
    
    <tr>
      <td>
        <?php echo form_submit('submit', 'Register', 'class="btn btn-primary"'); ?>
      </td>
    </tr>
</table>

<?php echo form_close(); ?>
</div>
</html>