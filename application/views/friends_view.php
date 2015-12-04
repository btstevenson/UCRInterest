<div class ="friends_view">
    <!-- 3 DIVS ONE FOR PENDING ON FOR FRINEDS ONE TO SEARCH-->
    <!-- DIV FOR SEARCHING NEW FRIENDS -->
    <div class="row-fluid">
        <!--//========= DIV FOR DISPLAYING NOTIFICATIONS  ========-->
        <div id="notis" class="span8" >
            <h3>Latest Notifications</h3>
            <?php
                if(count($f_notif) == 0)
                {
            ?>
                    <p class="muted">No Recent Notifications.</p>
            <?php
                }
                for ($i = 0; $i < count($f_notif); $i++)
                {
                    ?>
                        <ul style="list-style-type:square">
                            <?php if($f_notif[$i]->type == "friend_req")
                            { ?>   
                            <li><?php echo $u_notif[$i]->first_name." ".$u_notif[$i]->last_name." sent you a friend request" ?> </li>
                            <?php } 
                            else { ?>
                            <li><?php echo $u_notif[$i]->first_name." ".$u_notif[$i]->last_name." accepted your request" ?> </li>
                            <?php } ?>
                        </ul>   
                    <?php
                }
            ?>
        </div> <!-- END NOTIS--> 
        
        <div id="new_friends" class="span4" >
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">

                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </a>
                    <!-- Be sure to leave the brand out there if you want it shown -->
                        <a class="brand" href="#" >Search for people</a>

                    <!-- Everything you want hidden at 940px or less, place within here -->
                        <div class="nav-collapse collapse">
                            <?php echo form_open('friends/search', 'class="navbar-search pull-left"');
                                echo form_input('Search', '', 'placeholder="Find Friends"'); ?> 
                            <?php form_close();?>
                    <!-- .nav, .navbar-search, .navbar-form, etc -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row-fluid">
        <!--//========= DIV FOR DISPLAYING PENDING REQUESTS FROM USERS ========-->
        <div id="pending" class="span8" >
            <h3>Pending Requests</h3>
            <?php
                if(count($pending_list) == 0)
                {
            ?>
                    <p class="muted">You dont have any friend requests.</p>
            <?php
                }
                for ($i = 0; $i < count($pending_list); $i ++)
                {
                    ?>
                        <ul class="media-list">
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="<?php echo base_url($pending_list[$i]->profile_pic); ?>" width="64" height="64">
                                </a>
                                <div class="media-body">
                                    <a href="$">
                                    <h4 class="media-heading">
                                        <?php echo $pending_list[$i]->first_name. " ". $pending_list[$i]->last_name;?>
                                    </h4>
                                    </a>
                                    <a href="friends/accept_friend/<?php echo $pending_list[$i]->fid ?>"> <button class="btn btn-primary">Accept</button> </a>
                                    <a href="friends/decline_friend/<?php echo $pending_list[$i]->fid ?>"> <button class="btn btn-danger">Decline</button> </a>  
                                </div>
                            </li>
                        </ul>   
                    <?php
                }
            ?>
        </div> <!-- END PENDING-->
    </div> <!-- END ROW -->
    <div class="row-fluid">
        <!-- DIV FOR VIEWING CURRENT FRIENDS -->
        <div id="friends">
            <h3>Friends</h3>
            <ul class="media-list">
            <?php
                for ($i = 0; $i < count($friends_list); $i ++)
                {
                    ?>
                        <!-- <a href="feed"> -->
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="<?php echo base_url($friends_list[$i]->profile_pic); ?>" width="64" height="64">
                                </a>
                                <div class="media-body">
                                    <a href="$">
                                    <h4 class="media-heading">
                                        <?php echo $friends_list[$i]->first_name." ".$friends_list[$i]->last_name;?>
                                    </h4>
                                    </a>    
                                </div>
                            </li>
                        <!-- </ul>    -->
                        <!-- </a> -->
                        
                    <?php
                }
            ?>
            </ul>
        </div>
    </div>
</div>
