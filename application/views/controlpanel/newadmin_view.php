<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/createadmin.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
</head>

<body>
	<div class="se-pre-con"></div>
	<div id="ad_main">
		<?php
	 		 if($this->session->flashdata('message'))
          {
              echo '<span class="col-md-12">'. $this->session->flashdata('message').'</span>' ;

          }
	 	?>
		<form class="form-horizontal col-md-12" id="adminform" role="form" method="post" action="<?php echo site_url('controlpanel/advanced/fcreate');?>">

                	<label class="control-label col-sm-3">Username:</label>
                	<div class="form-group">
					    <div class="col-sm-7">
					      	<input type="text" class="form-control" name="username" placeholder="Username">
					    </div>
				  	</div>

                	<label class="control-label col-sm-3" >Email:</label>
                	<div class="form-group">
					    <div class="col-sm-7">
					      	<input type="email" class="form-control" name="email" placeholder="Email">
					    </div>
				  	</div>
				
           
                	<label class="control-label col-sm-3">Password:</label>
                	<div class="form-group">
					    <div class="col-sm-7">
					      <input type="password" class="form-control"  name="password" placeholder="Password">
					    </div>
				  	</div>
				
					<label class="control-label col-sm-3">Confirm Password:</label>
                	<div class="form-group">
					    <div class="col-sm-7">
					      <input type="password" class="form-control" name="confirmpassword" placeholder="Confirn Password">
					    </div>
				  	</div>
				
                	<div class="form-group"> 
					    <div class="col-sm-8 col-md-offset-7">
					      <button type="submit" name="submit" class="btn col-md-4 btn-default">Save</button>
					    </div>
				    </div>


                   
                </form>
	
		
	</div>
	<script>

$(document).ready(function() {
	
    $('#adminform').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {

            	username: {
            		container: '#error',
	                validators: {
	                    notEmpty: {
	                        message: 'The verification code is required'
	                    }
	                }
	            }
	            
            }
        })
});





	</script>

</body>
</html>