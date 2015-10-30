<!DOCTYPE html>

<html lang = "en">
<head>
	<meta charset="utf-8">
	<style> label{display: block;} .errors {color: red;} </style>
	<title>Feed</title>
</head>

<body>
	<h1>Feed</h1>
    <?php
    foreach ($imgs as $img){
				echo "<img src=\"";
				echo $img;
				echo "\" width=100 height=100  />\n";
	}
    ?>
	
</body>
</html>