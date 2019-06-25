<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/info_style.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckfinder/ckfinder.js"></script>
</head>

<body>
	<div class="se-pre-con"></div>
	<div class="" id="info_main">
	<?php
	 	if($this->session->flashdata('message'))
        {
             echo $this->session->flashdata('message');
        }
	 	?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('controlpanel/information/update');?>">
		<?php foreach ($r as $key) { ?>
			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $key['id']; ?>" />
			  	<input type="hidden" name="page" value="<?php echo $page; ?>" />
			    <label class="control-label col-sm-2">Title:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="title" value="<?php echo $key['title']; ?>" placeholder="Enter Title">
			    </div>
			  </div>
			  <div class="form-group">
					  <label class="control-label col-sm-2">Description:</label>
					  <div class="col-sm-10">
					  	<textarea class="form-control" rows="5" name="des"><?php echo $key['description']; ?></textarea>
					  	<script>
			                                CKEDITOR.replace('des');
			                     </script> 
					  </div>
				</div>
				<?php } ?>
			  <div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="infosubmit" class="btn btn-default col-md-3">Save</button>
			    </div>
			  </div>
		</form>
	</div>
</body>
</html>
