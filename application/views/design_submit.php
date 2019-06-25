<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/design_submit_style.css"/>
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/chosen/chosen.css"/>

	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/chosen/chosen.jquery.js"></script>
	
	
	
	<!-- ckEditor: -->
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckfinder/ckfinder.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	$("#paidinput").prop('disabled', true);

	$("#radiopaid").on("click", function () {
        $("#paidinput").prop('disabled', false);
    });
    $("#radiofree").on("click", function () {
        $("#paidinput").prop('disabled', true);
    });

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
					
				</div>
			</div>
		</header>
		
		
		<div id="top_menu">
			
		</div>
		<div id="item_label">
			<div id="item_label_content">

				<ul class="nav nav-tabs">
				  <li <?php if($tab=="tab1"){echo 'class="active"';} ?>><a data-toggle="tab" href="<?php echo $t1 ['url']; ?>"><?php echo $t1['name']; ?></a></li>
				  <li <?php if($tab=="tab2"){echo 'class="active"';} ?>><a data-toggle="tab" href="<?php echo $t2 ['url']; ?>"><?php echo $t2['name']; ?></a></li>
				  <li <?php if($tab=="tab3"){echo 'class="active"';} ?>><a data-toggle="tab" href="<?php echo $t3 ['url']; ?>"><?php echo $t3['name']; ?></a></li>
				  <li <?php if($tab=="tab4"){echo 'class="active"';} ?>><a data-toggle="tab" href="<?php echo $t4 ['url']; ?>"><?php echo $t4['name']; ?></a></li>
				  <div id="btn_submit" class="pull-right"><a href=""><span class="glyphicon glyphicon-ok-circle"></span>SUBMIT AN ITEM</a></div>

				</ul>
			</div>

		</div>
		<div id="canvas">

			<div  id="canvas_header" style="padding-left:0" class="col-md-12" >
				<h4 class="wiz"> <a href="#">Home </a>/<a href="#"> Dashboard </a></h4>

				<h3><?php if(isset($tabheader)){ echo $tabheader; }?></h3>
			</div>
			<div style="width:300px;margin:0px auto;"><?php if($this->session->flashdata('msg')){echo  $this->session->flashdata('msg') ;}  ?></div>

			<div class="col-md-9" id="newitemform">
				<form name="product_form" id="multiselectForm" role="form" autocomplete="off"  class="form-horizontal"  action="<?php echo site_url('dashboard/f_addpr'); ?>" enctype="multipart/form-data" method="post">
			  	<div class="form-group">
				    <label class="control-label col-md-3">Title: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="Title" name="prTitle"/>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Category: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="caId">
				      		<option> Select Category</option>
				      		<?php
				      			if(isset($categories)){
				      				foreach ($categories as $key) {
				      					echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
				      				}
				      			}
				      		?>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Item Tag: <span style="color:red;margin-left:5px;">*</span></label>
				    <div class="tag_area col-sm-7">
				     	<select class="tag  form-control" multiple="multiple" data-placeholder="Select Options" name="tag[]">
							<?php
				      			if(isset($tags)){
				      				foreach ($tags as $key) {
				      					echo '<option style="padding-left:15px" value="'.$key['id'].'">'.$key['name'].'</option>';
				      				}
				      			}
				      		?>
						</select>

				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Price: <span style="color:red;margin-left:5px;">*</span></label>
				    <div style="padding-left:0px;"  class="col-sm-9">
					    <div class="radio col-md-12">
						  <label><input type="radio" id="radiofree" value="Free" name="prPrice">Free</label>
						  <label style="margin-left:20px;"><input type="radio" id="radiopaid" value="Pending"  name="prPrice">Paid</label>
						</div>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Future Updates:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="future_updates">
				      		<option> Select One</option>
				      		<option value="0"> Paid</option>
				      		<option value="1"> Free</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Layout:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="layout">
				      		<option> Select Layout</option>
				      		<option value="Responsive"> Responsive</option>
				      		<option value="Fluid"> Fluid</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">High Resolution:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="h_resolution">
				      		<option> Select One</option>
				      		<option value="Yes"> Yes</option>
				      		<option value="No"> No</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Bootstrap Version:<span style="color:red;margin-left:5px;"></span></label>
				    <div class="col-sm-7">
				      <select class="form-control" name="b_version">
				      		<option>Select Version</option>
				      		<option value="Bootstrap 3.x"> Bootstrap 3.x</option>
				      		<option value="Bootstrap 2.x"> Bootstrap 2.x</option>
				      		<option value="Bootstrap 1.x"> Bootstrap 1.x</option>
				      </select>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Browser:<span style="color:red;margin-left:5px;">*</span></label>
			        <div class="form-group">
				        <div class="col-sm-7" >
				            <select class="browser form-control" multiple="multiple" data-placeholder="Select Options" name="c_browser[]">
				                <option value="Google Chrome">Google Chrome</option>
				                <option value="Firefox">Firefox</option>
				                <option value="IE10">IE10</option>
				                <option value="Safari">Safari</option>
				                <option value="Opera">Opera</option>
				                <option value="Other">Other</option>
				            </select>
				        </div>
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Live Preview Url:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="http://" name="demourl"/>
				    </div>
			  	</div>
			  	<div class="form-group">

				    <label class="control-label col-md-3">Description:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">

				    <textarea  name="des" > </textarea>
				     
				      <script>
                                CKEDITOR.replace('des');
                     </script> 

				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Main File:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="file" name="mainfile">
                      <span class="text-muted">Upload theme file which will get buyer.<br/>Only .zip file format is allowed.</span>
					</div>

			  	</div>
			  	<div class="form-group">
				    <label class="control-label col-md-3">Thumbnail:<span style="color:red;margin-left:5px;">*</span></label>
				    <div class="col-sm-7">
				      <input type="file" onchange="loadFile(event)" name="image">
                      <span class="text-muted">Upload a thumbnail of template screenshot. Only PNG file format is allowed.<br/>The image resolution should be exact 850X660 PX.</span>
					</div>
				
				    

			  	</div>
			  	<div id="form_buttons">
				  	<button class="btn btn-success submit" type="submit" name="prosubmit">SUBMIT </button>
				  	<button class="reset btn btn-primary" type="reset">Reset</button>
				</div>





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
					foreach ($categories4nav as $navca) {
						$c++;
						if($c<6)
						{
						echo '<li>   <a href="'.site_url().'filter/scale/category/'.$navca['id'].'">'.$navca['name'].'</a>
								<ul>';
						foreach ($tags4nav as $navtag) {
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
    		<li> <a class="navlink" href="#"> Admin Template</a></li>
    		<li> <a class="navlink" href="#"> Blog</a> </li>
    		<li> <a class="navlink" href="#"> Business</a> </li>
    		<li> <a class="navlink" href="#"> Ecommerce</a> </li>
    		<li> <a class="navlink" href="#"> Entertainment</a> </li>
    		<li> <a class="navlink" href="#"> Corporate Business</a> </li>
    		<li> <a class="navlink" href="#"> Creative</a> </li>
    		<li> <a class="navlink" href="#"> Wedding</a> </li>
    		<li> <a class="navlink" href="#"> Wordpress</a> </li>
    		<li class="navlink_header"> HELP </li>
    		<li> <a class="navlink" href="#"> Community Forum</a> </li>
    		<li> <a class="navlink" href="#"> Contact Us</a> </li>

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
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
</body>
<script> 
$(document).ready(function(){

	$(".browser").chosen({no_results_text: "No result found for" ,width: "96%"});
	$(".tag").chosen({no_results_text: "No result found for", max_selected_options: 5});  


   $("#btn_trigger").mouseenter(function(){
        $("#loginpanel").hide();
        $("#userpanel").hide();
        $("#side_nav").fadeIn();
    });
    $("#side_nav").mouseleave(function(){
        $("#side_nav").fadeOut();
    });

    $("#side_nav").mouseenter(function(){
        $("#side_nav").show();
    });
    $(".btn_t").click(function(){
        $("#side_nav").hide();
        $("#userpanel").hide();
        $("#loginpanel").fadeToggle();
    });
    $("#logeduser_c").mouseenter(function(){
        $("#side_nav").hide();
        $("#loginpanel").hide();
        $("#userpanel").show();
    });
    $("#logeduser_c").mouseleave(function(){
        $("#userpanel").hide();
    });
    $("#userpanel").mouseenter(function(){
        $("#userpanel").show();
    });
    $("#userpanel").mouseleave(function(){
        $("#userpanel").hide();
    });


 $('[data-toggle="tooltip"]').tooltip();

		

  });
</script>

</html>


