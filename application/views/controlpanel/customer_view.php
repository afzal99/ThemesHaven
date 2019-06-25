<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/customer_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>

</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="cus_main">
	    		<table class="table table-hover table-bordered">
				    <thead>
				      	<tr>
					  	    <th class="numbr center">No</th>
					        <th class="center">Customer Name</th>
					        <th class="center">Email</th>
					        <th class="center">Username</th>
					        <th class="center">Email Verified</th>
					        <th class="center">Date Registered</th>
					        <th class="center">Action</th>
				      	</tr>
				    </thead>
				    <tbody>
	    			<?php foreach ($customer as $key): $segment++; ?>
	    				<tr>
                            <th scope="row" style="font-weight: normal;" class="center"><?php echo $segment; ?></th>
	    					<td><?php  echo $key['firstname'].' '.$key['lastname'];   ?></td>
	    			  		<td class="center"><?php  echo $key['email'] ?></td>
	    			  		<td class="center"><?php   echo $key['username'];   ?></td>
	    			  		<td class="center"><?php  if($key['is_verified'] =='1'){echo 'Yes';}else{echo 'No';};   ?></td>
	    			  		<td class="center"><?php   echo $key['date_registered'];   ?></td>

                            <td class="center">  [ <a onClick='return confirm("Are you sure want to delete this category ?");' href="<?php echo site_url('controlpanel/Categories/delete/'.$key['id']); ?>">Delete</a> ]</td>
				      	</tr>
	    			
	    			<?php endforeach; ?>
				    
				</table>
				  	<input id="base_url" type="hidden" value="<?php echo base_url();?>"/>
                 	<input id="site_url" type="hidden" value="<?php echo site_url();?>"/>
				  	<div id="page_num"><?php echo $this->pagination->create_links(); ?> </div>


	</div>
</body>

</html>