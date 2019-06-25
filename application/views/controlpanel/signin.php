<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SignUp - Account Information </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/signin_style.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<style>
 		 body {background-color:#F3F6FB;}
 	</style>

</head>
<body>
	<div id="main" class="container">
		<div class="col-md-6 container" id="box">
			<div id="b_head">
				<p class="head_title"> Admin Panel Login  </p>
			</div>

				<div id="info">
				<?php
	 		 if($this->session->flashdata('msg'))
          {
              echo '<span class="msg col-md-10">'. $this->session->flashdata('msg').'</span>' ;

          }
	 	?>
					<form name="login_form" action="<?php echo site_url('ControlPanel/Login/checkpoint');?>" method="post">
						<div class="form-group">
						    <input type="text" class="form-control" placeholder="Admin ID" autocomplete="off" name="username">
							<i class="glyphicon glyphicon-user"></i>
						</div>
						<div class="form-group">
						    <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="pwd">
							<i class="glyphicon glyphicon-lock"></i>
						</div>
						  <button type="submit" class="btn btn-default">Login</button>
						  <div class="checkbox">
						    <div class="col-md-7"><input type="checkbox"> Remember me</label></div>
						    <div class="fp"><a href="#">Forget Password</a></label></div>
						   </div>
					</form>
				</div>
		</div>
	</div>
</body>
</html>