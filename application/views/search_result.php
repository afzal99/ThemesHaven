<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $name; ?> -ThemesHaven</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/search_result.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap-multiselect.css" type="text/css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/tooltip.js"> </script>
	<script src="<?php echo site_url(); ?>site_elements/js/like.js"> </script>
	<script src="<?php echo site_url(); ?>site_elements/js/script-items.js"> </script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.dropdown_menu').multiselect({
            enableFiltering: true,
            includeSelectAllOption: true,
			allSelectedText: 'All Category',
            maxHeight: 400,
            dropUp: true
        });
        $(".dropdown_menu").multiselect('selectAll', false);
        $(".dropdown_menu").multiselect('updateButtonText');
    });
</script>
</head>
<body>
	<div id="f_main">
		<header id="anchor">
			<div  id="header">
				<div class="col-md-2" id="logo"><a href="<?php echo site_url(); ?>home"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div> 

				<div class="col-md-6" id="s_bar">
				  <form class="form-horizontal" role="form" autocomplete="off" method="post"  action="<?php echo site_url('search/result'); ?>">
				  	<input type="text" name="search" id="search" placeholder="Search Templates"/>
				  </form>

				</div>
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
		<div id="searchresult"><ul id="finalResult"></ul></div>
		
		<div id="top_menu">
			
		</div>
		<div id="item_label">
			<div id="item_label_content">
				<h4 class="wiz"> <a href="<?php echo site_url(); ?>home">Home </a>/ Filter / <?php echo $name; ?></h4>
					<h3 class="item_label"> <?php echo $name; if(isset($searchkey)){echo $searchkey;}?> </h3>
				<div style="padding-left:0px;padding-top:8px; " class="col-md-12">
    <?php if(isset($searchkey)){ ?>
        <div class="row">
        	<form method="post"  action="<?php echo site_url('search/result'); ?>">
            <div class="col-xs-7">
                <div style="z-index:1" class="input-group">
                    <div class="input-group-btn search-panel ">
                        <select class="btn btn-default dropdown-toggle multiselect dropdown_menu" multiple="multiple" name="category[]" data-toggle="dropdown">
                        	<ul class="sb_dropdown">
	                            <?php foreach ($categories as $ckey) {
	                            	echo '<option value="'.$ckey['id'].'">'.$ckey['name'].'</option>';
	                            } ?>
                            </ul>
                        </select>
                    </div>

                    <input type="hidden" name="search_param" value="all" id="search_param">
                    <input type="text" class="form-control" name="search" placeholder="Search term...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div></form>
        </div>
   <?php } ?>
</div>

			</div>

		</div>
		<div id="canvas">
			<div style="padding-left:0" class="col-md-12" >
			<ul> 
				<?php
							if($row >'0')
							{
								foreach ($results as $key) { ?>
									<li class="f_block">

											<div class="block_img"><div class="imghover"><a href="<?php echo site_url(); ?>item/template/<?php echo $key['product_id'] ?>" class="btn btn-default ">View detail</a></div><img src="<?php echo site_url(); ?>site_elements/image/<?php echo $key['image']; ?>" width="280px" height="192px"/></div>
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


													<h4 class="info"><a target="_blank" href="<?php echo $key['preview_link']; ?>"> <span class="glyphicon glyphicon-eye-open" ></span>Live Demo</a></h4>


												</div>

											</div>
										</li>   

								<?php } }
								else
								{
									echo '<p style="padding:20px">No result Found</p>';
								} ?>
				
			</ul>
			 
			</div>
		</div>
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

	<div id="top_menu_box">
	<div id="top_menu_content">
		<nav id="dropdown_nav">
			<ul>
				<li> <a href="<?php echo site_url('home'); ?>">All Items</a>
					<ul>
						<li><a href="<?php echo site_url('filter/scale/popularitems'); ?>">Popular Files</a> </li>
						<li> <a href="<?php echo site_url('filter/scale/featureditems'); ?>">Featured Files</a></li>
						<li> <a href="<?php echo site_url('filter/scale/newitems'); ?>">Top New Files</a></li>
						<li> <a href="<?php echo site_url('filter/scale/freeitems'); ?>">Free Files</a></li>
					</ul>
				</li>
				<?php
					$c='0';
					$m='0';
					foreach ($categories as $navca) {
						$c++;
						if($c<8)
						{
						echo '<li>   <a href="'.site_url().'filter/scale/category/'.$navca['id'].'">'.$navca['name'].'</a>
								<ul>';
						foreach ($tags as $navtag) {
							echo '<li> <a href="'.site_url().'filter/scale/category/'.$navca['id'].'">'.$navtag['name'].'</a></li>';
						}
					
						echo 	'</ul>
							</li>';
						}
						else
						{
							$m++;
							if($m=='1')
							{
								echo '<li>   <a href="#">More</a>
								<ul>';
							}
							if($c>7)
							{
								echo '<li> <a href="'.site_url().'filter/scale/category/'.$navca['id'].'">'.$navca['name'].'</a></li>';
							}
						}
						
					}
				?>
				

			</ul>
		</nav>
	</div>
	</div>

    <div id="side_nav">
     	<ul>
    		<li class="navlink_header"> Filter By Category </li>
    		<?php
				if($ca_sn != null)
				{
					foreach ($ca_sn as $ca){
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
 $('[data-toggle="tooltip"]').tooltip();
});

/**
* selecting all checkboxes
*/
$('.sb_dropdown').find('label[for="all"]').find('option').attr('selected',this.checked);
$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
    $(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
});

</script>
</html>


