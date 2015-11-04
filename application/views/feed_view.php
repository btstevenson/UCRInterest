<!DOCTYPE html>

    <ul class="thumbnails">
         <?php
			for( $i = 0; $i<count($imgs); $i++){
			?>
			 	<li class="span4">
					<a href="#" class="thumbnail">

	            		<img src= "<?php echo base_url($imgs[$i]); ?>"  alt="" >
	                    <h3><?php echo $titles[$i]; ?></h3>
	                    <p><?php echo $contents[$i]; ?></p>	

            		</a>
				</li>

        <?php
	        }
		?>
  	</ul>
