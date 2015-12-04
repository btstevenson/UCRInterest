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


    <script type="text/javascript">
            
    </script>
    
    <ul class="thumbnails">


         <?php
		 	$imgs = array_reverse($imgs);
		 	$this_pid = array_reverse($this_pid);
			$titles = array_reverse($titles);
			$contents = array_reverse($contents);
			$first_name = array_reverse($first_name);
			$last_name = array_reverse($last_name);
			$uid = array_reverse($uid);
			$label = array_reverse($label);
            $board_record = array_reverse($boards);
            $data = array();

			for( $i = 0; $i<count($imgs); $i++){//$i = count($imgs) - 1; $i >= 0; $i--){
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
                                <?php $this->load->view('template/pin_modal'); ?>
                                <!--<a onclick="Big(<?php echo $this_pid[$i] ?>);" class="thumbnail" id="pop"> -->
			            		<a href="#pin_modal" onclick="Big(<?php echo $this_pid[$i] ?>, <?php echo $my_uid; ?> );" class="thumbnail" id="pop"> 
                                    <div class="crop">
                                    <img src= "<?php echo base_url($imgs[$i]); ?>"  alt="" id="imgsource<?php echo $this_pid[$i]?>" > 
                                    </div>
                                </a>
			                    <h3 id="imgtitle<?php echo $this_pid[$i]?>"><?php echo $titles[$i]; ?></h3>
			                    <p id="part<?php echo $i ?>" >
                                    <?php
			                     		echo substr($contents[$i], 0, 100)."..."; 
                                    ?>
                                </p>
                                
                               	<p id="imglabel<?php echo $this_pid[$i] ?>">
                                	<?php echo $label[$i] ?>
                                </p>
                                
                                <p  hidden id="imgcont<?php echo $this_pid[$i] ?>">
                                    <?php
			                     		echo $contents[$i]; 
                                    ?>
                                </p>
			                    <h6>By: <?php echo $first_name[$i]." ".$last_name[$i] ?></h6>

		                    
		        			   <p>
                                    <a href="#pin_board_modal" data-id="<?=$this_pid[$i]?>" class="open-pin_board_modal btn btn-danger btn-block" role="button">Pin!</a>
                                    <?php $this->load->view('template/pin_board_modal'); ?>
			                    </p>

	                		<?php
	                			if($uid[$i] == $my_uid)
	                			{
	                		?>
	                				<p>
			                    		<a href="post/edit_post/<?php echo $this_pid[$i] ?>" class="btn btn-block" role="button">Edit Post</a>
			                    	</p>
			                <?php
	                			}
	            			?>
            				</div>
	            		</div>
					</li>
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
<script type="text/javascript">
$(document).on("click", ".open-pin_board_modal", function (e) {

    e.preventDefault();

    var _self = $(this);

    var pid = _self.data('id');
    $("#pid").val(pid);
    
    $('#pin_board_modal').modal('show');
});
</script>