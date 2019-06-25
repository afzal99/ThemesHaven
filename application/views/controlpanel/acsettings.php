<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/acsettings.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrapValidator.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
    <script src="<?php echo site_url(); ?>site_elements/js/bootstrapValidator.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/scripts_a.js"></script> 
</head>

<body>
	<div class="se-pre-con"></div>
	<div id="info_main">
		<div style="text-align:center; margin-left:100px"><?php if($this->session->flashdata('msg')){echo  $this->session->flashdata('msg') ;} ?></div>
		<form class="form-horizontal col-md-12" id="accountsettings" role="form" method="post" action="<?php echo site_url('controlpanel/settings/updatesettings');?>">
                <?php foreach ($result as $key) {  ?>

                	<label class="control-label col-sm-4">Username:</label>
                	<div class="form-group">
					    <div class="col-sm-6">
					      <input type="text" class="form-control" name="username" value="<?php echo $key['u_n']; ?>">
					      <div id="error"> </div>
					    </div>
				  	</div>

                	<label class="control-label col-sm-4" >Email:</label>
                	<div class="form-group">
					    <div class="col-sm-6">
					      	<input type="email" class="form-control" name="email" value="<?php echo $key['email']; ?>">
					    	<span id="emailerror"> </span>
					    </div>
				  	</div>
				
           
            <?php } ?>
                	<label class="control-label col-sm-4">Password:</label>
                	<div class="form-group">
					    <div class="col-sm-6">
					      <input type="password" class="form-control" required  name="existingpass" placeholder="Password">
					    </div>
				  	</div>
				
                	<label class="control-label col-sm-4">New Password:</label>
                	<div class="form-group">
					    <div class="col-sm-6">
					      <input type="password" class="form-control" name="newpass" placeholder="Enter New Password">
					    </div>
				  	</div>
					
					<label class="control-label col-sm-4">Confirm Password:</label>
                	<div class="form-group">
					    <div class="col-sm-6">
					      <input type="password" class="form-control" name="confirmpass" placeholder="Confirn New Password">
					    </div>
				  	</div>
				
                	<div class="form-group"> 
					    <div class="col-sm-8 col-md-offset-4">
					      <button type="submit" name="submit" class="btn col-md-4 btn-default">Save</button>
					      <button type="reset" class="btn col-md-offset-1 col-md-4 btn-default">reset</button>
					    </div>
				    </div>


                   
                </form>
	</div>
</body>
</html>