<!DOCTYPE html>
<html lang="en-US">
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/admin/admin_header.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/admin/admin_top_menu.css"/>

	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/signup_style.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
</head>
<BODY>
	<div class="container-fluid" id="header">
		<div id="logo">
			<a class="hnm" href="#"><img src="<?php echo site_url(); ?>site_elements/aaaa.png"/></a>
		</div>
		<div id="nav_ico">
			<a class="pull-right" href="#"><img src="<?php echo site_url(); ?>site_elements/nav-icon.png" /></a>
		</div>
		<div class="pull-right" id="log_info">
			<h2>  <span class="glyphicon glyphicon-lock"></span> You are logged in as ******     </h2>
		</div>
	</div>
<div class="container-fluid" style="margin-left:0px; padding-left:0px">
	<ul class="nav nav-tabs">
		  <li><a href="#">Deshboard</a></li>
		  <li class="dropdown active">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catalog
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="allcategories">Categories</a></li>
		      <li><a href="#">Products</a></li>
		      <li><a href="#">Information</a></li> 
		    </ul>
		  </li>
		  <li class="dropdown active">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sales
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="allcategories">Total Sales</a></li>
		      <li><a href="#">Customers</a></li>
		      <li><a href="#">Banned users</a></li> 
		    </ul>
		  </li>
		  <li class="dropdown active">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">System
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="allcategories">Settings</a></li>
		      <li><a href="#">Admins</a></li>
		    </ul>
		  </li>
		</ul>
	<!-- <div id="menu">
		<nav class="clearfix">
			<ul class="clearfix">
				<li><a href="#">Home</a></li>

				<li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catalog
		          <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="Categories">Categories</a></li>
		            <li><a href="#">Products</a></li>
		            <li><a href="#">Informations</a></li> 
		          </ul>
			    </li>

			    <li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 2
		          <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Page 1-1</a></li>
		            <li><a href="#">Page 1-2</a></li>
		            <li><a href="#">Page 1-3</a></li> 
		          </ul>
			    </li>
			    
				<li><a href="#">Web 2.0</a></li>
				<li><a href="#">Tools</a></li>	
				<ul class="navbar-right">
			        <li><a  class="u_c" href="Signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			        <li><a class="u_c" href="Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			    </ul>
			</ul>
			
		</nav>
	</div> -->

</div>
</BODY>

<script> 
$(document).ready(function(){
  $("#nav_ico").click(function(){
    $("#menu").slideToggle("slow");
  });
});
</script>


</html>