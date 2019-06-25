<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/pending_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<script src="<?php echo site_url(); ?>site_elements/jquery/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap-multiselect.css" type="text/css"/>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/js/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckfinder/ckfinder.js"></script>

</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="prs_main">
		<?php foreach ($product as $key) {  ?>
	        <table class="table">
	        	<tr>
	        		<th>Title:</th>
	        		<td><?php echo $key['title']; ?></td>
	        	</tr>
	        	<tr>
	        		<th>Category:</th>
	        		<td><?php
	        			foreach ($category as $ca) {
                                    if($key['category_id'] == $ca['id'])
                                    {
                                        echo $ca['name'];
                                    }
                                }
	    			  		?>

	        		</td>
	        	</tr>
	        	<tr>
	        		<th>Tags:</th>
	        		<td><?php foreach ($tagnames as $tn) { echo $tn['n']; } ?></td>
	        	</tr>
	        	<tr>
	        		<th>Price: <?php if($price !='Free')echo '<span class="text-danger">*</span>' ?></th>
	        			<form style="padding:0px; margin:0px;" method="post" action="<?php echo site_url('controlpanel/products/approve'); ?>"><input type="hidden" name="prid" value="<?php echo $key['product_id'];?>" /> 
	        		<td><?php if($price =='Free'){echo 'Free <input type="hidden" name="price" value="Free" />'; } else{echo '<input style="float:left;" name="price" type="text" placeholder=" Set a Price" />'; if($this->session->flashdata('msg')){echo  '<span style="float:left; margin-left:15px;padding-top:5px;">'.$this->session->flashdata('msg').'</span>';} } ?></td>
	        	
	        		
	        	</tr>
	        	<tr>
	        		<th>Future Updates::</th>
	        		<td>
	        			<?php 
	        				if ($key['free_future_updates']=='1')
	        				{
	        					echo 'Free';
	        			 	}
	        			 	else
	        			 	{
	        			 		echo 'Premium';
	        			 	}
	        			 ?>
	        		</td>
	        	</tr>
	        	<tr>
	        		<th>Layout:</th>
	        		<td>
	        			<?php 
	        				if ($key['layout']=='Responsive')
	        				{ 
	        					echo 'Responsive';
	        				}
	        				else
	        				{
	        					echo 'Fluid';
	        				}
	        			?>

	        		</td>
	        	</tr>
	        	<tr>
	        		<th>High Resolution:</th>
	        		<td>
	        			<?php 
	        				if ($key['high_resolution']=='Yes')
	        				{ 
	        					echo 'Yes';
	        				}
	        				else
	        				{
	        					echo 'No';
	        				}
	        			?>
	        		</td>
	        	</tr>
	        	<tr>
	        		<th>Bootstrap Version:</th>
	        		<td>
	        			<?php 
	        				if ($key['bootstrap_version']=='Bootstrap 3.x')
	        				{ 
	        					echo 'Bootstrap 3.x';
	        				}
	        				else if ($key['bootstrap_version']=='Bootstrap 2.x')
	        				{ 
	        					echo 'Bootstrap 2.x';
	        				}
	        				else
	        				{
	        					echo 'Bootstrap 1.x';
	        				}
	        			?>
	        		</td>
	        	</tr>
	        	<tr>
	        		<th>Browser:</th>
	        		<td><?php echo $key['compatable_browser'] ?></td>
	        	</tr>
	        	<tr>
	        		<th>Live Preview address:</th>
	        		<td><a target="_blank" href="//<?php echo $key['preview_link'] ?>"><?php echo $key['preview_link'] ?></a></td>
	        	</tr>
	        	<tr>
	        		<th>Description:</th>
	        		<td><textarea readonly rows="10" cols="40"><?php echo $key['description'] ?></textarea></td>
	        	</tr>
	        	<tr>
	        		<th>Thumbnail:</th>
	        		<td><img height=200px src="<?php echo site_url('site_elements/image').'/'.$key['image'] ?>"/></td>
	        	</tr>
	        	<tr>
	        		<th>Main file:</th>
	        		<td><a href="<?php echo site_url('site_elements/zipstore').'/'.$key['mainfile'] ?>">Click here to Download the Package</a></td>
	        	</tr>
	        	<tr>
	        		<th></th>
	        		<td><button type="submit" class="btn btn-primary">Approve</button> <button class="btn btn-danger col-md-offset-1" name="reject" value="1" >Reject</button></td>
	        	</tr>
	        	</form>


	        </table>


		<?php } ?>



	</div>
</body>
</html>