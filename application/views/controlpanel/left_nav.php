<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/left_nav_style.css"/>
	<link rel="icon" type="image/x-icon" href="<?php echo site_url(); ?>site_elements/control panel/icon.png"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>

</head>
<body>
	<div class="pull-left" id="main">
    	<div id="logo">
    		<h2>Themes Haven</h2>
    		<h3>Control Panel</h3>
       	</div>
    	<div id="control_options">
	    		<div class="nav_op"><li class="<?php if($tab=='tab1'){echo "active";}?>"> <a href="<?php echo $prefixLN;?>dashboard/General"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li></div>
	    		<div class="nav_op"><li class="<?php if($tab=='tab2'){echo "active";}?>"> <a href="<?php echo $prefixLN;?>categories/all"><span class="glyphicon glyphicon-th-list"></span> Categories</a></li></div>
	    		<div class="nav_op"><li class="<?php if($tab=='tab3'){echo "active";}?>"><a href="<?php echo $prefixLN;?>products/all"> <span class="glyphicon glyphicon-list-alt"></span> Products</a></li></div>
	    		<div class="nav_op"><li class="<?php if($tab=='tab4'){echo "active";}?>"><a href="<?php echo $prefixLN;?>customer"> <span class="glyphicon glyphicon-user"></span> Customers</a></li></div>
	    		<div class="nav_op"><li class="<?php if($tab=='tab5'){echo "active";}?>"> <a href="<?php echo $prefixLN;?>sales"><span class="glyphicon glyphicon-share"></span> Sales</a></li></div>
	    		<div class="nav_op"><li class="<?php if($tab=='tab6'){echo "active";}?>"> <a href="<?php echo $prefixLN;?>information/aboutus"><span class="glyphicon glyphicon-file"></span> Information</a></li></div>
	    		<div class="nav_op"><li class="<?php if($tab=='tab7'){echo "active";}?>"> <a href="<?php echo $prefixLN;?>settings"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li></div>
	    		<?php if($this->session->batch == 'superadmin'){ ?>
	    		<div class="nav_op"><li class="<?php if($tab=='tab8'){echo "active";}?>"> <a href="<?php echo $prefixLN;?>advanced"><span class="glyphicon glyphicon-cog"></span> Advanced</a></li></div>
	    		<?php } ?>
	    		<div class="nav_op logout"><li> <a href="../Logout"><span class="glyphicon glyphicon-log-out"></span> Logout</br><h4>(<?php if($this->session->username){echo $this->session->username;} ?>)</h4></a></li></div>


	    		<!-- 
				<li><span class="glyphicon glyphicon-home"></span> Dashboard</li>
	    		<li><span class="glyphicon glyphicon-th-list"></span> Categories</li>
	    		<li><span class="glyphicon glyphicon-list-alt"></span>  Products</li>
	    		<li><span class="glyphicon glyphicon-tree-conifer"></span>  Customers</li>
	    		<li><span class="glyphicon glyphicon-file"></span>  Catalog</li>
	    		<li><span class="glyphicon glyphicon-share"></span>  Sales</li>
	    		<li><span class="glyphicon glyphicon-wrench"></span>  System</li>
	    		<li><span class="glyphicon glyphicon-cog"></span>  Advanced</li> 

				glyphicon glyphicon-tree-conifer
	    		-->
	    	
    	</div>

    </div>
</body>
</html>