<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/user/profile_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements//css/bootstrap.min.css"/>
	<script src="<?php echo site_url(); ?>site_elements//js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements//jquery/jquery-1.11.3.min.js"></script>

</head>
<body>
	<div class="container-fluid" id="main">
    	<div id="left_nav">
    	

    		<div class="list-group" id="nav_op">
			  <a href="deshboard" class="list-group-item <?php echo $a1;?>">Deshboard</a>
			  <a href="ProfileSettings" class="list-group-item <?php echo $a2;?>">Profile Settings</a>
			  <a href="AccountSettings" class="list-group-item <?php echo $a3;?>">Account Settings</a>
			  <a href="Downloads" class="list-group-item <?php echo $a4;?>">Downloads</a>
			  <a href="Favourites" class="list-group-item <?php echo $a5;?>">Favourites</a>
			  <a href="Uploads" class="list-group-item <?php echo $a6;?>">Uploads</a>
			  <a href="Statement" class="list-group-item <?php echo $a7;?>">Statements</a>

			</div>






    	</div>
    	<div class="col-md-9" id="content">
    		<h3><?php echo $header; ?></h3>
    	</div>
    </div>
</body>
</html>