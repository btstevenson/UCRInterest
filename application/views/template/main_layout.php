<body>
<div class="navbar navbar-static-top navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url('index.php/Welcome'); ?>">UCRInterest</a>
    <ul class="nav">
      <li class="active"><a href="<?php echo base_url('index.php/feed'); ?>">Feed</a></li>
      <li><a href="<?php echo base_url('index.php/profile/board'); ?>">Profile</a></li>
<!--      <li><a href="#">Link</a></li>-->
    </ul>
    <!-- Search Bar -->
    <ul>
      <form class="navbar-form navbar-right" role="search" action="<?=site_url('user/search')?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_terms" placeholder="Search this site">
                    <span class="input-group-btn">
                           <button type="submit" class="btn btn-default">Go!</button>
                    </span>
                </div>
            </form>
    </ul>

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
          <?php echo anchor('edit_profile', '<i class="icon-user"></i> Edit Profile'); ?> <br>
          <?php echo anchor('user/logout', '<i class="icon-off"></i> Logout'); ?>
        </section>
      </div>
    </div>
  </div>
</div>



