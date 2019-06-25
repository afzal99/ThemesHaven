<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product View -ThemesHaven</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/items_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jqueryalert/zebra_dialog.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/tooltip.js"> </script>
	<script src="<?php echo site_url(); ?>site_elements/js/like.js"> </script>
	<script src="<?php echo site_url(); ?>site_elements/js/script-items.js"> </script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/jqueryalert/zebra_dialog.css"/>

	
</head>
<body>
	<div id="i_main">
		<header id="anchor">
			<div  id="header">
				<div class="col-md-2" id="logo"><a href="<?php echo site_url();?>"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div> 

				<div class="col-md-6" id="s_bar">
				  <form class="form-horizontal" role="form" autocomplete="off" method="post" action="<?php echo site_url('search/result'); ?>">
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
			
		</div> <?php foreach ($result as $key) { ?>

		<div id="item_label">
			<div id="item_label_content">
				<h4 class="wiz">  <a href="<?php echo site_url();?>">Home </a>/ <a href="<?php echo site_url();?>filter/scale/category/<?php echo $key['category_id']; ?>"><?php echo $ca_name; ?></a> / <?php echo $key['title']; ?> </h4>
				<h3 class="item_label"> <?php echo $key['title']; ?> </h3>

			</div>

		</div>
		<div id="canvas">
			
			<div id="item_area">
				<div id="item_preview">
					<div id="item_preview_image">
						<a target="_blank" href="<?php echo '//'.$key['preview_link'];?>"><img src="<?php echo site_url();?>site_elements/image/<?php echo $key['image'];?>" alt="Shades of Gray - A Bootstrap Template For Gray Lovers" /> </a>
					</div>
					<div id="img_btn">
						<li><a class="btnlive_preview" target="_blank" href="<?php echo '//'.$key['preview_link'];?>">Live Preview</a></li>
					<div id="like_button">	
						<li><span class="btnfavorite" id="btnfavorite"><?php
													 
														$c='0'; 
														if(isset($likeditems))
														{
															foreach ($likeditems as $likecheck) 
															{ 
																if($key['product_id'] == $likecheck['product_id'])
																{
																	$c='1';  ?>Remove Favorite<?php   }
															}
														}
															if($c=='0')
															{ 	?>Add to Favorites<?php	}

													?></span>
						<span id="product_id" style="display:none"><?php echo $key['product_id'];?></span>
						<span id="user_id" style="display:none"><?php echo $this->session->userid; ?></span>
						<span id="number_of_likes" style="display:none"><?php echo $key['total_favorites'];?></span>
					</div>
						</li>
						<li>
							<?php 
							if($key['price'] =='Pending')
							{
								echo '<a class="btnpurchase" href="#">Pending</a>';
							}
							else if($key['price'] =='Free')
							{
								if($this->session->userid != "")
								{
									echo '<a class="btnpurchase" href="'.site_url().'download/item/'.$key['product_id'].'">Download for Free</a>';
								}
								else
								{
									echo '<a class="btnpurchase" id="nosignin" href="'.site_url().'download/item/'.$key['product_id'].'">Download for Free</a>';
								}
							}
							else
							{
								echo '<a id="btn_purchase" class="btnpurchase" href="'.site_url().'download/item/'. $key['product_id'].'">Purchase for $'.$key['price'].'</a>';
								
							} 
							?>
						</li>
					</div>
					
				</div>
				<div id="item_description"><?php echo $key['description'];?></div>
				
			</div>
			<div id="item_info">
				<h4 class="item_info_header underline"> ITEM INFORMATION </h4>
				<ul>
					<table>
						<thead>
							<tr>
								<td colspan="2">Statistics for this template</td>
							</tr>
						</thead>
						<tr>
							<td class="title"><p> Favorites </p></td>
							<div id="like_button"><td class="content"><span id="Xnumber_of_likes"><?php echo $key['total_favorites'];?></span></td>
							</div>
						</tr>
						<tr>
							<td class="title"> Purchases</td>
							<td class="content"> <?php echo $key['total_sale'];?></td>
						</tr>
					</table>

					<table>
						<thead>
							<tr>
								<td colspan="2">Author</td>
							</tr>
						</thead>
						<tr>
							<td class="title"><p> Name </p></td>
							
							<?php 
								if($key['author']=='1'){ ?>
									<td class="content"><p>ThemesHaven</td></tr>
							<?php	}
							else
							{ ?>
									<td class="content"><p><?php if(isset($author)){ foreach ($author as $a) {
										
									 echo $a['firstname'].' '.$a['lastname']; ?></td></tr>
									<tr>
										<td class="title"><p> Registered</p></td>
										<td class="content"><p><?php echo $a['date_registered']; } } ?></p></td>
									</tr>
					<?php	}?>
							<p>
						
						
					</table>

					<table>
						<thead>
							<tr>
								<td colspan="2">About this template</td>
							</tr>
						</thead>
						<tr>
								<td class="title"><p> Created </p></td>
								<td class="content"><p><?php echo $key['date_added'];?><p></td>
						</tr>
						<tr>
								<td class="title"><p>Last Update</p></td>
								<td class="content"><p><?php echo $key['date_updated'];?></p></td>
						</tr>
						<tr>
								<td class="title"><p>Category</p></td>
								<td class="content"><p><a href="<?php echo site_url();?>filter/scale/category/<?php echo $key['category_id']; ?>"><?php echo $ca_name; ?></a></p></td>
						</tr>
						<tr>
								<td class="title"><p>Tags</p></td>
								<td class="content"><p><?php foreach ($tagnames as $tn) { echo $tn['n']; } ?></p></td>
						</tr>
						<tr>
								<td class="title"><p>Layout</p></td>
								<td class="content"><p><?php echo $key['layout'];?></p></td>
						</tr>
						<tr>
								<td class="title"><p>High Resolution</p></td>
								<td class="content"><p><?php echo $key['high_resolution'];?></p></td>
						</tr>
						<tr>
								<td class="title"><p>Bootstrap</p></td>
								<td class="content"><p><?php echo $key['bootstrap_version'];?></p></td>
						</tr>
						<tr>
								<td class="title"><p>Browser</p></td>
								<td class="content"><p><?php echo $key['compatable_browser'];?></p></td>
						</tr>

					</table>

						
				</ul>

			</div><?php } ?>
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
<span id="btn_login" style="display:none"> </span>
<span id="btn_purchase" style="display:none"> </span>
</body>
<script type="text/javascript">
	document.getElementById("btn_login").addEventListener("click", function(event){
	     event.preventDefault()
	});
	document.getElementById("btn_purchase").addEventListener("click", function(event){
	     	event.preventDefault();
	     	$.Zebra_Dialog('<strong>Purchase</strong> is not available right now, You can download free templates anyway.', {
    'type':     'error',
    'title':    'Error'
	});
});
// 	document.getElementById("nosignin").addEventListener("click", function(event){
// 	     	event.preventDefault();
// 	     	$.Zebra_Dialog('You must login first with your <strong>ThemesHaven</strong> account in order to download or purchase a product.', {
//     'type':     'information',
//     'title':    'Please login first'
// });
// });

document.getElementById("nosignin").addEventListener("click", function(event){
	event.preventDefault();
	$.Zebra_Dialog('Please login first with your <strong>ThemesHaven</strong> account.', {
    'type':     'information',
    'title':    'Information',
    'buttons':  [
                    {caption: 'Ok', callback: function() {document.location.href = 'http://localhost/ThemesHaven/signin'}},
                    {caption: 'Cancel', callback: function() { }}
                ]
	});
});




	$('#anchor_').click(function(){
	$('html, body').animate({scrollTop : 0},800);
	return false;
	});
</script>
</html>


