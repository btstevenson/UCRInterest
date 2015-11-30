<!DOCTYPE html>
<!--
<style>
    .crop
    {
        width: 200px;
        height: 200px;
        overflow: hidden;
    }
    .crop img
    {
        width: 200px;
        height: 200px;
    }
</style>
-->
    <ul class="thumbnails">


         <?php
			for( $i = 0; $i<count($uid); $i++)
            {
		?>
				<div>
					<?php
					if($i % 4 == 3 && $i != 0)
					{
					?>
					 	<div class="container-fluid">
					<?php
					}
					?>
				<div>
				 	<li class="span4" display:block>
				        <div class="thumbnail">
							<div class="caption">
			            		<a href="#"> <!-- REDIRECT TO USER PROFILE PASS IN UID--> 
                                    <div class="crop">
                                    <img src= "<?php echo base_url($pic_dir[$i]); ?>"  alt="" id="persource" > 
                                    </div>
                                </a>
			                    <h3 id="pername"><?php echo $first_name[$i]." ".$last_name[$i] ; ?></h3>
                                
                                <p  hidden id="imgcont"> <?php echo $username[$i]; ?></p>
            				</div>
                            <?php
                            for ($j =0; $j < count($fuid); $j++)
                            {
                                if ($uid[$i] == $fuid[$j])
                                {
                                    echo $fuid[$i];
                                }
                                                          
                            }
                            ?>
                            
	            		</div>
					</li>
                </div>
					<?php
				if($i % 4 == 3 && $i != 0)
				{
				?>
				 	</div>
				<?php
				}
				?>
				</div>
        <?php
        }
		?>
  	</ul>
