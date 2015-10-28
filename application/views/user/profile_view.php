<!DOCTYPE html>

<html lang = "en">
<head>

	<meta charset="utf-8">
	<style>
	
	</style>
	<title>Login</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>


	<script type="text/javascript">
	$(function()
	{
	    var dialog, form,
	      title, picture,
	      allFields = $( [] ).add(title).add(picture),
	      tips = $( ".validateTips" );


	    function updateTips( t ) {
	      tips
	        .text( t )
	        .addClass( "ui-state-highlight" );
	      setTimeout(function() {
	        tips.removeClass( "ui-state-highlight", 1500 );
	      }, 500 );
	    }
	 
	    function checkLength( o, n, min, max ) {
	      if ( o.length > max || o.length < min ) {
	      	// alert("Length of " + n + " must be between " +
	       //    min + " and " + max + " characters.");
	        o.addClass( "ui-state-error" );
	        updateTips( "Length of " + n + " must be between " +
	          min + " and " + max + "." );
	        return false;
	      } else {
	        return true;
	      }
	    }
	 
	    function makePost() {
	      var valid = true;
	      title = $('#title').val();
	      picture = $('#content').val();
	      allFields.removeClass( "ui-state-error" );

	      valid = valid && checkLength( title, "title", 1, 25 );
	      valid = valid && checkLength( picture, "content", 0, 200 );
	      if(valid)
	      {
			dialog.dialog('close'); 
    	  }

	      return valid;
	    }

    	dialog = $("#message").dialog({
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
    			Cancel: function()
    			{
    				dialog.dialog('close');
    			},
    			'Post': makePost
    		}
    	});

    	form = dialog.find( "form" ).on( "submit", function( event ) {
	    	event.preventDefault();
	    	makePost();
		});

        $("#postButton").button().on('click', function(){
    		dialog.dialog("open");
    	});
    });
	</script>
</head>

<body>
	<p>
		<center>Profile page</center>
	</p>

	<div id="message" title="Post">
		<?php echo form_open(); ?>
		<p>
			<?php echo form_label('Title:', 'title'); ?>
			<?php echo form_input('title', set_value('title'), 'id = title', 'class=text ui-widget-content ui-corner-all'); ?>
		</p>

		<p>
			<?php echo form_label('Picture:', 'pic'); ?>
			<?php echo form_upload('pic', set_value('pic'), 'id = pic'); ?>
		</p>

		<?php
			$data = array(
		        'name'          => 'content',
		        'id'            => 'content',
		        'class'			=> 'text ui-widget-content ui-corner-all',
		        'rows'		    => '7',
		        'cols'          => '65',
		        'placeholder'	=> 'Content'
	        );
			echo form_label('Content:', 'content');
			echo form_textarea($data);

        ?>
        <?php echo form_submit('submit', 'Post!', 'id=submit'); ?>
        <?php echo form_close(); ?>
	</div>
	<script type="text/javascript">
		$('#submit').on('click', function(){
			return false;
		});
	</script>
	<button id="postButton">Post!</button>
</body>
</html>

