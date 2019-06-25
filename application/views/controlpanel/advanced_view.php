<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/advanced.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
</head>

<body>
	<div class="se-pre-con"></div>
	<div id="ad_main">
		<table class="table table-hover table-bordered">
		    <thead>
		      	<tr>
			  	    <th class="numbr center">No</th>
			        <th class="center">Username</th>
			        <th class="center">email</th>
			        <th class="center">Date</th>
			        <th class="center">Action</th>
		      	</tr>
		    </thead>
		    <tbody>
			<?php foreach ($result as $key): $segment++; ?>
				<tr>
	                <th scope="row" style="font-weight: normal;" class="center"><?php echo $segment; ?></th>
					<td><?php  echo $key['u_n']; ?></td>
			  		<td class="center"><?php   echo $key['email'];   ?></td>
			  		<td class="center"><?php  echo $key['date']; ?></td>
			  		 <td class="center">  [ <a onClick='return confirm("Are you sure want to delete this entry ?");' href="<?php echo site_url('controlpanel/advanced/delete/'.$key['id']); ?>">Delete</a> ]</td>
		      	</tr>
			<?php endforeach; ?>
		    
		</table>
		
	</div>
</body>
</html>