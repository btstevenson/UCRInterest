<style type="text/css">
body.welcome {
		background-image: url("http://www.pipeband.ucr.edu/graphics/UCR_tartan2.jpg"); 
		background-color: #FFFFFF;
		margin: 0 auto;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		}
#container.well {
		margin: auto;
 		position: absolute;
 		left: 0; right: 0;
 		top:100px;
		width: 40%;
		text-align: center;
		font-size: 2vw;
}
h1{
	font-size: 3vw;
}
</style>
<body class="welcome">
<div id="container" class="well">
	<h1>UCRinterest</h1>

	<div id="body">
		<p>To login to UCRinterest, Click <?php echo anchor('user/login', 'here'); ?> </p>
		<p>Not Registered? Click <?php echo anchor('user/register', 'here'); ?> </p>
		<?php
			$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );

			
		?>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>