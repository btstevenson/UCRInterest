<!DOCTYPE html>
<div class="row-fluid">
    <div class="span8">
    <ul class="thumbnails">
     <?php
        for( $i = 0; $i<count($uid); $i++)
        {
    ?>
            <div>
                <?php
                if($i % 3 == 2 && $i != 0)
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

                            <h3 id="pername"><?php echo $first_name[$i]." ".$last_name[$i] ; ?></h3>

                            <p  hidden id="imgcont"> <?php echo $username[$i]; ?></p>
                            </a>
                        </div>
                        <?php
                        $nuu = FALSE;
            //============================ ACCEPT DECLINE FROM USER WHO SENT YOU REQUESTS ===================
                        for ($j =0; $j < count($frespond); $j++)
                        {

                            if ($uid[$i] == $frespond[$j])
                            {
                                $nuu = TRUE;
                        ?>
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-body">
                                            <a href="friends/accept_friend/<?php echo $fid[$j] ?>"> <button class="btn btn-primary btn-block">Accept</button> </a>
                                            <a href="friends/decline_friend/<?php echo $fid[$j] ?>"> <button class="btn btn-danger btn-block">Decline</button> </a>  
                                        </div>
                                    </li>
                                </ul>  
                        <?php
                            }                             
                        }
            //============================ USERS YOU SENT REQ ===================
                        for ($j =0; $j < count($fsent); $j++)
                        {

                            if ($uid[$i] == $fsent[$j])
                            {
                                $nuu = TRUE;
                        ?>
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-body">
                                            <p class="btn btn-inverse btn-block disabled">SENT</p>
                                        </div>
                                    </li>
                                </ul>  
                        <?php
                            }                             
                        }
            //=========================== FRIENDS =================================
                        for ($j =0; $j < count($fuid); $j++)
                        {

                            if ($uid[$i] == $fuid[$j])
                            {
                                $nuu = TRUE;
                            }                             
                        }

            //========================= USERS WHO DONT HAVE A RELATION TO YOU YET ================================
                        if (!$nuu )
                        {
                        ?>
                            <ul class="media-list">
                                    <li class="media">
                                        <div class="media-body">
                                            <a href="send_friend/<?php echo $uid[$i] ?>"> <button class="btn btn-success btn-block">Send Request</button> </a>
                                        </div>
                                    </li>
                                </ul>
                        <?php
                        }
                        ?>

                    </div>
                </li>
            </div>
                <?php
            if($i % 3 == 2 && $i != 0)
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
    </div>
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
