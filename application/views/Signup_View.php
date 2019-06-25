<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SignUp  ThemesHaven</title>
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
	    		<h2> Sign Up </h2><h3>Form Wizard </h3>
	    	</div>
	    	<div class="col-md-12" id="stage">
	    		<div class="col-md-3">
	    			<div class="p_ico" style="background-color:rgba(247, 73, 73, 0.78);" id="step1"></div>
	    			<div class="p_info">
	    				<h1> Account Information </h1>
	    				<h2> Enter login information</h2>
	    				<h3> username, password, email.</h3>

	    			</div>
	    		</div>
	    		<div class="col-md-3">
	    			<div class="p_ico" id="step2"></div>
	    			<div class="p_info">
	    				<h1> Personal Information </h1>
	    				<h2> Enter your personal detail</h2>
	    				<h3>full name, gender etc.</h3>
	    			    

	    			</div>
	    		</div>
	    		<div class="col-md-3">
	    			<div class="p_ico" id="step3"></div>
	    			<div class="p_info">
	    				<h1> Payment Information </h1>
	    				<h2> Select Payment Method</h2>
	    				<h3>type, payment via etc.</h3>

	    			</div>
	    		</div>
	    		<div class="col-md-3">
	    			<div class="p_ico" id="step4"></div>
	    			<div class="p_info">
	    				<h1> Confirm Your Details </h1>
	    				<h2> Verify Your Information</h2>
	    				<h3>given in previous steps.</h3>

	    			</div>
	    		</div>

	    	</div>
	    	<div class="col-md-12">
	    		<div class="col-md-12" id="area_hed">
	    			<div class="col-md-10"><h1 id="stepname">Account </h1> <h2>Information</h2></div> <div class="col-md-2"><p id="step_n">Steps 1-4</p></div>
	    		</div>
	    		<?php
			 		 if($this->session->flashdata('msg'))
			          {
			              echo '<span class="col-md-10">'. $this->session->flashdata('msg').'</span>' ;

			          }

			          // echo validation_error();
			 	?>
	    		<div class="col-md-12" id="info_area">
	    			<div class="col-md-9">
	    							      <!-- action="<?php  site_url('Signup/checkpoint');?>"  -->
	    
	    				<form id="signupForm" method="post" autocomplete="off" action="<?php echo site_url('signup/checkpoint');?>" class="form-horizontal" action="target.php">
	    					<div id="first_step">
	    						<!--Account Information-->
							  <div class="form-group">
							    <label for="username">User Name <span class="text-danger">*</span></label>
							    <input type="text" placeholder="Login" class="form-control" id="username" name="username"/>
							  	<?php echo form_error('username', '<p class="text-danger error">', '</p>'); ?>
							 	<span class="help-block" id="usernameMessage" />
							 	<span id="unmessage"></span>
							  	<div id="uload"> <img src="<?php echo site_url(); ?>site_elements/loading.gif" alt="loading" /></div>
							  </div>

							  <div class="form-group">
							    <label for="email">Email address <span class="text-danger">*</span></label>
							    <input  type="email" placeholder="Email address" class="form-control" id="email"  name="email" />
							  	<?php echo form_error('email', '<p class="text-danger error">', '</p>'); ?>
							  	<span id="message"></span>
							  	<span id="emailmsg"></span>
							  	<div id="load"> <img src="<?php echo site_url(); ?>site_elements/loading.gif" alt="loading" /></div>
							  </div>

							  <div class="form-group">
							    <label for="pwd">Password <span class="text-danger">*</span></label>
							    <input type="password" data-minlength="5" placeholder="Password" class="form-control" id="pass1" name="password" />
							  	<?php echo form_error('password', '<p class="text-danger error">', '</p>'); ?>
							  </div>

							  <div class="form-group">
							    <label for="pwd">Confirm Password <span class="text-danger">*</span></label>
							    <input type="password" placeholder="Confirm Password" class="form-control" id="pass2" name="confirmPassword" />
							  	<?php echo form_error('confirmPassword', '<p class="text-danger error">', '</p>'); ?>
							  </div>

							  <a id="btn_next" onclick="signup(),secondstep()" class="btn btn-primary pull-right btn1"><h2>Next Step</h2><h3>Personal Information</h3></a>
							</div>

							<div id="second_step">
							  <!--Personal Information-->

							  <div class="form-group">
							    <label for="fname">First Name <span class="text-danger">*</span></label>
							    <input type="text" placeholder="Name" class="form-control" name="firstName" />
							  	<?php echo form_error('firstName', '<p class="text-danger error">', '</p>'); ?>
							  </div>

							  <div class="form-group">
							    <label for="lname">Last Name <span class="text-danger">*</span></label>
							    <input type="text" placeholder="Surname" class="form-control" name="lastName" />
							  	<?php echo form_error('lastName', '<p class="text-danger error">', '</p>'); ?>
							  </div>

							  <div class="form-group">
							    <label for="sex">Gender</label><br>
								<select class="form-control" name="gender">
								    <option value="" >Select</option>
								    <option value="male">Male</option>
								    <option value="female">Female</option>

								</select>
							  </div>

							  <div class="form-group">
							    <label for="lname">Country <span class="text-danger">*</span></label>
								<select class="form-control" name="country">
								    <option value="">Select your country</option>
								    <option value="Bangladesh">Bangladesh</option>
								 </select>
							  	<?php echo form_error('country', '<p class="text-danger error">', '</p>'); ?>
							  </div>

							  <div class="form-group">
							    <label for="state">State <span class="text-danger">*</span></label>
								<select class="form-control" name="state">
									<option value="">Select a state</option>
								    <option value="Dhaka">Dhaka</option>
								    <option value="Chittagong">Chittagong</option>
								    <option value="Comilla">Comilla</option>
								    <option value="Rajshahi">Rajshahi</option>
								    <option value="Sylhet">Sylhet</option>
								    <option value="Rangpur">Rangpur</option>
								 </select>
							  	<?php echo form_error('state', '<p class="text-danger error">', '</p>'); ?>
							  </div>


							  <div class="form-group">
							    <label for="lname">Zip Code <span class="text-danger">*</span></label>
							    <input type="text" placeholder="Code" class="form-control" name="zip" />
							  	<?php echo form_error('zip', '<p class="text-danger error">', '</p>'); ?>
							  </div>


							<a id="btn_next"  onclick="firststep()" class="btn btn-primary btnp1"><h2>Previous Step</h2><h3>Account Information</h3></a>
							<a id="btn_next"  onclick="signup(),thirdstep()" class="btn btn-primary pull-right btn2"><h2>Next Step</h2><h3>Payment Information</h3></a>
							
							</div>

							<div id="third_step">
							<!--Payment Information-->
								<div class="form-group">
							    <label for="lname">Payment Method</label>
								<select class="form-control" name="paymentmethod">
								    <option value="">Select payment option</option>
								    <option value="BKash">BKash</option>
								    <option value="DBBL">DBBL</option>
								    <option value="MCash">MCash</option>
								    <option class="paycard disabled" value="Visa" disabled>Visa</option>
								    <option class="paycard" value="Master Card" disabled>Master Card</option>
								 </select>
							  	<?php echo form_error('paymentmethod', '<p class="text-danger error">', '</p>'); ?>
							 	 </div>
							 	 <div class="form-group">
								    <label for="lname">Mobile No</label>
								    <input type="text" placeholder="Number" class="form-control" name="paynumber" />
							  	<?php echo form_error('paynumber', '<p class="text-danger error">', '</p>'); ?>
								 </div>

							 	<div id="cardinfo">
									  <div class="form-group">
									    <label for="cardno">Card Number</label>
									    <input type="text" placeholder="Number" class="form-control" name="cardnum" />
									  </div>

									  <div class="form-group">
									    <label for="cardno">Card Holder Name</label>
									    <input type="text" placeholder="Enter your email ID" class="form-control" name="cardemail" />
									  </div>
									  <div class="form-group">
									    <label for="cardno">CVC</label>
									    <input type="text" placeholder="Cvc" class="form-control" name="cvc" />
									  </div>
							  	</div>
							<a id="btn_next"  onclick="secondstep()" class="btn btn-primary btnp2"><h2>Previous Step</h2><h3>Personal Information</h3></a>
							<a id="btn_next"  onclick="signup(),fourthstep()" class="btn btn-primary pull-right btn3"><h2>Next Step</h2><h3>Confirm Information</h3></a>
							



							</div>
							<div id="fourth_step">
							  <!--Confirm Information-->
							  	<p class="text-danger text-center" id="conwr"></p>
							  	<div id="confirminfo"></div>


								<div class="form-group">
		                            <label style="margin-left:-100px" class="col-lg-3 control-label" id="captchaOperation"></label>
		                            <input type="text" class="form-control" placeholder="result" style="margin-left:10px;" name="captcha" />
		                        </div>

							  	<a id="btn_next"  onclick="thirdstep()" class="btn btn-primary btnp3"><h2>Previous Step</h2><h3>Personal Information</h3></a>
								<button id="btn_next" type="submit" name="signupsubmit"  onclick="signupvalidation()" class="btn btn-success pull-right">Signup</button>
							
							</div>
							</form>   <!-- end of signup form -->
	    			</div>

	    		</div>


				
				



	    	</div>



    	</div>
    	<div class="col-md-1"></div>
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
// 	document.getElementById("btn_login").addEventListener("click", function(event){
// 	     event.preventDefault()
// 	});
// 	$(document).ready(function() {

// });
</script>
</html>