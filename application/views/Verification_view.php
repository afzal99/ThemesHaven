<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Email verification</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/signup_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrapValidator.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
    <script src="<?php echo site_url(); ?>site_elements/js/bootstrapValidator.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/scripts.js"></script> 
	<style>
		body{background-color:rgb(242, 247, 249);}
	</style>
	

</head>
<body>
	<header>
			<div class="col-md-12" id="header">
				<div id="logo">  <a href="home"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div> 

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
							<a href="<?php echo site_url('signin'); ?>" id="btn_login" class="btn btn-success loginbtn">Sign in</a>
						</span>
						<a  href="<?php echo site_url('signup'); ?>" class="btn btn-primary btn_create">Create Account</a>
					<?php } ?>
					<div id="btn_trigger" ><img  src="<?php echo site_url(); ?>site_elements/navicon.png" /></div>
					
				</div>
			</div>
	</header>
	<div id="main">
		<div class="col-md-1"></div>
    	<div class="col-md-10" id="content_area">
	    	<div id="content_label">
	    		<h2> Verify your email </h2>
	    	</div>
	    	<div class="col-md-12">
	    		<div class="col-md-12" id="area_hed">
	    			 <div id="mx" class="col-md-10"><h4>A verification code has been sent to your email</h4><h4 id="stepname"><?php echo $email; ?></h4> </div>
	    		</div>
	    		<?php echo $this->session->flashdata('falsevcode'); ?>
	    		<div class="col-md-12" id="info_area">
	    			<div class="col-md-9">
	    				
	    				<form id="verificationForm"  action="<?php echo site_url('signup/Verification');?>" method="post" >
							<div class="form-group">
							    <input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>" />
							</div>
							<div class="form-group">
							    <label for="vcode">Verification Code <span class="text-danger">*</span></label>
							    <input type="text" placeholder="code" autocomplete="off" class="form-control" name="vcode"/>

							</div>
							  <button type="submit" name="vcsubmit"  class="btn btn-default">Submit</button>
						</form>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
	<script>
		document.getElementById("stepname").style.fontSize = "14px";
		document.getElementById("mx").style.fontSize = "14px";



	</script>

</body>
</html>