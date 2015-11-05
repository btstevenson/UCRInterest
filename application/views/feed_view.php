<!DOCTYPE html>
	<?php
	$new_pid = 0;
	function make_pin()
	{
		redirect('profile');
	}
?>

<script>
	a.thumbnail:hover {
	    text-decoration: none;
	}
</script>

    <ul class="thumbnails">
    
         <?php
			for( $i = 0; $i<count($imgs); $i++){
		?>
				<div class="row-fliud">
				 	<li class="span4" display:block>
						<div class="thumbnail">
							<div class="caption">
			            		<a href="#" class="thumbnail"> <img src= "<?php echo base_url($imgs[$i]); ?>"  alt="" > </a>
			                    <h3><?php echo $titles[$i]; ?></h3>
			                    <p><?php
			                     		echo substr($contents[$i], 0, 100)."..."; ?></p>
			                    <h6>By: <?php echo $first_name[$i]." ".$last_name[$i] ?></h6>

		                    <?php
		                    	$pinned = false;
			                    for($j = 0; $j < count($pins); $j++)
			                    {
			                    	if($pins[$j] == $this_pid[$i])
			                    	{
			                    		$pinned = true;
		                    		}
		                    	}
		                    	if($pinned)
		                    	{
	                		?>
	                				<p>
			                    		<a href="feed/un_pin/<?php echo $this_pid[$i] ?>" class="btn btn-block" role="button">unPin!</a>
		                    		</p>
	                		<?php
	                			}
	                			else
	                			{
	        				?>
		        					<p>
			                    		<a href="feed/make_pin/<?php echo $this_pid[$i] ?>" class="btn btn-danger btn-block" role="button">Pin!</a>
			                    	</p>

	                		<?php
	                			}
	            			?>
            				</div>
	            		</div>
					</li>
				</div>
        <?php
	        }
		?>
  	</ul>
