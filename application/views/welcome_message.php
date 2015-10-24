<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to UCRinterest!</title>

	
</head>
<body>

<div id="container">
	<h1>UCRinterest</h1>

	<div id="body">
		<p>To login to UCRinterest, Click <?php echo anchor('login', 'here'); ?> </p>
		<p>Not Registered? Click <?php echo anchor('register', 'here'); ?> </p>

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

</body>
</html>