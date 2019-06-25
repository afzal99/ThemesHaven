<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/product_view_style.css"/>

</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="pr_main">
		<div class="col-md-12" id="ca_contents">
	    		<table class="table table-hover table-bordered">
				    <thead>
				      <tr >
				  	    <th class="numbr center">No</th>
				        <th class="center">Title</th>
				        <th class="center">Category</th>
				        <th class="center">Price</th>
				        <th class="center">Status</th>
				        <th class="center">Author</th>
				        <th class="center">Date Added</th>
				        <th class="center"><span class="fixed_width">Action</span></th>
				      </tr>
				    </thead>
				    <tbody>

	    		
	    			<?php foreach ($products as $key): $segment++; ?>
	    				<tr>
                            <th scope="row" style="font-weight: normal;" class="center"><?php echo $segment; ?></th>
	    					<td class="center"><?php  echo $key['title']; ?></td>
	    			  		<?php 
	    			  		foreach ($category as $ca) {
                                    if($key['category_id'] == $ca['id'])
                                    {
                                        echo '<td class="center">'.$ca['name'].'</td>';
                                    }
                                }
	    			  		?>
	    			  		<td class="center"><?php  echo $key['price']; ?></td>
	    			  		<td class="center"><?php  echo $key['status']; ?></td>
	    			  		<?php
	    			  			if($key['author']=='1')
	    			  			{
	    			  				foreach ($author_admin as $aa) {
	                                    if($key['author_id'] == $aa['id'])
	                                    {
	                                        echo '<td class="center text-danger">'.$aa['u_n'].'</td>';
	                                    }
                                	}
	    			  			}
	    			  			else
	    			  			{
		    			  			foreach ($author_cus as $cus) {
	                                    if($key['author_id'] == $cus['id'])
	                                    {
	                                        echo '<td class="center text-success">'.$cus['username'].'</td>';
	                                    }
	                                }
                            	}
                            ?>
	    			  		<td class="center"><?php  echo $key['date_added']; ?></td>
	    			  		<td class="center">[ <a href="<?php echo site_url('controlpanel/Products/view/'.$key['product_id']); ?>">View</a> ]  [ <a onClick='return confirm("Are you sure want to delete this item ?");' href="<?php echo site_url('controlpanel/Products/delete/'.$key['product_id']); ?>">Delete</a> ]</td>
				      
				      
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