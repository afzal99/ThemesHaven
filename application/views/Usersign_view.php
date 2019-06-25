<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signin ThemesHaven</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/usignin_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrapValidator.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrapValidator.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/homescripts.js"></script> 
	<style>
		body{background-color:rgb(242, 247, 249);}
	</style>
</head>
<body>

	
	<div class="col-md-4 col-md-offset-4"  id="info">
	<div id="logo">  <a href="home"> <p><h3>Themes</h3><h4>Haven</h4></p></a></div>
	<div id="loginheader"> <p> Log Into My Account</p> </div>
	<?php if($this->session->flashdata('lmsg')){echo '<div style="position:absolute;padding-left:33px;margin-top:-24px;">'. $this->session->flashdata('lmsg').'</div>' ;}?>


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
		 	<div id="checkbox">
		    	<div class="col-md-7"><input type="checkbox"> Remember me</label></div>
		    	<div class="FP"><a href="#">Forget Password</a></label></div>
		    </div>


		</form>
	</div>

 
	 

</body>
</html>