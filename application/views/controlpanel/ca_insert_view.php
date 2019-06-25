<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/new_category_style.css"/>
		<!-- Dependencies -->

		<script src="<?php echo site_url(); ?>site_elements/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo site_url(); ?>site_elements/js/jquery.ui.draggable.js" type="text/javascript"></script>
		
		<!-- Core files -->
		<script src="<?php echo site_url(); ?>site_elements/js/jquery.alerts.js" type="text/javascript"></script>
		<link href="<?php echo site_url(); ?>site_elements/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
	<div class="" id="nw_main">
			<div class="col-md-12" id="nw_contents">
				
	 	
			<form class="form-horizontal" role="form" autocomplete="off" method="post" action="<?php echo $action;?>">
			  	<div class="form-group">
				    <label class="control-label col-md-3"><?php echo $name;?>:</label>
				    <div class="in_ca col-sm-7">
				      <input type="text" class="form-control" placeholder="<?php echo $name; ?>" name="Name">
				    </div>
			 	</div>
			 	<div class="form-group">
				    <label class="control-label col-sm-3" >Status:</label>
				    <div class="col-sm-3"> 
				      <select class="form-control" name="status">
					    <option value="enabled">Enabled</option>
					    <option value="disabled">Disabled</option>
					  </select>
				    </div>
			  	</div>
			  	<?php if($des=='1'){?>
			    <div class="form-group">
					<label class="control-label col-md-3">Description:</label>
					    <div class="col-sm-7">
					  	<textarea class="form-control" rows="5" name="des"></textarea>
					</div>
				</div>
				<?php } ?>




			  <div class="form-group btn_s"> 
			    <div class="col-sm-offset-9">
			      <button type="submit" class="btn btn-default btn_save">Save</button>
			    </div>
			  </div>
			</form>

		<?php
	 		 if($this->session->flashdata('msg'))
          {
              echo '<span class="msg col-md-10">'. $this->session->flashdata('msg').'</span>' ;

          }
	 	?>

			</div>
	</div>

</body>
</html>