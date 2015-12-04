<body>
<div class="navbar navbar-static-top navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url('index.php/feed'); ?>">UCRInterest</a>
    <ul class="nav">
      <li><a href="<?php echo base_url('index.php/feed'); ?>">Feed</a></li>
      <li><a href="<?php echo base_url('index.php/profile/board'); ?>">Profile</a></li>
<!--      <li><a href="#">Link</a></li>-->
    <!-- </ul> -->
    <!-- Search Bar -->
    <!-- <ul> -->
      <li>
        <form class="navbar-form navbar-right" role="search" action="<?=site_url('user/search')?>" method="post">
                  <div class="input-group">
                      <input type="text" class="form-control" name="search_terms" placeholder="Search this site">
                      <span class="input-group-btn">
                             <button type="submit" class="btn btn-default">Go!</button>
                      </span>
                  </div>
              </form>
      </li>
    </ul>
    <!-- </ul> -->
    <a href="<?php echo base_url('index.php/profile/board'); ?>"> <img src= "<?php echo base_url($this->session->userdata('profile_pic')); ?>" class="img-circle" height="50" width="50" id ="profile_pic_main"></a>
        <!-- Button to trigger modal -->
    <a href="#post_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn">Make a post!</a>
    <?php $this->load->view('template/post_modal'); ?>
        
  </div>
  <div class="container">

    <div class="row">
      <div class="span9">
        <section>
          <h2><?php echo $meta_title; ?></h2>
        </section>
      </div>
      <div class="span3">
        <section>
          <?php
            if($this->session->userdata("global_notif"))
              echo anchor('notif', '<i class="icon-globe notification"></i>');
            else
              echo anchor('notif', '<i class="icon-globe"></i>');
            // if(count($friends_notif[0]) > 0)
            //   echo anchor('friends', '<i class="icon-user notification"></i>');
            // else
            //   echo anchor('friends', '<i class="icon-user"></i>');

            echo anchor('edit_profile', '<i class="icon-cog"></i>');
            echo anchor('user/logout', '<i class="icon-off"></i>');
          ?>
        </section>
      </div>
    </div>
  </div>
</div>
