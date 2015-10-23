<!DOCTYPE html>

<html lang = "en">
<head>
	<meta charset="utf-8">
	<style> label{display: block;} .errors {color: red;} </style>
	<title>Login</title>
</head>

<body>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
    </style>
	<p>
		<center>Profile page</center>
	</p>

	<div id="message" title="Post">
		<?php echo form_open('profile'); ?>
	
		<p>
			<?php echo form_label('Title:', 'title'); ?>
			<?php echo form_input('title', set_value('title'), 'id = title'); ?>
		</p>

		<p>
			<?php echo form_label('Picture:', 'pic'); ?>
			<?php echo form_upload('pic', set_value('pic'), 'id = pic'); ?>
		</p>

		<?php
			$data = array(
		        'name'          => 'content',
		        'id'            => 'content',
		        'value'         => 'Content',
		        'maxlength'     => '100',
		        'size'          => '500',
		        'style'         => 'padding: 20px 10px; line-height: 20px;'
		        // 'style'         => 'width:50%'

	        );
			echo form_label('Content:', 'content');
			echo form_input($data);

        ?>

<!-- 		<p>
			<?php echo form_label('Content:', 'content'); ?>
			<?php echo form_input('content', set_value('Content'), 'id = content, size = 200, style = width:50%'); ?>

		</p>
 -->
		<p>
			<?php echo validation_errors(); ?>
		</p>

		<?php echo form_close(); ?>
	</div>
	<button id="opener">Post!</button>
	<script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>

    <script type="text/javascript">
    	$("#message").dialog({
    		autoOpen: false,
    		height: 500,
    		width: 650,
    		modal: true,
    		show: {
    			effect: "fade",
    			duration: 700
    		},
    		hide: {
    			effect: "fade",
    			duration: 700
    		},
    		buttons: {
    			Cancel: function(){
    				$(this).dialog('close');
    			},
    			'Post': function(){
    				alert('Your message has been posted');
    				var val_errors = "<?php echo validation_errors(); ?>";
    				$(this).dialog('close');
    				if(val_errors.val().length() == 0)
    				{
	    				alert('Your message has been posted');
	    				// There is no errors so close
    				}
    				else
    				{
    					// output validation errors
    				}
    			}
    		}
    	});
    	$("#opener").on('click', function(){
    		$("#message").dialog("open");
    	})
    </script>
</body>
</html>

