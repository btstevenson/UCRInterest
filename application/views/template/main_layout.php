<?php $this->load->view('template/header'); ?>

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
          <h2>Page Name</h2>
        </section>
      </div>
      <div class="span3">
        <section>
          <?php echo anchor('profile', '<i class="icon-user"></i> Profile'); ?> <br>
          <?php echo anchor('profile/logout', '<i class="icon-off"></i> Logout'); ?>
        </section>
      </div>
    </div>
  </div>
</div>    

<?php $this->load->view('template/footer'); ?>