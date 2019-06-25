<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> </title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>site_elements/control panel/featured_setting.css"/>
	<link href="<?php echo site_url(); ?>site_elements/multiselect/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo site_url(); ?>site_elements/control panel/loader.css"/>
	<script src="<?php echo site_url(); ?>site_elements/js/loader.js"></script>
	<script src="<?php echo site_url(); ?>site_elements/multiselect/js/jquery.multi-select.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>site_elements/ckfinder/ckfinder.js"></script>
</head>
<script> 
	$(document).ready(function(){
		$('#featured_items').multiSelect({keepOrder: true,
  selectableHeader: "<div class='custom-header'>All items</div>",
  selectionHeader: "<div class='custom-header'>Selected items</div>"
});
	});
</script>

<body>
	<div class="se-pre-con"></div>
	<div id="info_main">
		<?php if($this->session->flashdata('msg')){echo  $this->session->flashdata('msg') ;} ?>
		<form role="form" action="<?php echo site_url('controlpanel/settings/add_featured'); ?>" method="post">
	      	<select  id='featured_items' multiple='multiple' name="id[]">
	      		<?php foreach ($result as $key) {
	      			$k="0";
	      			if($rows !="0")
	      			{
		      			foreach ($pre_selected as $p_s) {
		      				if($key['product_id']==$p_s['product_id'])
		      				{
		      					$k="1";
		      					echo '<option value="'.$key['product_id'].'" selected >'.$key['title'].'</option>';
		      					break;
		      				}
				 		}
				 	}
			 		if($k=="0")
			 		{
			 			echo '<option value="'.$key['product_id'].'">'.$key['title'].'</option>';
			 		}
			 	} ?>
			</select>
			<div class="pull-right" id="form_buttons">
				<button class="btn btn-default submit" type="submit" name="prosubmit">SAVE </button>
			</div>
		</form>
	</div>
</body>
</html>