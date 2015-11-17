<div class ="friends_view" style="border:solid" >
    <!-- 3 DIVS ONE FOR PENDING ON FOR FRINEDS ONE TO SEARCH-->
    
    <!-- DIV FOR SEARCHING NEW FRIENDS -->
    <div id="new_friends" style="border:solid;width:500px;float:right">
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
                        <?php echo form_open('friends/search', 'class="navbar-search pull-right"');
                            echo form_input('Search', '', 'placeholder="Find Friends" class="search-query'); ?> 
                        <?php form_close();?>
                    

                <!-- .nav, .navbar-search, .navbar-form, etc -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- DIV FOR DISPLAYING PENDING REQUESTS FROM USERS/ WILL ALSO INCLUDE NOTIFICATIONS OF NEW ONES    -->
    <div id="pending" >
        <?php
            for ($i = 0; $i < count($pending_list); $i ++)
            {
                echo $pending_list[$i];
                ?><br><?php
            }
        ?>
    </div>
    
    <!-- DIV FOR VIEWING CURRENT FRIENDS -->
    <div id="friends" style="border:solid">
        <?php
            for ($i = 0; $i < count($friends_list); $i ++)
            {
                echo $friends_list[$i];
            }
        ?>
    </div>
</div>
