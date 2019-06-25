<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/admin/categories.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>


		<!-- Dependencies -->

		<script src="<?php echo site_url(); ?>site_elements/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo site_url(); ?>site_elements/js/jquery.ui.draggable.js" type="text/javascript"></script>
		
		<!-- Core files -->
		<script src="<?php echo site_url(); ?>site_elements/js/jquery.alerts.js" type="text/javascript"></script>
		<link href="<?php echo site_url(); ?>site_elements/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
		





</head>
<body>
	<div class="container-fluid" id="main">
		
    	<!-- <div class="col-md-12" id="wiz">
    		Home :: Categories
    	</div> -->

    	<div id="box" class="col-md-12">
	    	<div id="div_label" class="col-md-12"> <p>Categories</p>

	    		 <ul class="pull-right">
			        <li><a href="addNew"><span class="glyphicon glyphicon-new-window"></span> Insert New</a></li>
			      </ul>


	    	</div>
	    	<div id="div_content" class="col-md-12">

	    		<table class="table table-hover table-bordered">
				    <thead>
				      <tr >
				  	    <th class="numbr">No</th>
				        <th>Category Name</th>
				        <th>Products</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>

	    		
	    			<?php foreach ($categories as $key): $segment++; ?>
	    				<tr>
                            <th scope="row"><?php echo $segment; ?></th>
	    					<td><?php   echo $key['name'];   ?></td>
	    			  		

	    			  		<td class="act">unknown</td>
                            <td class="act">[ <a href="#">Edit</a> ]  [ <a onClick='return Confirm()' href="#">Delete</a> ]</td>
				      
	    			  	</tr>




	    				
	    			
	    			<?php endforeach; ?>
				    </tbody>
				  </table>
				  <input id="base_url" type="hidden" value="<?php echo base_url();?>"/>
                 <input id="site_url" type="hidden" value="<?php echo site_url();?>"/>
				  <div id="page_num"><?php echo $this->pagination->create_links(); ?> </div>

	    	</div>
    	</div>
    </div>
</body>

<script> 
function Confirm(){
	var r=confirm("Delete cannot be undone! Are you sure want to do this ?");
	if (r==true)
	  {
		return true;
	  }
	else
	  {
		return false;
	  } 
	
}
 
</script>
</html>