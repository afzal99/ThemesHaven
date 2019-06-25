<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/dashboard_style.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/account_settings_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<script src="<?php echo site_url(); ?>site_elements/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/tooltip.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/ac_set.js"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
</head>
<body>
	<div id="d_main">
		<header id="anchor">
			<div  id="header">
				<div class="col-md-2" id="logo"><a href="../home"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div> 

				<div class="col-md-6" id="s_bar">
				  <form method="" action="">
				  	<input type="text" name="key" autocomplete="off" placeholder="Search Templates"/> 
				  </form>
				</div>
				<div id="h_links">
					<?php if($this->session->userid){ ?>
					<div id="logeduser"><span id="logeduser_c"><img   src="<?php echo site_url(); ?>site_elements/avater/<?php if(isset($avatar)){if($avatar != ""){echo $avatar;}else{ echo 'uicon.png'; } } ?>" /> <span><?php echo $this->session->user;  ?></span> <span class="glyphicon glyphicon-chevron-down"> </span> </span></div>
					<?php } 
					else
					{ ?>
						<span class="btn_t">
							<a href="signin" id="btn_login" class="btn btn-success loginbtn">Sign in</a>
						</span>
						<a  href="signup" class="btn btn-primary btn_create">Create Account</a>
					<?php } ?>
					<div id="btn_trigger" ><img  src="<?php echo site_url(); ?>site_elements/navicon.png" /></div>
					
					<!-- <?php if($this->session->userid){ echo '<div style="display:none;"  id="btn_user"><img height="37" src=" '.site_url().'site_elements/user.png" /></div>' ;}   ?> -->

				</div>
			</div>
		</header>
		
		
		<div id="top_menu">
			
		</div>
		<div id="item_label">
			<div id="item_label_content">
				<ul class="nav nav-tabs">
				  <li <?php if($tab=="tab1"){echo 'class="active"';} ?>><a href="<?php echo $t1 ['url']; ?>"><?php echo $t1['name']; ?></a></li>
				  <li <?php if($tab=="tab2"){echo 'class="active"';} ?>><a href="<?php echo $t2 ['url']; ?>"><?php echo $t2['name']; ?></a></li>
				  <li <?php if($tab=="tab3"){echo 'class="active"';} ?>><a href="<?php echo $t3 ['url']; ?>"><?php echo $t3['name']; ?></a></li>
				  <li <?php if($tab=="tab4"){echo 'class="active"';} ?>><a href="<?php echo $t4 ['url']; ?>"><?php echo $t4['name']; ?></a></li>

				<div id="btn_submit" class="pull-right"><a href="submitdesign"><span class="glyphicon glyphicon-ok-circle"></span>SUBMIT AN ITEM</a></div>
				</ul>
			</div>

		</div>
		<div id="canvas">

			<div id="canvas_header" style="padding-left:0" class="col-md-12" >
				<h4 class="wiz"> <a href="../home">Home </a>/<span class="text-success"> Dashboard </span></h4>

				<h3><?php if(isset($tabheader)){ echo $tabheader; }?></h3>
			</div>

			<div class="settings_area"> <?php foreach ($result as $key) { ?>
				
			<?php if($this->session->flashdata('msg')){echo '<div style="position:relative; margin-left:35%">'. $this->session->flashdata('msg').'</div>' ; } ?>


				<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"  action="<?php echo site_url('dashboard/updatesettings');?>">
                <table>
                    <tbody>
                    	<tr>
                            <th class="col-md-2">First Name: </th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="firstname" value="<?php echo $key['firstname']; ?>">
								    </div>
							  	</div>
							</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Last Name: </th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="lastname" value="<?php echo $key['lastname']; ?>">
								    </div>
							  	</div>
							</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Username: </th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="username" value="<?php echo $key['username']; ?>">
								    </div>
							  	</div>
							</td>
                        </tr>
                            <th class="col-md-2">Email: </th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="email" class="form-control" name="email" value="<?php echo $key['email']; ?>">
								    </div>
							  	</div>
							</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Password: </th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="password" class="form-control" name="password" required placeholder="Password">
								    </div>
							  	</div>
							</td>
                        </tr>
                        <tr>
                        	<th class="col-md-2"></th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password">
								    </div>
							  	</div>
							</td>
                        </tr>
                        <tr>
                        	<th class="col-md-2"></th>
                            <td class="col-md-3">
                            	<div class="form-group">
								    <div class="col-sm-10">
								      <input type="password" class="form-control" name="confirmpassword" placeholder="Confirn New Password">
								    </div>
							  	</div>
							</td>
                        </tr>
                        <tr>
                    	
                            <th class="col-md-2">Profile Picture:<a href="#0" data-trigger="hover" data-toggle="popover" title="Resolution : 200*200  "  data-content="Max-size: 400kb"><span class="glyphicon glyphicon-question-sign"></span></a></th>
              
                            <td class="col-md-6">
                            	<div class="form-group">
								    <div class="col-sm-10">
								    	<img width="200px"; id="output"/>
                            			<input type="file" onchange="loadFile(event)" name="image">
                            			<span class="text-muted">Only PNG file format is allowed.<br/>The image resolution should be exact 200X200 PX.</span>
                            		</div>
                            	</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3"></th>
                            <td class="col-md-6">
                            	<div class="form-group"> 
								    <div class="col-sm-10">
								      <button type="submit" name="updatesubmit" class="btn col-md-4 btn-success">Save</button>
								      <button type="reset" class="btn col-md-offset-1 col-md-4 btn-primary">reset</button>
								    </div>
							    </div>


                            </td>
                        </tr>


                    </tbody>
                </table><?php	} ?>
                </form>
            








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
						if($c<6)
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
							if($c>5)
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
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
</html>


