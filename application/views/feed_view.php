<!DOCTYPE html>

	
<html lang = "en">
<head>
	<meta charset="utf-8">
	<style> label{display: block;} .errors {color: red;} </style>
	<title>Feed</title>
    
    <style>
		#wrapper {
			width: 100%;
			min-width: 200px;
			margin: 50px auto;
		}
		
		#columns {
			display: inline-block;
			-webkit-column-gap: 10px;
			-webkit-column-fill: auto;
			-moz-column-gap: 10px;
			-moz-column-fill: auto;
			column-gap: 15px;
			column-fill: auto;
		}
		
		.pin {
			display: inline-block;
			background: #FEFEFE;
			border: 2px solid #FAFAFA;
			box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
			margin: 0 2px 15px;
			-webkit-column-break-inside: avoid;
			-moz-column-break-inside: avoid;
			column-break-inside: avoid;
			padding: 15px;
			padding-bottom: 5px;
			background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
			opacity: 1;
			
			-webkit-transition: all .2s ease;
			-moz-transition: all .2s ease;
			-o-transition: all .2s ease;
			transition: all .2s ease;
		}
		
		.pin img {
			width: 100px;
			border-bottom: 1px solid #ccc;
			padding-bottom: 10px;
			margin-bottom: 5px;
		}
		
		.pin p {
			font: 12px/18px Arial, sans-serif;
			color: #333;
			margin: 0;
		}
		
		@media (min-width: 200px) {
			#columns {
				-webkit-column-count: 1;
				-moz-column-count: 1;
				column-count: 1;
			}
		}
		
	</style>
</head>

<body>
    <?php
	$data = array( $meta_title );
	$this->load->view('template/header', $data);
	$this->load->view('template/main_layout', $data);
    ?>
    
    <!-- <ul class="thumbnails">
    	
        <?php
        //foreach ($imgs as $img){
		for( $i = 0; $i<count($imgs); $i++){
		?>
			<li class="span4">
                <div class="thumbnail">
                    <img src= "<?php echo $imgs[$i]; ?>" data-src="holder.js/300x200" class="media-object"alt="" >
                    <h3><?php echo $titles[$i]; ?></h3>
                    <p><?php echo $contents[$i]; ?></p>
                </div>
			</li>
		
		<?php
        }
    	?>
	</ul> -->
    
    
    <div id="wrapper">
    	<div id="columns">
         <?php
        //foreach ($imgs as $img){
		for( $p = 0; $p<3; $p++){
		for( $i = 0; $i<count($imgs); $i++){
		?>
        	<div class="pin">
            	<img src= "<?php echo $imgs[$i]; ?>"  alt="" >
                    <h3><?php echo $titles[$i]; ?></h3>
                    <p><?php echo $contents[$i]; ?></p>	
        	</div>
        <?php
        }
		}
		?>
		</div>
	</div>
    
	
</body>
</html>