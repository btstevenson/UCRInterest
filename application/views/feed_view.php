<!DOCTYPE html>

    <ul class="thumbnails">
    
         <?php
			for( $i = 0; $i<count($imgs); $i++){
		?>
				<div class="row-fliud">
				 	<li class="span4" display:block>
						<a href="#" class="thumbnail">

		            		<img src= "<?php echo base_url($imgs[$i]); ?>"  alt="" >
		                    <h3><?php echo $titles[$i]; ?></h3>
		                    <p><?php echo $contents[$i]; ?></p>
		                    <h6>By: <?php echo $first_name[$i]." ".$last_name[$i] ?></h6>

	            		</a>
					</li>
				</div>
        <?php
	        }
		?>
  	</ul>
