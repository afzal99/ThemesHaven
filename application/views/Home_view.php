<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ThemesHaven</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/home_style.css"/>
	
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrapValidator.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/searchbar_style.css" type="text/css" media="screen"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrapValidator.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/tooltip.js"> </script>
	<script src="<?php echo site_url(); ?>site_elements/js/like.js"> </script>
	<script src="<?php echo site_url(); ?>site_elements/js/homescripts.js"> </script>



</head>
<body>
	<div id="h_main">
		<header id="anchor" >
			<div class="col-md-12" id="header">
				<div id="logo"><a  href="<?php echo site_url('home'); ?>"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div> 
				
				
				<div id="h_links">
					<?php if($this->session->userid){ ?>
					<div id="logeduser"><span id="logeduser_c"><img   src="<?php echo site_url(); ?>site_elements/avater/<?php if(isset($avatar)){if($avatar != ""){echo $avatar;}else{ echo 'uicon.png'; } } ?>" /> <span><?php echo $this->session->user;  ?></span> <span class="glyphicon glyphicon-chevron-down"> </span> </span></div>
					<?php } 
					else
					{ ?>
						<span class="btn_t">
							<a href="<?php echo site_url('signin'); ?>" id="btn_login" class="btn btn-success loginbtn">Sign in</a>
						</span>
						<a  href="<?php echo site_url('signup'); ?>" class="btn btn-primary btn_create">Create Account</a>
					<?php } ?>
					<div id="btn_trigger" ><img  src="<?php echo site_url(); ?>site_elements/navicon.png" /></div>
					
				</div>
			</div>

		</header>
		<div class="col-md-12" id="banner_top">
		<div class="col-md-6" id="s_bar">
			<form id="ui_element" class="sb_wrapper" autocomplete="off" method="post"  action="<?php echo site_url('search/result'); ?>">
                <p>
					<span id="searchfilter" class="sb_down"></span>
					<input id="search_field" class="sb_input" name="search" placeholder="Search Templates" type="text"/>
					<input class="sb_search searcharea" type="submit" value=""/>
				</p>
				<ul class="sb_dropdown"  style="display:none;">
					<li class="sb_filter">Filter Search</li>
					<li><input type="checkbox"/><label for="all"><strong>All Categories</strong></label></li>
					<?php
						if($categories != null)
						{
							foreach ($categories as $ca){
								echo '<li><input name="ca[]" value="'.$ca['id'].'" type="checkbox"/><label>'.$ca['name'].'</label></li>';
							}
						}

					?>
				</ul>
            </form>
		</div>
		<div id="searchresult"><ul id="finalResult"></ul></div>
			<div class="col-md-offset-2" id="b_con">
				<div class="col-md-10">
					<h2>More Than A Hundred Website Templates </h2>
					<h3>A great collection of multipurpose professional templates. Browse and download theme for your personal, business or commercial website.</h3>
				</div>
			</div>
			<div id="btn_browseall"> 
				<div class="col-md-6">
					<a class="btn btn_pop" href="filter/scale/popularitems">Browse Popular Items</a> 
				</div>
				<div class="col-md-6">
					<a class="btn btn_new" href="filter/scale/newitems">Browse All New Items</a>
				</div>
			</div>
		</div>

		<div id="canvas">
			
		<?php
			if($featured_row >'0')
			{	?>
			<div  class="col-md-12 area_a">
				<div class="a_el">
					<h2 class="con_title">FEATURED ITEMS</h2>                           
					<div class="btn_sellall"><a href="filter/scale/featureditems" > SEE ALL</a> </div>
					<div id="f_block_area">
						<ul>
							
							<?php	foreach ($featureditems as $key) { ?>
										<li class="f_block">

											<div class="block_img"><div class="imghover"><a href="<?php echo site_url(); ?>item/template/<?php echo $key['product_id'].'/'.str_replace(' ', '_', $key['title']) ?>" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/image/<?php echo $key['image']; ?>" width="280px" height="192px"/></div>
											<div class="block_info"> 
												<div class="theme_title"><h3> <?php echo $key['title']; ?> </h3></div>
												<div class="theme_info">
													<h4 class="price"><?php if($key['price'] !='Free'){echo '$';} echo $key['price']; ?></h4>
													<h4 class="info"><a style="cursor:default" data-toggle="tooltip" title="Sales" href="#0"> <span class="glyphicon glyphicon glyphicon-briefcase"></span><?php echo $key['total_sale']; ?></a></h4>

												<div id="like_button">
													<h4 class="info"><a href="#0"><span id="like_unlike" class="link"><?php
													 
														$c='0'; 
														if(isset($likeditems))
														{
															foreach ($likeditems as $likecheck) 
															{ 
																if($key['product_id'] == $likecheck['product_id'])
																{ 
																	$c='1';  ?><span class='glyphicon glyphicon-heart'></span><?php   }
															}
														}
															if($c=='0')
															{ 	?><span class='glyphicon glyphicon-heart-empty'></span><?php	}

													?></span></a> <span data-toggle="tooltip" title="Favorites" style="margin-left:-8px; cursor:default" id="number_of_likes"><?php echo $key['total_favorites']; ?></span></h4>

													<span id="product_id" style="display:none"><?php echo $key['product_id']; ?></span>
													<span id="user_id" style="display:none"><?php echo $this->session->userid; ?></span>

												</div>


													<h4 class="info"><a target="_blank" href="<?php echo '//'.$key['preview_link']; ?>"> <span class="glyphicon glyphicon-eye-open" ></span>Live Demo</a></h4>


												</div>

											</div>
										</li>  
								<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="col-md-12 area_b">
				<div class="a_el">
					<div class="el_head">
						<h2 class="con_title">POPULAR ITEMS</h2>
						<div class="btn_sellall"><a href="filter/scale/popularitems" > SEE ALL</a> </div>
					</div>
					<div class="item_area">
						 <ul>
							
							<?php
								foreach ($popularitems as $key) { ?>
									<li class="f_block">

											<div class="block_img"><div class="imghover"><a href="item/template/<?php echo $key['product_id'].'/'.str_replace(' ', '_', $key['title']) ?>" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/image/<?php echo $key['image']; ?>" width="280px" height="192px"/></div>
											<div class="block_info"> 
												<div class="theme_title"><h3> <?php echo $key['title']; ?> </h3></div>
												<div class="theme_info">
													<h4 class="price"><?php if($key['price'] !='Free'){echo '$';} echo $key['price']; ?></h4>
													<h4 class="info"><a  style="cursor:default"  data-toggle="tooltip" title="Sales" href="#0"> <span class="glyphicon glyphicon glyphicon-briefcase"></span><?php echo $key['total_sale']; ?></a></h4>

												<div id="like_button">
													<h4 class="info"><a href="#0"><span id="like_unlike" class="link"><?php
													 
														$c='0'; 
														if(isset($likeditems))
														{
															foreach ($likeditems as $likecheck) 
															{ 
																if($key['product_id'] == $likecheck['product_id'])
																{ 
																	$c='1';  ?><span class='glyphicon glyphicon-heart'></span><?php   }
															}
														}
															if($c=='0')
															{ 	?><span class='glyphicon glyphicon-heart-empty'></span><?php	}

													?></span></a> <span data-toggle="tooltip" title="Favorites" style="margin-left:-8px; cursor:default" id="number_of_likes"><?php echo $key['total_favorites']; ?></span></h4>

													<span id="product_id" style="display:none"><?php echo $key['product_id']; ?></span>
													<span id="user_id" style="display:none"><?php echo $this->session->userid; ?></span>

												</div>


													<h4 class="info"><a target="_blank" href="<?php echo '//'.$key['preview_link']; ?>"> <span class="glyphicon glyphicon-eye-open" ></span>Live Demo</a></h4>


												</div>

											</div>
										</li>   
								<?php } ?>
							
						</ul>

					</div>
				</div>
			</div>

			<div class="col-md-12 area_a">
				<div class="a_el">
					<div class="el_head">
						<h2 class="con_title">NEW ITEMS</h2>
						<div class="btn_sellall"><a href="filter/scale/newitems" > SEE ALL</a> </div>
					</div>
					<div class="item_area">
						 <ul>
						 	<?php
								foreach ($newitems as $key) { ?>
									<li class="f_block">

											<div class="block_img"><div class="imghover"><a href="item/template/<?php echo $key['product_id'] .'/'.str_replace(' ', '_', $key['title']) ?>" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/image/<?php echo $key['image']; ?>" width="280px" height="192px"/></div>
											<div class="block_info"> 
												<div class="theme_title"><h3> <?php echo $key['title']; ?> </h3></div>
												<div class="theme_info">
													<h4 class="price"><?php if($key['price'] !='Free'){echo '$';} echo $key['price']; ?></h4>
													<h4 class="info"><a  style="cursor:default"  data-toggle="tooltip" title="Sales" href="#0"> <span class="glyphicon glyphicon glyphicon-briefcase"></span><?php echo $key['total_sale']; ?></a></h4>

												<div id="like_button">
													<h4 class="info"><a href="#0"><span id="like_unlike" class="link"><?php
													 
														$c='0'; 
														if(isset($likeditems))
														{
															foreach ($likeditems as $likecheck) 
															{ 
																if($key['product_id'] == $likecheck['product_id'])
																{ 
																	$c='1';  ?><span class='glyphicon glyphicon-heart'></span><?php   }
															}
														}
															if($c=='0')
															{ 	?><span class='glyphicon glyphicon-heart-empty'></span><?php	}

													?></span></a> <span data-toggle="tooltip" title="Favorites" style="margin-left:-8px; cursor:default" id="number_of_likes"><?php echo $key['total_favorites']; ?></span></h4>

													<span id="product_id" style="display:none"><?php echo $key['product_id']; ?></span>
													<span id="user_id" style="display:none"><?php echo $this->session->userid; ?></span>

												</div>


													<h4 class="info"><a target="_blank" href="<?php echo '//'.$key['preview_link']; ?>"> <span class="glyphicon glyphicon-eye-open" ></span>Live Demo</a></h4>


												</div>

											</div>
										</li> 
								<?php } ?>

						 </ul>
					</div>
							
				</div>
			</div>

			<div class="area_b col-md-12" id="free_<?php echo site_url(); ?>site_elements/items">
				<div class="b_el" id="free_Items">
					<div class="el_head">
						<h2 class="con_title">FREE ITEMS</h2>
						<div class="btn_sellall"><a href="filter/scale/freeitems" > SEE ALL</a> </div>
					</div>
					<div class="item_area">
						 <ul>
						 	<?php
								if($freeitems_row >'0')
								{
									foreach ($freeitems as $freeitems) { ?>
										<li class="f_block">

											<div class="block_img"><div class="imghover"><a href="item/template/<?php echo $freeitems['product_id'] .'/'.str_replace(' ', '_', $freeitems['title']) ?>" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/image/<?php echo $freeitems['image']; ?>" width="280px" height="192px"/></div>
											<div class="block_info"> 
												<div class="theme_title"><h3> <?php echo $freeitems['title']; ?> </h3></div>
												<div class="theme_info">
													<h4 class="price"><?php if($freeitems['price'] !='Free'){echo '$';} echo $freeitems['price']; ?></h4>
													<h4 class="info"><a  style="cursor:default"  data-toggle="tooltip" title="Sales" href="#0"> <span class="glyphicon glyphicon glyphicon-briefcase"></span><?php echo $freeitems['total_sale']; ?></a></h4>

												<div id="like_button">
													<h4 class="info"><a href="#0"><span id="like_unlike" class="link"><?php
													 
														$c='0'; 
														if(isset($likeditems))
														{
															foreach ($likeditems as $likecheck) 
															{ 
																if($freeitems['product_id'] == $likecheck['product_id'])
																{ 
																	$c='1';  ?><span class='glyphicon glyphicon-heart'></span><?php   }
															}
														}
															if($c=='0')
															{ 	?><span class='glyphicon glyphicon-heart-empty'></span><?php	}

													?></span></a> <span data-toggle="tooltip" title="Favorites" style="margin-left:-8px; cursor:default" id="number_of_likes"><?php echo $freeitems['total_favorites']; ?></span></h4>

													<span id="product_id" style="display:none"><?php echo $freeitems['product_id']; ?></span>
													<span id="user_id" style="display:none"><?php echo $this->session->userid; ?></span>

												</div>


													<h4 class="info"><a target="_blank" href="<?php echo '//'.$key['preview_link']; ?>"> <span class="glyphicon glyphicon-eye-open" ></span>Live Demo</a></h4>


												</div>

											</div>
										</li>  
								<?php }
								}
								else
								{
									echo 'There is no free item available';
								}
							?>
						</ul>
					</div>

				</div>
			</div>
		</div> <!-- end of canvas -->

    	<div class=" " id="footer">
    		<div id="anchor_"> <a id="btn_anchor" href="#anchor"><img class="imganc" src="<?php echo site_url(); ?>site_elements/an.png"> </img> </a></div>
    		<div id="footer_c">
    			<div class="col-md-3" id="overview">
		    		<div id="overview_h">Overview</div>
		    		<div id="overview_c">
			    		<ul>
			    			<li> <a class="f_a" href="<?php echo site_url('home'); ?>">Home</a> </li>
			    			<li> <a href="<?php echo site_url('filter/scale/featureditems'); ?>">Featured Items</a> </li>
			    			<li> <a href="<?php echo site_url('filter/scale/freeitems'); ?>">Free Items</a> </li>
			    			<li> <a href="<?php echo site_url('filter/scale/newitems'); ?>">New Items</a> </li>
			    			<li> <a href="<?php echo site_url('filter/scale/popularitems'); ?>">Popular Items</a> </li>

			    		</ul> 
		    		</div>
	    		</div>
	    		<div class="col-md-3"  id="contactinfo">
		    		<?php foreach ($t_c_r as $key) { ?>
	    				
	    			
		    		<div id="contactinfo_h"><?php echo $key['title']; ?></div>
		    		<div id="contactinfo_c">
			    		<?php echo $key['description']; ?>
		    		</div>
		    		<?php } ?>
	    		</div>
	    		<div class="col-md-3"  id="contactinfo">
		    		<?php foreach ($p_p_r as $key) { ?>
	    				
	    			
		    		<div id="contactinfo_h"><?php echo $key['title']; ?></div>
		    		<div id="contactinfo_c">
			    		<?php echo $key['description']; ?>
		    		</div>
		    		<?php } ?>
	    		</div>
	    		<div class="col-md-3"  id="contactinfo">
	    			<?php foreach ($about_r as $key) { ?>
	    			
		    		<div id="contactinfo_h"><?php echo $key['title']; ?></div>
		    		<div id="contactinfo_c">
			    		<?php echo $key['description']; ?>
		    		</div>
		    		<?php } ?>
	    		</div>
    		
    		</div>
   		</div>
   	</div>
    <div id="side_nav">
     	<ul>
    		<li class="navlink_header"> Filter By Category </li>
    		<?php
				if($categories != null)
				{
					foreach ($categories as $ca){
						echo '<li> <a class="navlink" href="'.site_url().'/filter/scale/category/'.$ca['id'].'">'.$ca['name'].'</a></li>';
					}
				}
			?>
    		<li class="navlink_header"> HELP </li>
    		<li> <a class="navlink" href="<?php echo site_url('information/aboutus'); ?>"> About Us</a> </li>
    		<li> <a class="navlink" href="<?php echo site_url('information/privacy_policy'); ?>"> Privacy policy</a> </li>
    		<li> <a class="navlink" href="<?php echo site_url('information/privacy_policy'); ?>"> Terms & Conditions</a> </li>

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
				    <button type="submit" name="signinsubmit" value="1" class="btn btn-default">Login</button>
				  <div class="checkbox">
				    <div class="col-md-7"><input disabled type="checkbox"> Remember me</label></div>
				    <div class="fp"><a href="<?php echo site_url('account/forgotten'); ?>">Forget Password</a></label></div>
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
<span id="btn_login" style="display:none"> </span>
</body>
<script>
	document.getElementById("btn_login").addEventListener("click", function(event){
	     event.preventDefault()
	});
	document.getElementById("btn_anchor").addEventListener("click", function(event){
	     event.preventDefault()
	});

$(document).ready(function(){

	$('#anchor_').click(function(){
	$('html, body').animate({scrollTop : 0},800);
	return false;
	});

	$("#searchfilter").dblclick(function(){
		$('.sb_dropdown').hide();
	});
});
</script>
</html>