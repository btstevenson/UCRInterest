<!DOCTYPE html>
	<?php
	$new_pid = 0;
	function make_pin()
	{

	}
?>

    <ul class="thumbnails">
    
         <?php
			for( $i = 0; $i<count($imgs); $i++){
		?>
				<div class="row-fliud">
				 	<li class="span4" display:block>
						<a class="thumbnail">

		            		<img src= "<?php echo base_url($imgs[$i]); ?>"  alt="" >
		                    <h3><?php echo $titles[$i]; ?></h3>
		                    <p><?php echo $contents[$i]; ?></p>
		                    <h6>By: <?php echo $first_name[$i]." ".$last_name[$i] ?></h6>

	                    <?php
	                    	$pinned = false;
		                    for($j = 0; $j < count($pins); $j++)
		                    {
		                    	if($pins[$j] == $this_pid[i])
		                    	{
		                    		$pinned = true;
	                    		}
	                    	}
	                    	if($pinned)
	                    	{
                		?>
	                    		<input class="btn btn-danger btn-block" type="submit" value="unPin!">
                		<?php
                			}
                			else
                			{
                				$new_pid = $this_pid[$i];
        				?>
                				<input class="btn btn-block" type="submit" value="Pin!" onclick="make_pin();">
                		<?php
                			}
            			?>

	            		</a>
					</li>
				</div>
        <?php
	        }
		?>
  	</ul>
