<style>
  #post_btn
  {
    position: absolute;
    left: 1000px;
    top: 5px;
  }  
</style>
<body>
<div class="navbar navbar-static-top navbar-inverse">
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url('index.php/Welcome'); ?>">UCRInterest</a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Profile</a></li>
      <li><a href="#">Link</a></li>
    </ul>
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
          <?php echo anchor('profile', '<i class="icon-user"></i> Profile'); ?> <br>
          <?php echo anchor('user/logout', '<i class="icon-off"></i> Logout'); ?>
        </section>
      </div>
    </div>
  </div>
</div>
<!-- Button to trigger modal -->
  <a href="#post_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn">Make a post!</a>
  <?php $this->load->view('template/post_modal'); ?>
