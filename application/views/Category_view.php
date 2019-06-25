<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wordpress -ThemesHaven</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/category_view_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div id="c_main">
		<header id="anchor">
			<div  id="header">
				<div class="col-md-2" id="logo"><a href="../../home"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div> 

				<div class="col-md-6" id="s_bar">
				  <form method="" action="">
				  	<input type="text" name="key" autocomplete="off" placeholder="Search Templates"/> 
				  </form>
				</div>
				<div id="h_links">
				<span class="btn_t">
				<a href="#" id="btn_login" class="btn btn-success loginbtn">Sign in</a></span>
				<a href="../../signup" class="btn btn-primary btn_create">Create Account</a>
				<div id="btn_trigger" ><img  src="<?php echo site_url(); ?>site_elements/navicon.png" /></div>
				<?php if($this->session->username && $this->session->id){ echo '<div id="btn_user"><img height="37" src=" '.site_url().'site_elements/user.png" /></div>' ;}   ?>

				</div>
			</div>
		</header>
		
		
		<div id="top_menu">
			
		</div>
		<div id="item_label">
			<div id="item_label_content">
				<h4 class="wiz"> <a href="#">Home </a>/<a href="#"> Category </a>/<a href="#"> Wordpress </a></h4>
				<h3 class="item_label"> Wordpress </h3>

			</div>

		</div>
		<div id="canvas">
			<div style="padding-left:0" class="col-md-12" >
			<ul>
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/2" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/2.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/10" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/10.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block">  <!--  1 -->
					<div class="block_img"><div class="imghover"><a href="item/template/8" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/8.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase"  data-toggle="tooltip" title="Sales" ></span>4</h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#" data-toggle="tooltip" title="Favourite">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>               <!-- 2 -->
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/9" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/9.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>RockSolid - Construction Responsive Template
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li> 
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/2" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/2.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/10" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/10.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block">  <!--  1 -->
					<div class="block_img"><div class="imghover"><a href="item/template/8" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/8.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase"  data-toggle="tooltip" title="Sales" ></span>4</h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#" data-toggle="tooltip" title="Favourite">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>               <!-- 2 -->
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/9" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/9.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>RockSolid - Construction Responsive Template
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li> 
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/2" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/2.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/10" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/10.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block">  <!--  1 -->
					<div class="block_img"><div class="imghover"><a href="item/template/8" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/8.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase"  data-toggle="tooltip" title="Sales" ></span>4</h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#" data-toggle="tooltip" title="Favourite">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>               <!-- 2 -->
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/9" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/9.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>RockSolid - Construction Responsive Template
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li> 
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/2" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/2.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
				<li class="f_block"> 
					<div class="block_img"><div class="imghover"><a href="item/template/10" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/items/10.png" width="280px" height="192px"/></div>
					<div class="block_info"> 
						<div class="theme_title"><h3>Shades of Gray - 	A Bootstrap Template For Gray Lovers
						</h3></div>
						<div class="theme_info">
							<h4 class="price">$45</h4>
							<h4 class="info"> <span class="glyphicon glyphicon glyphicon-briefcase" ></span><a href="#">4</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-heart" ></span><a href="#">1</a></h4>
							<h4 class="info"> <span class="glyphicon glyphicon-eye-open" ></span><a href="#">Live Demo</a></h4>


						</div>

					</div>
				</li>
			 </ul>
			 </div>
		</div>
	</div>
		<div class=" " id="footer">
    		<div id="anchor_"> <a  href="#anchor"><img class="imganc" src="<?php echo site_url(); ?>site_elements/an.png"> </img> </a></div>
    		<div id="footer_c">
    			<div id="overview">
		    		<div id="overview_h">Overview</div>
		    		<div id="overview_c">
			    		<ul>
			    			<li> <a class="f_a" href="#">Home</a> </li>
			    			<li> <a href="#">Featured Items</a> </li>
			    			<li> <a href="#">Free Items</a> </li>
			    			<li> <a href="#">New Items</a> </li>
			    			<li> <a href="#">Popular Items</a> </li>

			    		</ul> 
		    		</div>
	    		</div>
	    		<div id="contactinfo">
		    		<div id="contactinfo_h">Additional Information</div>
		    		<div>
			    		Metropolitan University</br>Al-Hamra Shopping City (7th floor)Zindabazar, Sylhet.
		    		</div>
	    		</div>
	    		<div id="contactinfo">
		    		<div id="contactinfo_h">Additional Information</div>
		    		<div id="contactinfo_c">
			    		<p>Metropolitan University</br>
			    		Al-Hamra Shopping City (7th floor)
			    		Zindabazar, Sylhet.</p>
		    		</div>
	    		</div>
	    		<div id="contactinfo">
		    		<div id="contactinfo_h">Contact Us</div>
		    		<div id="contactinfo_c">
			    		<p>Metropolitan University</br>
			    		Al-Hamra Shopping City (7th floor)
			    		Zindabazar, Sylhet.</p>
		    		</div>
	    		</div>
    		
    		</div>
   		</div>

	</div>

	<div id="top_menu_box">
	<div id="top_menu_content">
		<nav id="dropdown_nav">
			<ul>
				<li> <a href="#">All Items</a>
					<ul>
							<li><a href="#">Popular Files</a> </li>
							<li> <a href="#">Featured Files</a></li>
							<li> <a href="#">Top New Files</a></li>
							<li> <a href="#">Free Files</a></li>
							<li> <a href="#">Top Authors</a></li>
							<li> <a href="#">View All Categories</a></li>
							
					</ul>
				</li>
				<li>   <a href="#">Wordpress</a>
					<ul>
							<li class="underline"><a href="#">Popular Items</a> </li>
							<li> <a href="#">Bloog / Magazine</a></li>
							<li> <a href="#">Corporate</a></li>
							<li> <a href="#">Creative</a></li>
							<li> <a href="#">Education</a></li>
							<li> <a href="#">Mobile</a></li>
							<li> <a href="#">Non Profit</a></li>
							<li> <a href="#">Wedding</a></li>
							
					</ul>
				</li>
				<li>   <a href="#">HTML</a>
					<ul>
							<li class="underline"> <a href="#">Popular Items</a></li>
							<li> <a href="#">Admin Templates</a> </li>
							<li> <a href="#">Bloog / Magazine</a></li>
							<li> <a href="#">Corporate</a></li>
							<li> <a href="#">Creative</a></li>
							<li> <a href="#">Education</a></li>
							<li> <a href="#">Login Template</a></li>
							<li> <a href="#">Mobile</a></li>
							<li> <a href="#">Non Profit</a></li>
							<li> <a href="#">Perdonal</a></li>
							<li> <a href="#">Retrail</a></li>
							<li> <a href="#">Signup Template</a></li>
							<li> <a href="#">Wedding</a></li>
							
					</ul>

				</li>
				<li>   <a href="#">Marketing</a>
					<ul>
							<li class="underline"><a href="#">Popular Items</a> </li>
							<li> <a href="#">Email Template</a></li>
							<li> <a href="#">Instapage</a></li>
							<li> <a href="#">Pagewiz</a></li>
							
					</ul>
				</li>
				<li>   <a href="#">CMS</a>
					<ul>
							<li class="underline"><a href="#">Popular Items</a> </li>
							<li> <a href="#">Drupal</a></li>
							<li> <a href="#">Joomla</a></li>
							<li> <a href="#">Mura</a></li>
							
					</ul>

				</li>
				<li>   <a href="#">eCommerce</a>   </li>
				<li>   <a href="#">Music</a>   </li>
				<li>   <a href="#">UI Designs</a>   </li>
				<li>   <a href="#">More</a>
					<ul>
							<li> <a href="#">Forum</a> </li>
							<li> <a href="#">Blooging</a></li>
							<li> <a href="#">Funny Templates</a></li>
							
					</ul>
				</li>

			</ul>
		</nav>
	</div>
	</div>

	<div id="side_nav">
     	<ul>
    		<li class="navlink_header"> Filter By Category </li>
    		<li> <a class="navlink" href="#"> Admin Template</a></li>
    		<li> <a class="navlink" href="#"> Blog</a> </li>
    		<li> <a class="navlink" href="#"> Business</a> </li>
    		<li> <a class="navlink" href="#"> Ecommerce</a> </li>
    		<li> <a class="navlink" href="#"> Entertainment</a> </li>
    		<li> <a class="navlink" href="#"> Corporate Business</a> </li>
    		<li> <a class="navlink" href="#"> Creative</a> </li>
    		<li> <a class="navlink" href="#"> Wedding</a> </li>
    		<li> <a class="navlink" href="#"> Wordpress</a> </li>
    		<li class="navlink_header"> HELP </li>
    		<li> <a class="navlink" href="#"> Community Forum</a> </li>
    		<li> <a class="navlink" href="#"> Contact Us</a> </li>

    	</ul>
    </div>
    <div id="loginpanel">
		<div id="info">
			<form id="signinsubmit" action="<?php echo site_url('Signin/checkpoint');?>" method="post">
				<div class="form-group">
				    <input type="text" class="form-control" placeholder="User Name" autocomplete="off" name="username">
					<span class="glyphicon glyphicon-user glyp"></span>
					<span class="help-block" id="unMessage" />
				</div>
				<div class="form-group">
				    <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="password">
					<span class="glyphicon glyphicon-lock glyp"></span>
					<span class="help-block" id="passMessage" />
				</div>
				    <button type="submit" name="signinsubmit" class="btn btn-default">Login</button>
				  <div class="checkbox">
				    <div class="col-md-7"><input type="checkbox"> Remember me</label></div>
				    <div class="fp"><a href="#">Forget Password</a></label></div>
				  </div>
			</form>
		</div>
    </div>
    <div id="userpanel">
    	<div id="uicon"><img height="100" class="img-circle" src="<?php echo site_url(); ?>site_elements/avater/<?php if(isset($avatar)){if($avatar != ""){echo $avatar;}else{ echo 'uicon.png'; } } ?>" /></div>
    	<div id="uname"><?php echo $this->session->user;  ?></div>
    	<hr/ width="75%">
    	<div id="umenu">
    		<ul>
	    		<li><a href="<?php echo site_url(); ?>dashboard"><span class="glyphicon glyphicon-home"></span>My Home</a></li>
				<li><a href="<?php echo site_url(); ?>dashboard/favorites"><span class="glyphicon glyphicon-heart"></span>Favorites</a></li>
	    		<li><a href="<?php echo site_url(); ?>dashboard/myitems"><span class="glyphicon glyphicon-th-list"></span>My Items</a></li>
	    		<li><a href="<?php echo site_url(); ?>dashboard/accountsettings"><span class="glyphicon glyphicon-cog"></span>Account Settings</a></li>

	    		<li><a href="<?php echo site_url(); ?>dashboard/accountsettings"><span class="glyphicon glyphicon-picture"></span>Change Profile Picture</a></li>
	    		<li><a href="<?php echo site_url(); ?>Logout"><span class="glyphicon glyphicon-log-out"></span>Signout</a></li>

    		</ul>
    	</div>
    </div>
</body>
<script> 
$(document).ready(function(){
  $("#btn_trigger").click(function(){
  	$("#loginpanel").hide();
  	$("#userpanel").hide();
    $("#side_nav").fadeToggle();
  });
  $(".btn_t").click(function(){
  		$("#side_nav").hide();
  		$("#userpanel").hide();
	    $("#loginpanel").fadeToggle();
   });
   $("#btn_user").click(function(){
  		$("#side_nav").hide();
  		$("#loginpanel").hide();
	    $("#userpanel").fadeToggle();
   });
 $('[data-toggle="tooltip"]').tooltip();
});
</script>
</html>


