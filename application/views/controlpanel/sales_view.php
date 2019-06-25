<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/sales_style.css"/>
	<link rel="icon" type="image/x-icon" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>

</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="s_main">
	    		<table class="table table-hover table-bordered">
				    <thead>
				      	<tr>
					  	    <th class="numbr center">No</th>
					        <th class="center">Product Name</th>
					        <th class="center">Customer</th>
					        <th class="center">Date</th>
					        <th class="center">Payment</th>
				      	</tr>
				    </thead>
				    <tbody>
	    			<?php foreach ($sales as $key): $segment++; ?>
	    				<tr>
                            <th scope="row" style="font-weight: normal;" class="center"><?php echo $segment; ?></th>
	    					<td><?php  echo $key['product_name']; ?></td>
	    			  		<td class="center"><?php   echo $key['customer_un'];   ?></td>
	    			  		<td class="center"><?php  echo $key['date']; ?></td>
	    			  		<td class="center"><?php   echo $key['payment'];   ?></td>
				      	</tr>
	    			<?php endforeach; ?>
				    
				</table>
				  	<input id="base_url" type="hidden" value="<?php echo base_url();?>"/>
                 	<input id="site_url" type="hidden" value="<?php echo site_url();?>"/>
				  	<div id="page_num"><?php echo $this->pagination->create_links(); ?> </div>


	</div>
</body>

</html>