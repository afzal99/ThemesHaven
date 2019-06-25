<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/ca_single_style.css"/>
</head>

<body>
	<div class="" id="cas_main">

	<?php foreach ($info as $key) {  ?>
		
		<form class="form-horizontal" role="form" method="post" action="<?php echo $action;?>">	
		<div class="form-group">
			    <label class="col-md-3"><?php echo $name; ?>:</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $key['name']; ?>" name="caName">
			    </div>
		</div>
		<input style="display:none" type="hidden" name="id" value="<?php  echo $key['id']; ?>"/>
		<div class="form-group">
			    <label class="col-md-3">Status:</label>
			    <div class="col-sm-7">
			      	<select class="form-control" name="status">
			      	<?php  if( $key['status']=='enabled')
			      			{
			      				echo '<option value="enabled">enabled</option> ';
			      				echo ' <option value="disabled">disabled</option> ';
			      			}
			      			else if( $key['status']=='disabled'){
			      				echo ' <option value="disabled">disabled</option> ';
			      				echo '<option value="enabled">enabled</option> ';
			      			}
			      	?>
			      	 
				    </select>
			    </div>
		</div>
		<div class="form-group">
			    <label class="col-md-3">Date added:</label>
			    <div class="col-sm-7">
			     	<?php echo $key['date_added'].' (GMT)'; ?>
			    </div>
		</div>
		<?php if($lmod=='1'){ ?>
		<div class="form-group">
			    <label class="col-md-3">Last Modified:</label>
			    <div class="col-sm-7">
			     	<?php echo $key['date_modified'].' (GMT)'; ?>
			    </div>
		</div>
		<?php } ?>
		<?php if($des=='1'){ ?>
		<div class="form-group">
		  <label class="col-md-3">Description:</label>
		  <div class="col-sm-7">
		  	<textarea class="form-control" rows="5" name="des"><?php echo $key['description']; ?></textarea>
		  </div>
		</div>
		<?php } ?>


		

		<div class="col-sm-offset-5">
			      <button type="submit" class="btn btn-default btn_save">Save</button>
			      <button type="reset" class="btn btn-default btn_save">Reset</button>
		</div>


		</form>
	<?php } ?>
	</div>
</body>
</html>