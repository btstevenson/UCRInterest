
    <style>
    #name {
    	background-color: blue;
    	color: white;
    	text-align: center;
    	padding: 50px;
    }
    #opener {
    	float: right;
    }
    #tabs{
    	background-color: grey;
    	text-align: center;
    }
    ul#list li{
    	display:inline;
    }
    * {
    box-sizing: border-box;
}
.row:after {
    content: "";
    clear: both;
    display: block;
}
[class*="col-"] {
    float: center;
    padding: 15px;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
html {
    font-family: "Lucida Sans", sans-serif;
}

.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color :#33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.menu li:hover {
    background-color: #0099cc;
}
<<<<<<< HEAD
#edit_profile
{
    position: absolute;
    left: 1000px;
    top: 200px;
}  
=======
>>>>>>> Williams-branch
</style>

    <div id="name">
	<?php if(isset($user_record)) : foreach($user_record as $row) : ?>
		<?php echo $row['first_name']; ?>
		<?php echo $row['last_name']; ?>
	<?php endforeach; ?>
	<?php else : ?>
		Not found
	<?php endif; ?>

	</div>
    <div>
        <a href="#post_modal" role="button" class="btn btn-danger" data-toggle="modal" id="post_btn1">Edit Profile</a>
  <?php $this->load->view('template/post_modal'); ?>
    </div>

	<div id = "tabs">
		<ul id = "list">
			<li>
				Boards
			</li>
			<li>
				Pins
			</li>
			<li>
				Likes
			</li>
			<li>
				Followers
			</li>
			<li>
				Followers
			</li>
			<li>
				Followingeres
			</li>
		</ul>
	</div>

    <div class = "row">
    </div>
	<div class = "col-3 menu">
		<ul>
			<li> Test </li>
			<li> Testing </li>
			<li> Tested </li>
		</ul>


<<<<<<< HEAD
<<<<<<< HEAD
	</div>
=======
	</div>
>>>>>>> origin/Williams-branch
=======
<<<<<<< HEAD
	</div>
=======
	</div>
>>>>>>> refs/remotes/origin/master
>>>>>>> Williams-branch
