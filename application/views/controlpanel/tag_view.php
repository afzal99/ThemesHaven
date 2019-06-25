<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="icon" type="image/png" href="<?php echo site_url(); ?>site_elements/ico.png"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/categories_view_style.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/modernizr.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>


</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="ca_main">
    	<div class="col-md-12" id="ca_contents">
    			<?php
	 		 if($this->session->flashdata('msg'))
          {
              echo '<span style="margin-left:40%" class="msg col-md-10">'. $this->session->flashdata('msg').'</span>' ;

          }
	 	?>
	    		<table class="table table-hover table-bordered">
				    <thead>
				      <tr >
				  	    <th class="numbr center">No</th>
				        <th class="center">Tag Name</th>
				        <th class="center">Status</th>
				        <th class="center">Action</th>
				      </tr>
				    </thead>
				    <tbody>

	    		
	    			<?php foreach ($tags as $key): $segment++; ?>
	    				<tr>
                            <th scope="row" style="font-weight: normal;" class="center"><?php echo $segment; ?></th>
	    					<td><?php   echo $key['name'];   ?></td>
	    			  		
	    			  		<td class="center"><?php   echo $key['status'];   ?></td>
                            <td class="center">[ <a href="<?php echo site_url('controlpanel/Categories/tagview/'.$key['id']); ?>">View</a> ]  [ <a onClick='return confirm("Are you sure want to delete this element ?");' href="<?php echo site_url('controlpanel/Categories/tagdelete/'.$key['id']); ?>">Delete</a> ]</td>
				      
	    			  	</tr>




	    				
	    			
	    			<?php endforeach; ?>
				    </tbody>
				  </table>
				  <input id="base_url" type="hidden" value="<?php echo base_url();?>"/>
                 <input id="site_url" type="hidden" value="<?php echo site_url();?>"/>
				  <div id="page_num"><?php echo $this->pagination->create_links(); ?> </div>
    	 </div>

    </div>

</body>
</html>