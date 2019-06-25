<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/menu_view_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
    <link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/control panel/icon.png"/>
    
	<script src="<?php echo site_url(); ?>site_elements/js/bootstrap.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>

</head>
<body>
	<div class="container" id="m_main">
    	<div class="col-md-12" id="div_content">
        	<div class="col-md-12" id="content_title">
        			<h2><?php echo $title;  ?> </h2>
        	</div>
        	<div class="col-md-12 " id="content_nav">
        		
        		<?php if($t1!=null) { ?>

                    <div class="nav_item <?php if($s_tab=='s_tab1'){echo "ac_nav_item";}?>">
    			    	<li><a href="<?php echo $t1['url']; ?>"><?php echo $t1['name'] ?></a></li>
    			    </div>

                <?php } if($t2!=null){ ?>
                     <div class="nav_item <?php if($s_tab=='s_tab2'){echo "ac_nav_item";}?>">
    			    	<li><a href="<?php echo $t2['url']; ?>"><?php echo $t2['name'] ?> </a></li>
    			     </div>
        		<?php } if($t3!=null){ ?>
        			<div class="nav_item <?php if($s_tab=='s_tab3'){echo "ac_nav_item";}?>">
    			         <li><a href="<?php echo $t3['url']; ?>"><?php echo $t3['name']; ?></a></li>
    			    </div>
        		<?php } if($t4!=null){ ?>
        			<div class="nav_item <?php if($s_tab=='s_tab4'){echo "ac_nav_item";}?>">
    			    	<li><a href="<?php echo $t4['url']; ?>"><?php echo $t4['name']; ?></a></li>
    			    </div>

                <?php } ?>

        	</div>
     </div>

    </div>
</body>
</html>