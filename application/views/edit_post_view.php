	<style> .errors {color: red;} </style>

	<div class="modal-body">
		<div class="errors"> <?php echo validation_errors(); ?> </div>
		<?php echo form_open(); ?>
		
		<ul style="list-style-type: none">
		<center>
	        <li>
		        <p>
		        	Title:
				    <?php echo form_textarea('title', set_value('title', $title), 'id=p_title rows="5"'); ?>
			    </p>
			</li>
		</center>
		
		<center>
			<li>
		        <p>
		        	<img width="500" src="<?php echo $pic_dir; ?>" class="img-rounded">
			    </p>
			</li>
		</center>
      
      	<center>
	        <li>
	        	<p>
	        		Content:
	        		<?php
			            $data = array(
			                  'name'          => 'content',
			                  'id'            => 'content',
			                  'class'     => 'text ui-widget-content ui-corner-all',
			                  'rows'        => '7',
			                  'cols'          => '50',
			                  'placeholder' => 'Content'
			                );
			            
			            echo form_textarea('content', set_value('content', $content), "class=span8");
			        ?>
	        	</p>
	        </li>
        </center>
        <center>
        	<?php echo form_submit('edit_post', 'Delete Post', 'class="btn btn-danger"'); ?>

        	<?php echo form_submit('edit_post', 'Edit Post!', 'class="btn btn-primary"'); ?>
        </center>
		<?php echo form_close(); ?>
	</div>
