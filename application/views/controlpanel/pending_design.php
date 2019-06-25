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
	    					<td class="center">
	    			  		<?php 
	    			  		foreach ($category as $ca) {
                                    if($key['category_id'] == $ca['id'])
                                    {
                                        echo $ca['name'];
                                    }
                                }
	    			  		?>
	    			  		</td>
	    			  		<?php
	    			  			if($key['price'] == "Free")
	    			  			{
	    			  				echo '<td class="center">Free</td>';
	                                
                           		}
                           		else
                           		{
                           			echo '<td class="center text-primary">Pending</td>';
                           		}
                            ?>
	    			  		<td class="center">
	    			  		<?php
	    			  			foreach ($author_cus as $author) {
                                    if($key['author_id'] == $author['id'])
                                    {
                                        echo $author['username'];
                                    }
                                }
                            ?>
                            </td>
	    			  		<td class="center"><?php  echo $key['date_added']; ?></td>
	    			  		<td class="center">[ <a href="<?php echo site_url('controlpanel/products/pendingview/'.$key['product_id']); ?>">View</a> ]  [ <a onClick='return confirm("Are you sure want to delete this item ?");' href="<?php echo site_url('controlpanel/Products/delete/'.$key['product_id']); ?>">Delete</a> ]</td>
				      
				      
	    			  	</tr>

	    			<?php endforeach; ?>
				    </tbody>
				  </table><?php if($rows=="0") echo '<p>There is no pending products.</p>';?>
				  <input id="base_url" type="hidden" value="<?php echo base_url();?>"/>
                 <input id="site_url" type="hidden" value="<?php echo site_url();?>"/>
				  <div id="page_num"><?php echo $this->pagination->create_links(); ?> </div>
    	 </div>


	</div>
</body>
</html>