<?php $this->load->view('template/header'); ?>

<body style="background: #555;">

<div class="modal show" role="dialog">
	<?php 
		$interests = array("Popular","Everything","Gifts","Videos","Animals and pets","Architecture","Art","Cars and motorcycles","Celebrities","Design","DIY and crafts","Education","Film, music and books","Food and drink","Gardening","Geek","Hair and beauty","Health and fitness","History","Holidays and events","Home decor","Humor","Illustrations and posters","Kids and parenting","Mens fashion","Outdoors","Photography","Products","Quotes","Science and nature","Sports","Tattoos","Technology","Travel","Weddings","Womens fashion");
		$interestLabels = array("Popular","Everything","Gifts","Videos","Animals and pets","Architecture","Art","Cars and motorcycles","Celebrities","Design","DIY and crafts","Education","Film, music and books","Food and drink","Gardening","Geek","Hair and beauty","Health and fitness","History","Holidays and events","Home decor","Humor","Illustrations and posters","Kids and parenting","Men's fashion","Outdoors","Photography","Products","Quotes","Science and nature","Sports","Tattoos","Technology","Travel","Weddings","Women's fashion");
		$data = array('interests' => $interests, 'interestLabels' => $interestLabels);
		//if($subview == 'user/registration_view'){
			$this->load->view($subview, $data); //subview is set in controller 
		//}else{	
		//	$this->load->view($subview); //subview is set in controller 
		//}
	
	
	
	
	?>
	
	<div class="modal-footer">
		&copy; <?php echo $meta_title; ?>
	</div>
</div>

<?php $this->load->view('template/footer'); ?>