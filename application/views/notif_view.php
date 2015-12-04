<div class ="notif_view">
    <!-- DIV FOR SEARCHING NEW FRIENDS -->
    <div class="row-fluid">
        <!--//========= DIV FOR DISPLAYING PENDING REQUESTS FROM USERS/ WILL ALSO INCLUDE NOTIFICATIONS OF NEW ONES ========-->
        <div id="notif" class="span8" >
            <h3>Notifications</h3>
            <?php
                if(count($global_list) == 0)
                {
            ?>
                    <p class="muted">You dont have any recent notifications.</p>
            <?php
                }
                else
                {
                    for ($i = 0; $i < count($global_list); $i++)
                    {
                        ?>
                        <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="<?php echo base_url($post_list[$i]->pic_dir); ?>" width="64" height="64">
                                    </a>
                                    <div class="media-body">
                                        <a href="$">
                                        <h4 class="media-heading">
                                            <?php echo $user_list[$i]->first_name. " ". $user_list[$i]->last_name;?>
                                        </h4>
                                        <?php if($global_list[$i]->type == "comment" )?>
<<<<<<< HEAD
                                        <p><?php echo $global_list[$i]->content?> </p>
=======
                                            <p><?php echo $global_list[$i]->content?> </p>
>>>>>>> refs/remotes/origin/master
                                        </a>
                                    </div>
                                </li>
                            </ul>   
                        <?php
                    }
                }
            ?>
        </div>
    </div> <!-- END ROW -->
</div>
