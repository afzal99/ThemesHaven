<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Category</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/admin/new_category.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>

</head>
<body>
	<div class="container-fluid" id="main">
		<div class="col-md-12" id="wiz">
    		Home :: Categories
    	</div><!-- 
    	<?php echo $url ?>
 -->
	 	<div class="col-md-6">
	 	<?php
	 		 if($this->session->flashdata('msg'))
          {
              echo '<p class="bg-success">'. $this->session->flashdata('msg').'</p>' ;

          }
	 	?>
	 		<form role="form" method="post" action=" <?php echo site_url('admin/Categories/Create'); ?>" >>
			  <div class="form-group">
			    <label for="caName">Category Name:</label>
			    <input type="text" class="form-control" name="caName">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
    </div>
</body>
</html>