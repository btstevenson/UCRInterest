<!DOCTYPE html>
<script>
	a.thumbnail:hover {
	    text-decoration: none;
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
					<?php
					if($i % 6 == 5 && $i != 0)
					{
					?>
					 	<div class="container-fluid">
					<?php
					}
					?>
				<div class="row-fliud">
				 	<li class="span35" display:block>
				        <div class="thumbnail">
							<div class="caption">
                                <?php $this->load->view('template/pin_modal'); ?>
			            		<a href="#pin_modal" onclick="Big(<?php echo $this_pid[$i] ?>);" class="thumbnail" id="pop"> 
                                    <img src= "<?php echo base_url($imgs[$i]); ?>"  alt="" id="imgsource<?php echo $i ?>" > 
                                </a>
			                    <h3 id="imgtitle<?php echo $i ?>"><?php echo $titles[$i]; ?></h3>
			                    <p id="part<?php echo $i ?>" >
                                    <?php
			                     		echo substr($contents[$i], 0, 100)."..."; 
                                    ?>
                                </p>
                                <p  hidden id="imgcont<?php echo $i ?>">
                                    <?php
			                     		echo $contents[$i]; 
                                    ?>
                                </p>
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
			</div>
        <?php
        }
		?>
  	</ul>
